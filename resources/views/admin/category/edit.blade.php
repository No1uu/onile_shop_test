@extends('layouts.admin')
<link rel="stylesheet" href="{{asset('assets/css/category.css')}}">
@section('content')
    <header>
        <h1>edit</h1>
    </header>
    <form action="{{route('admin.category.update', ['id'=>$Category->id])}}" method="POST" class="card">
        @csrf
        @method('PUT')
        <div class="field">
            <label for="name">Name</label>
            <input name="name" id="name" type="text" value="{{$Category->name}}" required>
        </div>
        <div class="row">
            <button type="submit" class="btn">Save</button>
        </div>
    </form>
@endsection