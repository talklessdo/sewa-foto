<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paket;
use App\Models\Editor;
use App\Models\Booking;
use App\Models\Fotografer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(){
        $data = Paket::all();
        return view('dashboard',compact('data'));
    }
    public function akun(){
        $data = User::where('role', '!=', 'pemilik')
        ->where('role', '!=', 'admin')
        ->get();
        return view('akun',compact('data'));
    }
    public function formAkun(){
        $data = User::where('role', '!=', 'pemilik')
        ->where('role', '!=', 'admin')
        ->get();
        return view('form_akun',compact('data'));
    }

    public function add_akun(Request $request){
        // $valdasi = $request->validate([
        //     'name' => 'required|min:3',
        //     'email' => 'required|email|unique:users,email',
        //     'address' => 'required|min:10',
        //     'phone' => 'required|digits:12',
        //     'password' => 'required|min:8',
        //     'confirmPassword' => 'required|same:password',
        //     'role' => 'required|in:editor,customer,fotografer',
        // ]);

        // Menyimpan data ke database
        if ($request->role == 'customer') {

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'alamat' => $request->address,
                'avatar' => 'avatar.png',
                'phone' => $request->phone,
                'role' => $request->role,
                'password' => Hash::make($request->password), // Hash password
            ]);
        }else if ($request->role == 'editor'){

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'alamat' => $request->address,
                'avatar' => 'avatar.png',
                'phone' => $request->phone,
                'role' => $request->role,
                'password' => Hash::make($request->password), // Hash password
            ]);
            Editor::create([
                'email_editor' => $request->email,
                'job' => 'no_order',
            ]);
            
            
        }else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'alamat' => $request->address,
                'avatar' => 'avatar.png',
                'phone' => $request->phone,
                'role' => $request->role,
                'password' => Hash::make($request->password), // Hash password
            ]);
            Fotografer::create([
                'email_fotografer' => $request->email,
                'job' => 'no_order',
            ]);

        }
        return redirect()->back();
        // dd($request);
    }

    public function show($slug){
        $data = Paket::where('slug',$slug)->get();
        // dd($data);
        return view('detail', compact('data'));
    }
    public function form($slug){
        $data = Paket::where('slug',$slug)->get();
        $fotografer = User::join('fotografers','users.email', '=', 'fotografers.email_fotografer')
        ->where('fotografers.job', '!=', 'order')
        ->get();
        $editor = User::join('editors','users.email', '=', 'editors.email_editor')
        ->where('editors.job', '!=', 'order')
        ->get();
        return view('form', array_merge(compact('data'), compact('editor'), compact('fotografer')));
    }

    public function updateForm(Request $request){
        $data = Booking::where('kode_booking',$request->kode)->first();
        

        if($request->tipe == 'hapus'){
            $idFotografer = $data->fotograf_id;
            $idEditor = $data->editor_id;
            $fotografer = Fotografer::find($idFotografer);
            $editor = Editor::find($idEditor);


            $data->status = 'canceled'; 
            $fotografer->job = 'no_order'; 
            $editor->job = 'no_order'; 
            $data->save();
            $fotografer->save();
            $editor->save();
            // dd($editor);
            return redirect('/cancel');
        }else if($request->tipe == 'bayar'){

            $payment = $request->payment;
            $namePayment = time() . rand(100, 999) . "." . $payment->getClientOriginalExtension();
            $payment->move(public_path() . '/admin/img/payment/' , $namePayment);

            $data->payment = $namePayment;
            $data->status = 'waiting';
            $data->save();
            return redirect('/pending');
            // dd($request);
        }else{
            
            $data->status = 'confirmed';
            $data->save();
            return redirect('/approve');

        }
    }
}
