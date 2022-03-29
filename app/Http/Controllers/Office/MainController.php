<?php

namespace App\Http\Controllers\Office;

use Illuminate\Http\Request;
use App\Traits\OfficeResponseView;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    use OfficeResponseView;
    public function index()
    {
        return $this->render_view('dashboard.main');
    }
    public function switch($language = '')
    {
        // Simpan locale ke session.
        request()->session()->put('locale', $language);
 
        // Arahkan ke halaman sebelumnya.
        return redirect()->back();
    }
}
