@extends('master')

@section('title', 'SubCategory-Index-Page')

@section('content')
<div class="row">

        <div class="d-flex justify-content-end my-4">
            <a href="{{ route('products.create') }}" class="btn btn-info">Add Products</a>
        </div>




    <div class="col-8 m-auto">

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>

                <th scope="col">Quantity</th>
                <th scope="col">Unit Price</th>

                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->product_name }}</td>

                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->unit_price}}</td>
                   


                    <td>
                        <a href="{{ route('products.edit',['product' => $product->id]) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Del</button>
                        </form>
                    </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
