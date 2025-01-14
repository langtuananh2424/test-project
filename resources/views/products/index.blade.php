@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h1>Products</h1></div>
                        <div class="col-sm-3">
                            <a href="{{route('products.create')}}" class="btn btn-info add-new rounded-pill"><b>+</b> Thêm mới</a>
                        </div>
                    </div>
                </div>
                <table class="table table-responsive-md table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Tên cửa hàng</th>
                        <th>Ngày tạo</th>
                        <th colspan="2">Hành Động</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->store->name}}</td>
                                <td>{{$product->created_at->format('d/m/Y')}}</td>
                                <td><a href="{{route('products.edit', $product->id)}}" class="btn btn-warning rounded-circle">Sửa</a></td>
                                <td>
                                    <form action="{{route('products.destroy', $product->id)}}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded-circle" onclick="return confirm('Bạn chắc chắn muốn xoá ?')">Xoá</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
