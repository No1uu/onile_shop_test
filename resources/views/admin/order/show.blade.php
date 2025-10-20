@extends('layouts.admin')

@section('content')

    <div class="max-w-6xl mx-2 p-2 rounded -md shadow">
        <div class="flex items-start justify-between mb-4">
            <div class="">
                <h2 class="text-xl font-semibold"> Захиалгийн дугаар #{{ $order->id}}</h2>
                <div class="text-sm">Захиалагч:{{$order->user->name}}</div>
                <div class="text-sm">Захиалга үүссэн огноо:{{$order->created_at}}</div>
                    <div class="mb-2 text-lg font-semibold ">
                        Нийт дүн:{{ number_format($order->subtotal)}}₮
                    </div>
                    @if($order->status === 'paid')
                        <span class="inline-block px-3 py-1 rounded bg-green-100 text-green-700">Төлөгдсөн</span>
                    @endif

                    @if($order->status === 'unpaid')
                        <span class="inline-block px-3 py-1 rounded bg-red-100 text-red-700">Төлөгдөөгүй</span>
                    @endif
            </div>
        </div>
    </div>
    <table class="w-full divide-y divide-gray-200 mb-2">
        <thead>
            <tr>
                <th class="px-4 py-2 text-center text-sm text-gray-500">Барааны нэр</th>
                <th class="px-4 py-2 text-center text-sm text-gray-500">Үнэ</th>
                <th class="px-4 py-2 text-center text-sm text-gray-500">Тоо хэмжээ</th>
                <th class="px-4 py-2 text-center text-sm text-gray-500">Нийт</th>
            </tr>
        </thead>    
        <tbody>
            @foreach($items as $item)
                @php
                    $subtotal = $item->unit_price * $item->quantity;
                @endphp
                <tr>
                    <td class="px-4 py-2 text-center text-sm">{{ $item->product->name}}</td>
                    <td class="px-4 py-2 text-center text-sm">{{ $item->unit_price }}</td>
                    <td class="px-4 py-2 text-center text-sm">{{ $item->quantity }}</td>
                    <td class="px-4 py-2 text-center text-sm">{{ $subtotal}}</td>
                </tr>
            @endforeach
        </tbody>
        
    </table>

@endsection