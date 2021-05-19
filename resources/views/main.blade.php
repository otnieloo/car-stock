@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h1>Selamat datang!</h1>
                    <table class="table">
                        <tr>
                            <th colspan="2">Data Hari ini</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Mobil paling banyak terjual</th>
                            <td>{{$car->name}}</td>
                        </tr>
                        <tr>
                            <th>Penjualan hari ini</th>
                            <td>{{$sales}} unit ({{$diff_sales}}%)</td>
                        </tr>
                        <tr>
                            <th>Total penjualan hari ini</th>
                            <td>Rp. {{$total_sales}} ({{$diff_total_sales}}%)</td>
                        </tr>
                    </table>
                    <table class="table">
                        <tr>
                            <th colspan="2">Data 7 hari terakhir</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Mobil paling banyak terjual</th>
                            <td>{{$seven_days_car->name}}</td>
                        </tr>
                        <tr>
                            <th>Penjualan 7 hari terakhir</th>
                            <td>{{$seven_days_sales}}</td>
                        </tr>
                        <tr>
                            <th>Total penjualan 7 hari terakhir</th>
                            <td>{{$seven_days_total_sales}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        </div>
@endsection
