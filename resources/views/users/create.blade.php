@extends('layout.web')

@section('content')
<div class="container" style="margin-top: 1cm;">
    <div class="card">
            <div class="card-header">Tạo Người Dùng Mới</div>
            <div class="card-body">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" >
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Mật Khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" >
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="is_active">Trạng Thái Hoạt Động</label>
                        <select class="form-control" id="is_active" name="is_active" >
                            <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Hoạt Động</option>
                            <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Không Hoạt Động</option>
                        </select>
                        @error('is_active')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tạo Người Dùng</button>
                </form>
            </div>
         </div>
    </div>
 </div>
@endsection
