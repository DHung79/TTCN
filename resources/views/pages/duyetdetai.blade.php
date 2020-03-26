@extends('layout.user.index')

@section('content')
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">Duyệt đề tài</h1>
        <!-- Preview Image -->
        {{-- <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">
        <hr> --}}
        <!-- Post Content -->
        <center><span class="error-center">@if(count($errors)>0)
            @foreach($errors->all() as $err)
                {{$err}}</br>
            @endforeach
        @endif
        @if(session('status'))
            {{session('status')}}
        @endif</span></center>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên đề tài</th>
                <th scope="col">Sinh viên thực hiện</th>
                <th scope="col">Mô tả</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            @foreach ($duyet as $dt)
                @if($dt->count() > 0)
                <form method="POST" action="{{route('duyetdt')}}">
                    {{-- @csrf --}}
                    {{-- {{csrf_field()}}
                    {{ method_field('PUT') }} --}}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <tbody>
                    <tr>
                        <th scope="row">{{$stt++}}</th>
                        <td>{{$dt->tendetai}}</td>
                        <td>{{$dt->ho}}{{$dt->ten}}</td>
                        <td>{{$dt->mota}}</td>
                        <input type="hidden" name="svdt" value="{{$dt->ho}}{{$dt->ten}}">
                        <input type="hidden" name="iddetai" value="{{$dt->id}}">
                        <td><button type="submit" name="duyet" value="duyet" class="btn btn-info">Duyệt</button></td>
                        <td><button type="submit" name="xoa" value="xoa" class="btn btn-info">Xóa</button></td>
                    </tr>
                    </tbody>
                </form>
                @endif
                @endforeach
                @if($duyet->count() == 0)
                <tbody>
                    <tr>
                    <td>Không có đề tài đợi duyệt nào</td>
                    </tr>
                </tbody>
                @endif
            </table>
        </div>
    </div>
</div>
@endsection
