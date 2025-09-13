@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>
    @forelse ($categories as $category)
        <div class="card">
            <h3>{{ $category->name }}</h3> 
            <a class="btn" style="border: 1px solid green; color:green; border-radius:6px" href="{{ route('admin.category.edit',['id' => $category->id]) }}">Edit category</a>
            <a class="btn" style="border: 1px solid red; color:red; border-radius:6px" href="{{ route('admin.category.destroy',['id' => $category->id]) }}">Delete category</a>
        </div>
    @empty 
        <p>Хоосон</p>
    @endforelse
@endsection