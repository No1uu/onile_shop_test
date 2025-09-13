@extends('layouts.admin')

@section('content')
    <h1>Create</h1>
    <form action="{{route('admin.product.store')}}" method="POST" class="card">
        @csrf
        <div class="field">
            <label for="name">Name</label>
            <input name="name" id="name" type="text" value ="{{ old('name') }}">
            @error('name')
                <div class="" style= "color:red; font-size:14px;"> {{ $message}}</div>
            @enderror
        </div>
        <div class="field">
            <label for="description">Description</label>
            <textarea name="description" id="description">{{old('description')}}</textarea>
        </div>
        <div class="field">
            <label for="price">price</label>
            <input name="price" id="price" type="number" value ="{{ old('price') }}">
            @error('price')
                <div class="" style= "color:red; font-size:14px;"> {{ $message}}</div>
            @enderror
        </div>
        <div class="field">
            <label for="stock">stock</label>
            <input name="stock" id="stock" type="number" value ="{{ old('stock') }}">
            @error('stock')
                <div class="" style= "color:red; font-size:14px;"> {{ $message}}</div>
            @enderror
        </div>
        <div class="row">
            <button type="submit" class="btn">Save</button>
        </div>
    </form>
@endsection