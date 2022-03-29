<?php

namespace App\Http\Controllers\Office;

use Illuminate\Http\Request;
use App\Traits\OfficeResponseView;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\HRM\EmployeeAttendance;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use OfficeResponseView;
    public function __construct()
    {
        $this->middleware('guest:office')->except('resend_mail','verification','do_logout');
    }
    public function index()
    {
        return $this->render_view('auth.main');
    }
    public function do_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }else{
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        if(Auth::guard('office')->attempt(['email' => $request->email, 'password' => $request->password, 'st' => 'a'], $request->remember))
        {
            $cek = EmployeeAttendance::where('employee_id', Auth::guard('office')->user()->id)->whereRaw('DATE(presence_at) = CURDATE()')->first();
            if(!$cek){
                $absen = new EmployeeAttendance;
                $absen->employee_id = Auth::guard('office')->user()->id;
                $absen->presence_at = date('Y-m-d H:i:s');
                $absen->save();
            }
            return response()->json([
                'alert' => 'success',
                'message' => __('custom.welcome_back'). ' '. Auth::guard('office')->user()->name,
                'callback' => 'dashboard',
            ]);
        }else{
            return response()->json([
                'alert' => 'error',
                'message' => 'Sorry, looks like there are some errors detected, please try again.',
            ]);
        }
    }
    public function do_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'phone' => 'required|unique:employees|min:9|max:13',
            'email' => 'required|email|unique:employees',
            'password' => 'required|min:8',
            'toc' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('fullname')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('fullname'),
                ]);
            }elseif ($errors->has('phone')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('phone'),
                ]);
            }elseif ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }elseif ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }else{
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('toc'),
                ]);
            }
        }
        $employee = new Employee;
        $employee->name = Str::title($request->fullname);
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->department_id = 0;
        $employee->position_id = 8;
        $employee->st = 'a';
        $employee->password = Hash::make($request->password);
        $employee->save();
        $token = Str::random(64);

        UserVerify::create([
            'employee_id' => $employee->id,
            'token' => $token
        ]);
        Mail::to($request->email)->send(new WelcomeMail($employee, $token));
        return response()->json([
            'alert' => 'success',
            'message' => 'Thanks for join us '. $request->fullname,
            'callback' => 'register'
        ]);
    }
    public function do_verify($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();

        $message = 'Sorry your email cannot be identified.';

        if (!is_null($verifyUser)) {
            $employee = $verifyUser->employee;

            if (!$employee->email_verified_at) {
                $verifyUser->employee->email_verified_at = date("Y-m-d H:i:s");
                $verifyUser->employee->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }

        return redirect()->route('office.auth.index')->with('message', $message);
    }
    public function do_forgot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:employees',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('email')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('email'),
                ]);
            }
        }
        $employee = Employee::where('email',$request->email)->first();

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        $data = array(
            'token' => $token,
            'employee' => $employee
        );
        Mail::to($request->email)->send(new ForgotMail($data));
        return response()->json([
            'alert' => 'success',
            'message' => 'We have e-mailed your password reset link!',
            'callback' => 'forgot',
        ]);
    }
    public function reset($token)
    {
        return view('page.office.auth.reset', compact('token'));
    }
    public function do_reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required|exists:password_resets',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('token')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('token'),
                ]);
            } elseif ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            } elseif ($errors->has('password_confirmation')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password_confirmation'),
                ]);
            }
        }

        $updatePassword = DB::table('password_resets')
            ->where([
                'token' => $request->token
            ])
            ->first();

        if (!$updatePassword) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Invalid token!',
            ]);
        }
        $user = Employee::where('email', $updatePassword->email)
        ->update(['password' => Hash::make($request->password)]);
        
        $users = Employee::where('email', $updatePassword->email)
        ->first();
        DB::table('password_resets')->where(['email' => $updatePassword->email])->delete();
        Mail::to($users->email)->send(new PasswordChangeMail($users));
        return response()->json([
            'alert' => 'success',
            'message' => 'Your password has been changed!',
            'callback' => 'auth',
        ]);
    }
    public function password_changed(){
        return view('page.office.auth.password_changed');
    }
    public function google_redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function google_callback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = Employee::where('google_id', $user->id)->first();
            if($finduser){
                Auth::guard('office')->login($finduser, true);
                return redirect()->route('office.dashboard');
            }else{
                $newUser = Employee::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'department_id'=> 0,
                    'position_id'=> 8,
                    'st'=> 'a',
                    'password' => Hash::make('123456dummy')
                ]);
                $token = Str::random(64);

                UserVerify::create([
                    'employee_id' => $newUser->id,
                    'token' => $token
                ]);
                Mail::to($user->email)->send(new WelcomeMail($newUser, $token));
                Auth::guard('office')->login($newUser, true);
                // return redirect()->intended('dashboard');
                return redirect()->route('office.dashboard');
            }
        } catch (Exception $e) {
            return redirect()->route('office.auth.index');
        }
    }
    public function resend_mail()
    {
        $users = Employee::where('id', Auth::user()->id)->first();
        $token = Str::random(64);
        UserVerify::create([
            'employee_id' => $users->id,
            'token' => $token
        ]);
        Mail::to($users->email)->send(new WelcomeMail($users, $token));
        return response()->json([
            'alert' => 'info',
            'message' => 'We have resend activation to your email'
        ]);
    }
    public function verification()
    {
        return view('page.office.profile.notice');
    }
    public function deactivated(Employee $employee)
    {
        return view('page.office.auth.deactivate');
    }
    public function do_logout()
    {
        $cek = EmployeeAttendance::where('employee_id', Auth::guard('office')->user()->id)->whereRaw('DATE(presence_at) = CURDATE()')->first();
        $cek->finish_at = date('Y-m-d H:i:s');
        $cek->update();
        $employee = Auth::guard('office')->user();
        Auth::logout($employee);
        return redirect()->route('office.auth.index');
    }
}
