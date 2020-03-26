@extends('layout.user.index')

@section('content')
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">Danh sách đề tài</h1>
        <!-- Preview Image -->
        {{-- <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">
        <hr> --}}
        <!-- Post Content -->
        <table class="table">
        <thead>
        <tr>
            <th scope="col">Số thứ tự</th>
            <th scope="col">Tên đề tài</th>
            <th scope="col">Sinh viên thực hiện</th>
            {{-- <th scope="col">GVHD</th> --}}
            <th scope="col">Mô tả</th>
            <th scope="col">Source tham khảo</th>
        </tr>
        </thead>
        @foreach ($danhsachdt as $dt)
        @if($dt->count() > 0)
            <tbody>
            <tr>
                <th scope="row">{{$stt++}}</th>
                <td>{{$dt->tendetai}}</td>
                <td>{{$dt->ho}}{{$dt->ten}}</td>
                <td>{{$dt->mota}}</td>
                <td>{{}}</td>
            </tr>
            </tbody>
        @endif
        @endforeach
        
    </table>
    @if($danhsachdt->count() == 0)
        <center class="error-center">Chưa có đề tài nào</center><br>
    @endif
    </div>
</div>
</div>
@endsection
