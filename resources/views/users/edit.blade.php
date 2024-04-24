@extends('layout.web')

@section('content')
<div class="container" style="margin-top: 1cm;">
    <div class="card">
            <div class="card-header">Chỉnh sửa thông tin người dùng</div>
            <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" class="form-control" id="password" name="password"value="{{ $user->password }}">
                        </div>
                        <div class="form-group">
                            <label for="is_active">Trạng thái hoạt động</label>
                            <select class="form-control" id="is_active" name="is_active" required>
                                <option value="1" {{ $user->is_active ? 'selected' : '' }}>Hoạt động</option>
                                <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Không hoạt động</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </form>
                </div>
        </div>
    </div>
@endsection
