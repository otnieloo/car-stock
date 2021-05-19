<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Car;
use App\Models\Transaction;
use Carbon\Carbon;
use DB;
class PagesController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function main()
    {
        // Today
        $today = Carbon::today()->toDateTimeString();
        
        $transactions = Transaction::where('created_at','>=',$today)
            ->select(DB::raw('SUM(quantity) as qc,car_id'))
            ->groupBy('car_id')
            ->orderBy('qc','DESC')
            ->first();
        $car = Car::find($transactions->car_id);
        $sales = Transaction::where('created_at','>=',$today)->sum('quantity');
        $total_sales = Transaction::where('created_at','>=',$today)->sum('total_price');

        // Yesterday
        $yesterday = Carbon::yesterday()->toDateTimeString();
        $ysales = Transaction::where('created_at','>=',$yesterday)
            ->where('created_at','<',$today)
            ->sum('quantity');
        $ytotal_sales = Transaction::where('created_at','>=',$yesterday)
            ->where('created_at','<',$today)
            ->sum('total_price');

        $diff_sales = (($sales-$ysales)/$sales)*100;
        $diff_sales = number_format($diff_sales,2)."%";

        $diff_total_sales = (($total_sales-$ytotal_sales)/$total_sales)*100;
        $diff_total_sales = number_format($diff_total_sales,2);

        // This week
        $seven_days = Carbon::now()->subDays(7)->toDateTimeString();
        $seven_days_transactions = Transaction::where('created_at','>=',$seven_days)
            ->select(DB::raw('SUM(quantity) as qc,car_id'))
            ->groupBy('car_id')
            ->orderBy('qc','DESC')
            ->first();
        $seven_days_car = Car::find($transactions->car_id);
        $seven_days_sales = Transaction::where('created_at','>=',$seven_days)->sum('quantity');
        $seven_days_total_sales = Transaction::where('created_at','>=',$seven_days)->sum('total_price');
        

        return view('main',compact('car','sales','total_sales','diff_sales','diff_total_sales','seven_days_car','seven_days_sales','seven_days_total_sales'));
    }
}
