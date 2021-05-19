@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h1>Data mobil</h1>
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cars as $car)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$car->name}}</td>
                                <td>{{$car->price}}</td>
                                <td>{{$car->stock}}</td>
                                <td>
                                    <a href="{{route('cars.edit',$car->id)}}" class="btn btn-outline-warning btn-sm">Edit</a> ||
                                    <form action="{{ route('cars.destroy',$car->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')                        
                                        <button type="submit" class="d-inline-block btn btn-outline-danger ">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <h4 class="my-5">Input Data Mobil</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{route('cars.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="number" min="0" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price" name="price">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Stock</label>
                            <input type="number" min="0" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price" name="stock">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        </div>

@endsection
