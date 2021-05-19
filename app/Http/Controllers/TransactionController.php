<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Car;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::join('cars','cars.id','=','transactions.car_id')->get(['cars.*','transactions.*','transactions.name AS buyer_name','cars.name AS car_name']);
        $cars = Car::where('stock','>=',1)->get();
        // dd($cars);
        return view('transactions',compact('transactions','cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'car' => 'required',
            'quantity' => 'required|numeric|min:1'
        ]);

        $car = Car::find($request->car);
        $total_price = $car->price*$request->quantity;
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'car_id' => $request->car,
            'quantity' => $request->quantity,
            'total_price' => $total_price
        ];

        Transaction::create($data);

        $details = [
            'title' => 'Halo bos! Laku lagi nih Mobil '.$car->name,
            'body' => "
                Nama Pembeli: ".$request->name."\n
                Email Pembeli: ".$request->email."\n
                No Telp Pembeli: ".$request->phone_number."\n
                Quantity: ".$request->quantity."\n
                Total: ".$total_price."
            "
        ];
       
        \Mail::to('stvjack98@gmail.com')->send(new \App\Mail\TransactionMail($details));
        

        return redirect()->route('transactions.index')->with('success','Data added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
