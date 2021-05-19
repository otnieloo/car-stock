@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h1>Data penjualan</h1>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pembeli</th>
                                <th>Email Pembeli</th>
                                <th>No Telp Pembeli</th>
                                <th>Nama mobil</th>
                                <th>Quantity</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $transaction)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$transaction->buyer_name}}</td>
                                <td>{{$transaction->email}}</td>
                                <td>{{$transaction->phone_number}}</td>
                                <td>{{$transaction->car_name}}</td>
                                <td>{{$transaction->quantity}}</td>
                                <td>{{$transaction->total_price}}</td>
                              
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <h4 class="my-5">Input Data Penjualan</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{route('transactions.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pembeli</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Pembeli</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No telp Pembeli</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter no Telp" name="phone_number">
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Mobil</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" name="car">
                                    <option selected>Pilih</option>
                                    @foreach($cars as $car)
                                        <option value="{{$car->id}}">{{$car->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Quantity</label>
                            <input type="number" min="1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter quantity" name="quantity">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        </div>

@endsection
