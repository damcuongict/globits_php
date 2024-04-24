@extends('layout.web')

@section('content')
    <div class="container">
    <div class="row" style="margin-top: 1cm;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Danh sách thông tin cá nhân</div>
                    <div class="card-body">
                        <a href="{{ route('persons.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Giới tính</th>
                                    <th scope="col">Ngày sinh</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Email</th>                 
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($persons as $person)
                                <tr>
                                    <td>{{ $person->id }}</td>
                                    <td>{{ $person->full_name }}</td>
                                    <td>{{ $person->gender }}</td>
                                    <td>{{ $person->birthdate }}</td>
                                    <td>{{ $person->phone_number }}</td>
                                    <td>{{ $person->address }}</td>
                                    <td>{{ $person->user ? $person->user->email : 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('persons.edit', $person->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                                        <form action="{{ route('persons.destroy', $person->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
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
