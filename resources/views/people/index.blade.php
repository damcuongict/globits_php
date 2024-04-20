@extends('layout.web')

@section('content')
    <div class="container">
        <h1>Danh sách nguòi dùng</h1>
        
        <a href="{{ route('people.create') }}" class="btn btn-primary">Thêm người dùng mới</a>

        @if ($people->count() > 0)
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Họ và tên đầy đủ</th>
                        <th scope="col">Giới tính</th>
                        <th scope="col">Ngày sinh</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($people as $person)
                        <tr>
                            <td>{{ $person->id }}</td>
                            <td>{{ $person->full_name }}</td>
                            <td>{{ $person->gender }}</td>
                            <td>{{ $person->birthdate }}</td>
                            <td>{{ $person->phone_number }}</td>
                            <td>{{ $person->address }}</td>
                            <td>
                                <a href="{{ route('people.edit', $person->id) }}" class="btn btn-sm btn-primary">Chỉnh sửa</a>
                                <form action="{{ route('people.destroy', $person->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Không có người nào được tìm thấy.</p>
        @endif
    </div>
@endsection
