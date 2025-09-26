@extends('layouts.admin')
<link rel="stylesheet" href="{{asset('assets/css/category.css')}}">
@section('content')
    <header>
        <h1>Create</h1>
        
    </header>
    <form action="{{route('admin.category.store')}}" method="POST" class="card">
        @csrf
        <div class="field">
            <label for="name">Name</label>
            <input name="name" id="name" type="text" value ="{{ old('name') }}">
        </div>
        <div class="row">
            <button type="submit" class="btn">Save</button>
        </div>
    </form>
    
@endsection