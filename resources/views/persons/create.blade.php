@extends('layout.web')

@section('content')
    <div class="container"style="margin-top: 1cm;">
        <div class="card" >
            <div class="card-header">Thêm Mới Thông Tin Cá Nhân</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('persons.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="user_id">Người Dùng</label>
                            <select class="form-control" id="user_id" name="user_id" required>
                                <option value="">Chọn người dùng</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="full_name">Họ và Tên</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
                            @error('full_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gender">Giới Tính</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Nam</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Nữ</option>
                            </select>
                            @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Ngày Sinh</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate') }}" required>
                            @error('birthdate')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Số Điện Thoại</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
                            @error('phone_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Địa Chỉ</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm Mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
