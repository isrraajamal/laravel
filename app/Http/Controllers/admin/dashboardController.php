<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(){
        if(Auth::user()-> email === 'admin@gmail.com'){
            abort(403, 'Unauthorized access.');
        }
       return view('admin/dashboard');
    }

    public function __construct(){
        $this -> middleware('auth');
    }
}
