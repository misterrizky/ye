<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('pages.web.home.main');
    }
    public function about()
    {
        return view('pages.web.about.main');
    }
    public function service()
    {
        return view('pages.web.service.main');
    }
    public function case()
    {
        return view('pages.web.case.main');
    }
    public function contact()
    {
        return view('pages.web.contact.main');
    }
    public function blog()
    {
        return view('pages.web.blog.main');
    }
    public function carrier()
    {
        return view('pages.web.carrier.main');
    }
    public function switch($language = '')
    {
        // Simpan locale ke session.
        request()->session()->put('locale', $language);
 
        // Arahkan ke halaman sebelumnya.
        return redirect()->back();
    }
}
