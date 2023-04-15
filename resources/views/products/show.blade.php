@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Product Details') }}</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <h5 class="card-title">{{ $product->name }}</h5>
                            <p>{{ $product->description }}</p>
                            <p><strong>Brand:</strong> {{ $product->brand }}</p>
                            <p><strong>Size:</strong> {{ $product->size }}</p>
                            <p><strong>Amount:</strong> {{ $product->amount }}</p>
                            <p><strong>Description:</strong>{{$product->description}}</p>
{{--                        <p class="card-text"><strong>Manufacture Date:</strong> {{ $product->manufacture_date->format('d/m/Y') }}</p>--}}
{{--                        <p class="card-text"><strong>Expiry Date:</strong> {{ $product->expiry_date->format('d/m/Y') }}</p>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
