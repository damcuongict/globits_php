@extends('layout.web')

@section('content')
    <div class="container">
    <div class="row" style="margin-top: 1cm;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Danh sách Quốc gia</div>

                    <div class="card-body">
                        <a href="{{ route('countries.create') }}" class="btn btn-primary mb-3">Thêm mới quốc gia</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tên quốc gia</th>
                                    <th>Mã quốc gia</th>
                                    <th>Mô tả</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($countries as $country)
                                    <tr>
                                        <td>{{ $country->name }}</td>
                                        <td>{{ $country->code }}</td>
                                        <td>{{ $country->description }}</td>
                                        <td>
                                            <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                                            <form action="{{ route('countries.destroy', $country->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa quốc gia này?')">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
