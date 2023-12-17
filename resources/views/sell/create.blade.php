@extends('master')

@section('title', 'Category-Create-Page')

@section('content')

<div class="row">
    <div class="d-flex justify-content-end my-4">
        <a href="{{ route('sell.index') }}" class="btn btn-info mx-2">Deashboard</a>
        <a href="{{ route('sellshistory') }}" class="btn btn-warning">Sells Transection</a>
    </div>
    <div class="col-5 m-auto card mx-2">
        <form action="{{ route('sell.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="sell_date" class="form-label">Sell date</label>
                <input type="date" class="form-control @error('sell_date')
                is-invalid
                @enderror"
                id="sell_date"
                name="sell_date" placeholder="Sell date"
                value="{{ old('sell_date') }}"
                >

                @error('sell_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="mb-3">
                <select class="form-select @error('product_id') is-invalid
                @enderror" name="product_id">
                    <option selected>Select product</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                    @endforeach
                </select>
                @error('product_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>




            <div class="mb-3">
                <label for="sell_qty" class="form-label">Sell quantity</label>
                <input type="text" class="form-control @error('sell_qty')
                is-invalid
                @enderror"
                id="sell_qty"
                name="sell_qty" placeholder="Sell quantity"
                value="{{ old('sell_qty') }}"
                >

                @error('sell_qty')
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
                name="unit_price" placeholder="Unit price"
                value="{{ old('unit_price') }}"
                >

                @error('unit_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>



            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>

    <div class= "col-5 card">

        <div class="text-danger fs-4">
        @foreach ($products as $product)
        Unit Ptice = {{ $product->product_name }}={{ $product->unit_price}}
        <br>
        @endforeach
        </div>
</div>
</div>

@endsection
