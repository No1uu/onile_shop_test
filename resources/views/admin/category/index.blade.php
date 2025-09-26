@extends('layouts.admin')
<link rel="stylesheet" href="{{asset('assets/css/category.css')}}">
@section('content')
    <header>
        <h1>Categories</h1>
        <a href="{{route('admin.category.create')}}">create</a>
    </header>
    @forelse ($categories as $Category)
        <div class="card">
            <h3>{{ $Category->name }}</h3> 
            <a class="btn" href="{{ route('admin.category.edit',['id' => $Category->id]) }}">Edit category</a>
            <a class="btn" href="{{ route('admin.category.destroy',['id' => $Category->id]) }}">Delete category</a>
        </div>
    @empty 
        <p>Хоосон</p>
    @endforelse
@endsection