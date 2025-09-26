@extends('layouts.admin')

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <div class="text-sm text-gray-500 mb-2">ID: {{ $product->id }}</div>
        <div class="text-lg font-semibold">{{ $product->category_id }}</div>
        <div class="text-lg font-semibold">{{ $product-> name }}</div>
        <div class="text-lg font-semibold">{{ $product-> price }}</div>
        <div class="text-lg font-semibold">{{ $product-> stock }}</div>
        <div class="text-lg font-semibold">{{ $product-> description }}</div>
        <div class="text-lg font-semibold">{{ $product-> image }}</div>

        <div class="mt-4 flex items-center gap-3">
            <a href="{{ route('admin.product.edit',[ 'id'=> $product->id])}}" class="px-4 py-2 rounded-md border border-gray-300 hover:bg-black-50">Засах</a>
            <a href="{{route('admin.products')}}" class="px-4 py-2 rounded-md border border-gray-300 hover:bg-black-50">Буцах</a>
        </div>
    </div>
@endsection