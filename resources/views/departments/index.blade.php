@extends('layout.web')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 1cm;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Danh sách phòng ban</div>
                    <div class="card-body">
                        <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">Tạo mới phòng ban</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Mã phòng ban</th>
                                    <th>Tên phòng ban</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($departments as $department)
                                    @if($department->parent_id === null)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="department_id[]" value="{{ $department->id }}">
                                            </td>
                                            <td>{{ $department->code }}</td>
                                            <td>{{ $department->name }}</td>
                                            <td>
                                                <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                                                <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa phòng ban này?')">Xóa</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <!-- Hiển thị các phòng ban con của phòng ban cha -->
                                        @foreach($departments as $child)
                                            @if($child->parent_id === $department->id)
                                                <tr>
                                                    <td></td>
                                                    <td>{{ $child->code }}</td>
                                                    <td>{{ $child->name }}</td>
                                                    <td>
                                                        <a href="{{ route('departments.edit', $child->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                                                        <form action="{{ route('departments.destroy', $child->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa phòng ban này?')">Xóa</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
