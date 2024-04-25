@extends('layout.web')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 1cm;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Chỉnh sửa vai trò</div>
                    <div class="card-body">
                        <form action="{{ route('roles.update', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="role">Vai trò</label>
                                <input type="text" class="form-control" id="role" name="role" value="{{ $role->role }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ $role->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
