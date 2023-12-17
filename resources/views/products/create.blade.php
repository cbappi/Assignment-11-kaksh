@extends('master')

@section('title', 'Category-Create-Page')

@section('content')

<div class="row">
    <div class="d-flex justify-content-end my-4">
        <a href="{{ route('products.index') }}" class="btn btn-info">List of Stock Products</a>
    </div>
    <div class="col-8 m-auto">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf









            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control @error('product_name')
                is-invalid
                @enderror"
                id="product_name"
                name="product_name" placeholder="Please provide product name"
                value="{{ old('product_name') }}"
                >

                @error('product_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="unit_price" class="form-label">Unit price</label>
                <input type="text" class="form-control @error('unit_price')
                is-invalid
                @enderror"
                id="unit_price"
                name="unit_price" placeholder="Please provide unit price"
                value="{{ old('unit_price') }}"
                >

                @error('unit_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="text" class="form-control @error('quantity')
                is-invalid
                @enderror"
                id="quantity"
                name="quantity" placeholder="Please provide quantity"
                value="{{ old('quantity') }}"
                >

                @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>
</div>

@endsection
