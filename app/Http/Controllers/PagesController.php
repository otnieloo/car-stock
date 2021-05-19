<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Car;
use App\Models\Transaction;

class PagesController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function main()
    {

        return view('main');
    }
}
