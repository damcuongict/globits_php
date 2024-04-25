@extends('layout.web')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 1cm;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Danh sách các vai trò</div>
                            <div class="card-body">
                            <a href="{{ route('roles.create') }}" class="btn btn-primary">Thêm vai trò mới</a>
                            @if ($roles->count() > 0)
                                <table class="table mt-3">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Vai trò</th>
                                            <th scope="col">Mô tả</th>
                                            <th scope="col">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td>{{ $role->id }}</td>
                                                <td>{{ $role->role }}</td>
                                                <td>{{ $role->description }}</td>
                                                <td>
                                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline-block;">
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
                                <p>Không có vai trò nào được tìm thấy.</p>
                            @endif
                        </div>
                    </div>
                 </div>
            </div>
         </div>
@endsection
