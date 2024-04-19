@extends('layout.web')

@section('web-content')
<div class="container">
    <h1>Danh sách quốc gia</h1>
    <a href="{{ route('countries.create') }}" class="btn btn-primary mb-2">Thêm mới</a>
    <table class="table">
        <thead >
            <tr>
                <th >ID</th>
                <th >Mã</th>
                <th >Tên</th>
                <th >Mô tả</th>
                <th >Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($countries as $country)
            <tr>
                <th >{{ $country->id }}</th>
                <td>{{ $country->code }}</td>
                <td>{{ $country->name }}</td>
                <td>{{ $country->description }}</td>
                <td>
                    <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-warning">Sửa</a>
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
