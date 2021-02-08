<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(Request $request){
        return view('admin.index');
    }

    public function destroy(Request $request){
        Auth::guard('admin')->logout();
        return redirect()->route("admin.login");
    }
}
