@extends('layout.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <h2>Products</h2>
        <div>
            <table class="table" border="1">
                <tr>
                    <th>Name</th>
                    <th>selling_price</th>
                    <th>stock</th>
                    <th>type</th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->selling_price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->type}}</td>
                    <td>
                    <a href="{{route('product.edit', ['product' => $product])}}" class="btn btn-primary">Edit</a>
                    <br>
                    <form action="{{route('product.delete', $product->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <button type="submit"  class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            
            @endforeach
            
            
        </table>
    </div>
</div>
    
</body>
</html>