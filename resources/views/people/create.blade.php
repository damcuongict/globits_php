@extends('layout.web')

@section('content')
    <div class="container">
        <h1>Tạo người mới</h1>

        <form action="{{ route('people.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="full_name">Họ và tên đầy đủ</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>
            <div class="form-group">
                <label for="gender">Giới tính</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="birthdate">Ngày sinh</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Số điện thoại</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Gửi</button>
        </form>
    </div>
@endsection
