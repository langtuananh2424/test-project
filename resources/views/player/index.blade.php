@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h1>Players</h1></div>
                        <div class="col-sm-3">
                            <a href="{{route('player.create')}}" class="btn btn-info add-new rounded-pill"><b>+</b> Thêm mới</a>
                        </div>
                    </div>
                </div>
                <table class="table table-responsive-md table-hover">
                    <thead>
                    <tr>
                        <th>Tên cầu thủ</th>
                        <th>Vị trí</th>
                        <th>Số áo</th>
                        <th>Ngày sinh</th>
                        <th>Tên Câu Lạc Bộ</th>
                        <th colspan="2">Hành Động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($players as $player)
                        <tr>
                            <td>{{$player->name}}</td>
                            <td>{{$player->position}}</td>
                            <td>{{$player->number}}</td>
                            <td>{{$player->birthday}}</td>
                            <td>{{$player->club->name}}</td>
                            <td><a href="{{route('player.edit', $player->id)}}" class="btn btn-warning rounded-circle">Sửa</a></td>
                            <td>
                                <form action="{{route('player.destroy', $player->id)}}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger rounded-circle" onclick="return confirm('Bạn chắc chắn muốn xoá ?')">Xoá</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $players->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
