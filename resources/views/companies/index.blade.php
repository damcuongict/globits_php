@extends('layout.web')

@section('content')
    <div class="container"style="margin-top: 1cm;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Danh sách Công ty</div>

                    <div class="card-body">
                        <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">Tạo mới công ty</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tên công ty</th>
                                    <th>Mã công ty</th>
                                    <th>Địa chỉ</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->code }}</td>
                                        <td>{{ $company->address }}</td>
                                        <td>
                                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa công ty này?')">Xóa</button>
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