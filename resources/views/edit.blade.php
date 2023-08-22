@extends('layout.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <div class="container">
        <form method="POST" action="{{route('product.update', $product)}}">
            @csrf
            @method('put')
            <div>
                <label>Name</label>
                <input type="name" name="name" value="{{$product->name}}" class="form-control" placeholder="name"/>
                @error('name')
                <p class="text-danger">
                    {{$message}}
                </p>
            @enderror
            </div>
            <div>
                <label>Selling price</label>
                <input type="name" name="selling_price" value="{{$product->selling_price}}"  class="form-control"  placeholder="selling_price"/>
                @error('selling_price')
                <p class="text-danger">
                    {{$message}}
                </p>
            @enderror
            </div>
            <div>
                <label>Stock</label>
                <input type="stock" name="stock" value="{{$product->stock}}" class="form-control"  placeholder="stock"/>
                @error('stock')
                <p class="text-danger">
                    {{$message}}
                </p>
            @enderror
        </div>
        <div>
            <label>Type</label>
            <input type="type" name="type" value="{{$product->type}}" class="form-control"  placeholder="type" />
            @error('type')
            <p class="text-danger">
                {{$message}}
            </p>
        @enderror
        </div>
        <div>
            <br>
            <input type="submit" class="btn btn-primary" value="submit"> 
        </div>
        </form>
    </div>
</body>
</html>