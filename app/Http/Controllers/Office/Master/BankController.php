<?php

namespace App\Http\Controllers\Office\Master;

use App\Models\Master\Bank;
use Illuminate\Http\Request;
use App\Traits\OfficeResponseView;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BankController extends Controller
{
    use OfficeResponseView;
    public function index(Request  $request)
    {
        if ($request->ajax()) {
            $collection = Bank::where('name','LIKE','%'.$request->keyword.'%')->paginate(10);;
            return $this->render_view('master.bank.list',compact('collection'));
        }
        $counter = Bank::get()->count();
        return $this->render_view('master.bank.main',compact('counter'));
    }
    public function create()
    {
        return $this->render_view('master.bank.input',['data' => new Bank()]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:banks,name',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }
        }
        $data = new Bank();
        $data->name = $request->name;
        $data->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Bank '. __('custom.saved'),
        ]);
    }
    public function show(Bank $bank)
    {
        return $this->render_view('master.bank.show',['data' => $bank]);
    }
    public function edit(Bank $bank)
    {
        return $this->render_view('master.bank.input',['data' => $bank]);
    }
    public function update(Request $request, Bank $bank)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:banks,name',
        ]);
        $bank->name = $request->name;
        $bank->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Bank '. __('custom.updated'),
        ]);
    }
    public function destroy(Bank $bank)
    {
        $bank->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Bank '. __('custom.deleted'),
        ]);
    }
}
