@extends('layouts.admin')

@section('content')
    <h1>edit</h1>
    <form action="{{ route ('admin.product.update', ['id' => $product->id])}}" method="POST" class="card">
        @csrf
        @method('PUT')
        <div class="field">
            <label for="name">Name</label>
            <input name="name" id="name" type="text" value="{{$product->name}}" required>
        </div>
        <div class="field">
            <label for="Description">Description</label>
            <textarea name="Description" id="Description"></textarea>
        </div>
        <div class="field">
            <label for="Price">Price</label>
            <input name="Price" id="Price" type="number" value="{{$product->price}}" required>
        </div>
        <div class="field">
            <label for="stock">stock</label>
            <input name="stock" id="stock" type="number" value="{{$product->stock}}" required>
        </div>
        <div class="row">
            <button type="submit" class="btn">Save</button>
        </div>
    </form>
@endsection