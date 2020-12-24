<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __constructor() {
        $this->middleware('auth.admin');
    }
    public function index () {
        $users = User::all();
        
      return view('admin.index', compact('users'));
    }
}
