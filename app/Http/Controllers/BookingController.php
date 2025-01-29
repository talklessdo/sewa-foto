<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Editor;
use App\Models\Fotografer;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('pending');
    }
    public function pending()
    {
        $id = Auth::user()->id;
        $roles = Auth::user()->role;

        if($roles == 'customer'){
            $bookings = Booking::join('pakets','bookings.paket_id','=','pakets.id')
            ->where(function ($query) {
                $query->where('status', '=', 'pending')
                      ->orWhere('status', '=', 'waiting');
            })
            ->where('cs_id', '=', $id)
            ->get();
            
        }else{
            $bookings = Booking::join('pakets','bookings.paket_id','=','pakets.id')
            ->where('status', '=', 'waiting')
            ->orWhere('status', '=', 'pending')
            ->get();

        }
        return view('pending',compact('bookings'));
    }
    public function cancel()
    {
        $id = Auth::user()->id;
        $role = Auth::user()->role;
        if ($role == 'customer') {
            $bookings = Booking::join('pakets','bookings.paket_id','=','pakets.id')
            ->where('status', '=', 'canceled')
            ->where('cs_id', '=', $id)
            ->get();
            
        } else {
            $bookings = Booking::join('pakets','bookings.paket_id','=','pakets.id')
            ->where('status', '=', 'canceled')
            ->get();
            
        }

        return view('cancel',compact('bookings'));
    }
    public function approve()
    {
        $id = Auth::user()->id;
        $role = Auth::user()->role;
        if ($role == 'customer') {
            $bookings = Booking::join('pakets','bookings.paket_id','=','pakets.id')
            ->where('status', '=', 'confirmed')
            ->where('cs_id', '=', $id)
            ->get();
            
        } else {
            $bookings = Booking::join('pakets','bookings.paket_id','=','pakets.id')
            ->where('status', '=', 'confirmed')
            ->get();
            
        }
        

        return view('approve',compact('bookings'));
    }
    public function detail_pending($kode)
    {
        // $id = Booking::find($id);
        $bookings = Booking::join('pakets','bookings.paket_id','=','pakets.id')
        ->where('bookings.kode_booking', '=', $kode)
        ->get();
        foreach($bookings as $books){
            $booking = $books;
        }

        $namaUser = User::find($booking->cs_id);

        $fotografers = Fotografer::where('id', '=', $booking->fotograf_id)->first();
        $paket = Paket::where('id', '=', $booking->paket_id)->first();
        $editors = Editor::where('id', '=', $booking->editor_id)->first();
        $nameFotografers = User::where('email', '=', $fotografers->email_fotografer)->first();
        $nameEditors = User::where('email', '=', $editors->email_editor)->first();
        // dd($booking);
        return view('components.detail_pending', array_merge(
            compact('nameFotografers'),
            compact('nameEditors'),
            compact('booking'),
            compact('paket'),
            compact('namaUser'),
        ));
    }
    public function detail_cancel($kode)
    {
        $bookings = Booking::join('pakets','bookings.paket_id','=','pakets.id')
        ->where('bookings.kode_booking', '=', $kode)
        ->get();
        foreach($bookings as $books){
            $booking = $books;
        }

        $namaUser = User::find($booking->cs_id);
        $fotografers = Fotografer::where('id', '=', $booking->fotograf_id)->first();
        $paket = Paket::where('id', '=', $booking->paket_id)->first();
        $editors = Editor::where('id', '=', $booking->editor_id)->first();
        $nameFotografers = User::where('email', '=', $fotografers->email_fotografer)->first();
        $nameEditors = User::where('email', '=', $editors->email_editor)->first();
        
        
        return view('components.detail_cancel', array_merge(
            compact('nameFotografers'),
            compact('nameEditors'),
            compact('booking'),
            compact('namaUser'),
            compact('paket'),
        ));
    }
    public function detail_approve($kode)
    {
        $bookings = Booking::join('pakets','bookings.paket_id','=','pakets.id')
        ->where('bookings.kode_booking', '=', $kode)
        ->get();
        foreach($bookings as $books){
            $booking = $books;
        }

        $fotografers = Fotografer::where('id', '=', $booking->fotograf_id)->first();
        $paket = Paket::where('id', '=', $booking->paket_id)->first();
        $editors = Editor::where('id', '=', $booking->editor_id)->first();
        $nameFotografers = User::where('email', '=', $fotografers->email_fotografer)->first();
        $nameEditors = User::where('email', '=', $editors->email_editor)->first();
        
        
        return view('components.detail_approve', array_merge(
            compact('nameFotografers'),
            compact('nameEditors'),
            compact('booking'),
            compact('paket'),
        ));
    }
    public function print($kode)
    {
        $bookings = Booking::join('pakets','bookings.paket_id','=','pakets.id')
        ->where('bookings.kode_booking', '=', $kode)
        ->get();
        foreach($bookings as $books){
            $booking = $books;
        }

        $fotografers = Fotografer::where('id', '=', $booking->fotograf_id)->first();
        $paket = Paket::where('id', '=', $booking->paket_id)->first();
        $editors = Editor::where('id', '=', $booking->editor_id)->first();
        $nameFotografers = User::where('email', '=', $fotografers->email_fotografer)->first();
        $nameEditors = User::where('email', '=', $editors->email_editor)->first();
        
        
        return view('components.cetak_pdf', array_merge(
            compact('nameFotografers'),
            compact('nameEditors'),
            compact('booking'),
            compact('paket'),
        ));
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
        $id_foto = $request->fotogr;
        $id_edit = $request->editor;
        $fotografer = Fotografer::find($id_foto);
        $fotografer->job = 'order';
        $editor = Editor::find($id_edit);
        $editor->job = 'order';
        $kodeBooking = strtoupper(fake()->lexify('???')) . fake()->numerify('#####');
        if($request->fotogr == 'pilih'){
            return redirect()->back()->with('errorF', 'Pilih salah satu fotografer');
        }else if($request->editor == 'pilih'){
            return redirect()->back()->with('errorE', 'Pilih salah satu editor');
        }else{
            Booking::create([
                'kode_booking' => $kodeBooking,
                'cs_id' => $request->csId,
                'fotograf_id' => $request->fotogr,
                'editor_id' => $request->editor,
                'paket_id' => $request->paketId,
                'booking_date' => $request->tgl,
                'durasi' => $request->duration,
                'status' => 'pending',
                'payment' => null,
            ]);
            $fotografer->save();
            $editor->save();
            return redirect('/pending');
            // dd($request);
        }

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
