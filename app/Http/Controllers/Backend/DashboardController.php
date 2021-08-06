<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function index()
    {

        return view('backend.dashboard.index');
    }
    public function error($code = '500')
    {
        $view_path = 'backend.error.'.$code;
        if (view()->exists($view_path)) {
            return view($view_path);
        }
            return view('backend.error.500');
    }
    public function showProfile(Request $request){
        $value = $request->session()->get('key');
       // dd($value);
    }
}
