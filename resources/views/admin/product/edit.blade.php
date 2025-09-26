@extends('layouts.admin')

@section('content')
    <h1>Edit</h1>
    <form action="{{route('admin.product.update', ['id' => $product->id])}}" method="POST" class="card">
        @csrf
        @method('PUT')
        <div class="">
            <label for="">Category</label>
            <select name="category_id" id="">
                <option value="">Songoh</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            <label for="">Name</label>
            <input type="text" name="name" id="" value="{{ $product->name }}">
        </div>
        <div class="">
            <label for="">Price</label>
            <input type="text" name="price" value="{{ $product->price }}">
        </div>
        <div class="">
            <label for="">Stock</label>
            <input type="text" name="stock" value="{{ $product->stock }}">
        </div>
        <div class="">
            <label for="">Description</label>
            <textarea name="description" id="" rows="3">{{ $product->description }}</textarea>
        </div>
        <div class="">
            <label for="">Image</label>
            @if($product->image)
                <img src="{{ Storage::url($product->image)}}" class="w-24 h-24 rounded object-cover mb-2">
            @endif
            <input type="file" name="image" >
        </div>

        <button type="submit" class="btn1">Шинчлэх</button>
    </form>

    <script>
        
    </script>
@endsection