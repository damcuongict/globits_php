@extends('layout.web')

@section('web-content')
<div class="container">
    <h1>Danh sách quốc gia</h1>
    <a href="{{ route('countries.create') }}" class="btn btn-primary mb-2">Tạo mới</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Mã</th>
                <th scope="col">Tên</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($countries as $country)
            <tr>
                <th scope="row">{{ $country->id }}</th>
                <td>{{ $country->code }}</td>
                <td>{{ $country->name }}</td>
                <td>{{ $country->description }}</td>
                <td>
                    <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-primary">Chỉnh sửa</a>
                    <form id="delete-form-{{ $country->id }}" action="{{ route('countries.destroy', $country->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa quốc gia này?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
