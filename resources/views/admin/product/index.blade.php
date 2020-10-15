@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin">後臺</a></li>
        <li class="breadcrumb-item active" aria-current="page">商品管理</li>
    </ol>
</nav>

<a href="/admin/product/create" class="btn btn-success mb-3">新增商品</a>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>名稱</th>
            <th>圖片</th>
            <th>價錢</th>
            <th>介紹內容</th>
            <th>上架日期</th>
            <th width="80">功能</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($news_list as $product)
            <tr>
                <td>{{$product->name}}</td>
                <td>
                    <img width="200" src="{{$product->product_image}}" alt="">
                </td>
                <td>{{$product->price}}</td>
                <td>{{$product->info}}</td>
                <td>{{$product->created_at}}</td>
                <td>
                    <a href="/admin/product/edit/{{$product->id}}" class="btn btn-sm btn-primary">編輯</a>
                    <button class="btn btn-danger btn-sm btn-delete" data-newsid="{{$product->id}}">刪除</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{--  --}}

@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $("#example").on("click", ".btn-delete", function(){
                var news_id = this.dataset.newsid;

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    // Swal.fire(
                    // 'Deleted!',
                    // 'Your file has been deleted.',
                    // 'success'
                    // )
                    window.location.href = `/admin/product/destroy/${news_id}`;

                    }
                })
            });
        });
    </script>
@endsection
