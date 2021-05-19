<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use Illuminate\Support\Facades\Hash;


class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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

    /**
     * Validate and user login.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request)
    {
        // $asd = HASH::make('asd');

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $owner = Owner::where('username',$request->username)->first();

        if(is_null($owner)){
            return redirect('/')->with('status','Username not found.');
        }

        if(!HASH::check($request->password, $owner->password)){
            // Not login
            return redirect('/')->with('status','Username or password didnt match.');   
        }

        // Login
        $request->session()->put('username', 'username');
        return redirect('/main');
    }

    /**
     * Destroy session.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect('/');

    }
}
