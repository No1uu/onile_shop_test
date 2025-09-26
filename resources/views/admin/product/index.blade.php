@extends('layouts.admin')

@section('content')
    <h1>Products</h1>

    <a href="{{route('admin.product.create')}}">create</a>
    <div class="card">
        <table style="width:100% ;margin-top:40px; border-collapse:collapse; border:1px solid pink ; border-radius:5px;">
            <thead>
                <tr>
                    <th style="padding:8px; border-bottom:1px solid pink;">ID</th>
                    <th style="padding:8px; border-bottom:1px solid pink;">Category</th>
                    <th style="padding:8px; border-bottom:1px solid pink;">Нэр</th>
                    <th style="padding:8px; border-bottom:1px solid pink;">Үнэ</th>
                    <th style="padding:8px; border-bottom:1px solid pink;">Үлдэгдэл</th>
                    <th style="padding:8px; border-bottom:1px solid pink;">Үйлдэл</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr >
                        <td style="padding:8px; text-align:center">{{ $product->id}}</td>
                        <td style="padding:8px; text-align:center">{{ $product->category->id}}</td>
                        <td style="padding:8px; text-align:center" >{{ $product->name}}</td>
                        <td style="padding:8px; text-align:center" >{{ $product->price}}</td>
                        <td style="padding:8px; text-align:center" >{{ $product->stock}}</td>
                        <td style="padding:8px; text-align:center; display:flex; flex-direction:row;">
                        <td>
                            <div class="flex flex-row gap-2">
                                <a href="{{ route('admin.product.show',[ 'id'=> $product->id])}}" style="text-decoration:none; color:white ;margin-right:10px; border:1px solid white; border-radius:5px; padding:0 4px 0 4px">Харах</a>
                                <a href="{{ route('admin.product.edit',[ 'id'=> $product->id])}}" style="text-decoration:none; color:white ;margin-right:10px; border:1px solid white; border-radius:5px; padding:0 4px 0 4px">засах</a>
                                <form action="{{ route('admin.product.destroy' , ['id' => $product->id]) }}" method="post" id="delete-form-{{$product->id}}">
                                @csrf
                                @method('delete')
                                <button onclick="confirmDelete({{$product->id}})" type="button"; style="background-color:#fff; border:1px solid #000; cursor:pointer; border-radius:5px" class="btn">Устгах</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding:12px">Хоосон байна.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div> 

    <script>
        function confirmDelete($id) {
            Swal.fire({
            title: "Устгахдаа итгэлтэй байна уу?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Устгах!",
            cancelButtonText: "Буцах!"
            }).then((result)=>{
                if(result.isConfirmed){
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>

@endsection