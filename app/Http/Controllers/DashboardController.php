<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = Paket::all();
        return view('dashboard',compact('data'));
    }
}
