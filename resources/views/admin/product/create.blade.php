@extends('layouts.admin')

@section('content')
    <h1>Create</h1>
    <form action="{{route('admin.product.store')}}" method="POST" class="card" enctype="multipart/form-data">
        @csrf
        <div class="">
            <label for="">Category</label>
            <select name="category_id" id="">
                <option value="">Songoh</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="">
            <label for="">Name</label>
            <input type="text" name="name" id="">
        </div>
        <div class="">
            <label for="">Price</label>
            <input type="text" name="price">
        </div>
        <div class="">
            <label for="">Stock</label>
            <input type="text" name="stock">
        </div>
        <div class="">
            <label for="">Description</label>
            <textarea name="description" id="" rows="3"></textarea>
        </div>
        <div class="">
            <label for="">Image</label>
            <input type="file" name="image">
        </div>

        <button type="submit" class="btn">Save</button>
    </form>
@endsection