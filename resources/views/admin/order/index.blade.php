@extends('layouts.admin')

@section('content')
<h1>Order</h1>

        <table style="width:100% ;margin-top:40px; border-collapse:collapse; border:1px solid pink ; border-radius:5px;">
            <thead>
                <tr>
                    <th style="padding:8px; border-bottom:1px solid pink;">Захиалгийн ID</th>
                    <th style="padding:8px; border-bottom:1px solid pink;">Захиалагчийн нэр</th>
                    <th style="padding:8px; border-bottom:1px solid pink;">Нийт дүн</th>
                    <th style="padding:8px; border-bottom:1px solid pink;">Төлөв</th>
                    <th style="padding:8px; border-bottom:1px solid pink;">Үйлдэл</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                    <tr >
                        <td style="padding:8px; text-align:center">{{ $order->id}}</td>
                        <td style="padding:8px; text-align:center">{{ $order->user->name}}</td>
                        <td style="padding:8px; text-align:center" >{{ $order->subtotal}}</td>
                        <td style="padding:8px; text-align:center" >{{ $order->status}}</td>
                        <td style="padding:8px; text-align:center; display:flex; flex-direction:row;">
                            <div class="flex flex-row gap-2">
                                <a href="{{ route('admin.order.show',['id'=> $order->id])}}" style="text-decoration:none; color:white ;margin-right:10px; border:1px solid white; border-radius:5px; padding:0 4px 0 4px">Дэлгэрэнгүй харах</a>
                                @if(!in_array($order->status, ['paid', 'unpaid']))
                                    <form action="{{route('admin.order.markPaid',['id' => $order->id])}}" method="post">
                                        @csrf
                                        <button type="submit" style="text-decoration:none; color:white ;margin-right:10px; border:1px solid white; border-radius:5px; padding:0 4px 0 4px">Төлбөр төлсөн</button>
                                    </form>
                                    <form action="{{route('admin.order.unpaid',['id' => $order->id])}}" method="post">
                                        @csrf
                                        <button type="submit" style="text-decoration:none; color:white ;margin-right:10px; border:1px solid white; border-radius:5px; padding:0 4px 0 4px">Төлбөр төлөөгүй</button>
                                    </form>
                                @endif
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