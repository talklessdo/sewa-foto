<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.daftar');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:5|confirmed',
        ],
        [
            'name.min' => 'minumal 5 karakter',
            'email.unique' => 'email sudah digunakan',
            'password.confirmed' => 'password tidak sama',
        ]);

        
        
        // $confirm =  $request->input('pass');
        // if($validateData['password'] == $confirm){
            //     return redirect('/login')->with('error','2');
            // }
        User::create($validateData);
        
        // dd($request);
        // return redirect()->back();
        return redirect('/')->with('error','2');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
