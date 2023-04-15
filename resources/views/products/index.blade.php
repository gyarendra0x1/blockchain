@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Product Lists</h1>
                <hr>
                <a href="{{ route('products.create') }}" class="btn btn-info btn-sm">Add Product</a>
                <br><br>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Description</th>
                        <th>Size</th>
                        <th>Amount</th>
                        <th>Manufacture Date</th>
                        <th>Expire Date</th>
                        <th>QR Code</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->brand }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->size }}</td>
                            <td>{{ $product->amount }}</td>
                            <td>{{$product->manufacture_date?$product->manufacture_date:''}}</td>
                            <td>{{$product->expiry_date?$product->expiry_date:''}}</td>
                            <td>  {!! QrCode::size(100)->generate(route('products.show', $product)); !!}</td>
                            <td>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
