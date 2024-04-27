@extends('layout.web')

@section('content')
    <div class="container" style="margin-top: 1cm;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Danh sách dự án</div>

                    <div class="card-body">
                        <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Tạo mới dự án</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tên dự án</th>
                                    <th>Mã dự án</th>
                                    <th>Mô tả dự án</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                    <tr>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->code }}</td>
                                        <td>{{ $project->description }}</td>
                                        <td>
                                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa dự án này?')">Xóa</button>
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
