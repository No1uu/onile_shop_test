@extends('layouts.admin')

@section('content')
    <h1>edit</h1>
    <form action="{{route('admin.category.update', ['id'=>$category->id])}}" method="POST" class="card">
        @csrf
        @method('PUT')
        <div class="field">
            <label for="name">Name</label>
            <input name="name" id="name" type="text" value="{{$category->name}}" required>
        </div>
        <div class="row">
            <button type="submit" class="btn">Save</button>
        </div>
    </form>
@endsection