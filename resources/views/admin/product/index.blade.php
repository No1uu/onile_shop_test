@extends('layouts.admin')

@section('content')
    <h1>Products</h1>
    <div class="card">
        <table style="width:100% ;margin-top:40px; border-collapse:collapse; border:1px solid pink ; border-radius:5px;">
            <thead>
                <tr>
                    <th style="padding:8px; border-bottom:1px solid pink;">ID</th>
                    <th style="padding:8px; border-bottom:1px solid pink;">Нэр</th>
                    <th style="padding:8px; border-bottom:1px solid pink;">үнэ</th>
                    <th style="padding:8px; border-bottom:1px solid pink;">Үлдэгдэл</th>
                    <th style="padding:8px; border-bottom:1px solid pink;">Үйлдэл</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $item)
                    <tr>
                        <td style="padding:8px; text-align:center">{{ $item->id}}</td>
                        <td style="padding:8px; text-align:center">{{ $item->name}}</td>
                        <td style="padding:8px; text-align:center" >{{ $item->price}}</td>
                        <td style="padding:8px; text-align:center" >{{ $item->stock}}</td>
                        <td style="padding:8px; text-align:center; display:flex; flex-direction:row;">
                            <a href="{{ route('admin.product.edit',[ 'id'=> $item->id])}}" style="text-decoration:none; color:black;margin-right:10px; border:1px solid black; border-radius:5px; padding:0 4px 0 4px">засах</a>
                            <form action="{{ route('admin.product.destroy' , ['id' => $item->id]) }}" method="post" onsubmit="return confirm('Устгах даа итгэлтэй байна уу?')">
                                @csrf
                                @method('delete')
                                <button type="submit" style="background-color:#fff; border:1px solid #000; cursor:pointer; border-radius:5px">Устгах</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding:12px">Хоосон байна.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>  
@endsection