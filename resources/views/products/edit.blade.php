@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Product</h1>
                <form method="POST" action="{{route('products.update',$product->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Product Description</label>
                        <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="size">Product Size</label>
                        <input type="text" class="form-control" id="size" name="size" value="{{ $product->size }}">
                    </div>
                    <div class="form-group">
                        <label for="amount">Product Amount</label>
                        <input type="text" class="form-control" id="amount" name="amount" value="{{ $product->amount }}">
                    </div>
                    <div class="form-group">
                        <label for="brand">Product Brand</label>
                        <input type="text" class="form-control" id="brand" name="brand" value="{{ $product->brand }}">
                    </div>
                    <div class="form-group">
                        <label for="manufacture_date">Manufacture Date</label>
                        <input type="date" class="form-control" id="manufacture_date" name="manufacture_date" value="{{ $product->manufacture_date }}">
                    </div>
                    <div class="form-group">
                        <label for="expire_date">Expire Date</label>
                        <input type="date" class="form-control" id="expire_date" name="expiry_date" value="{{ $product->expiry_date }}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
