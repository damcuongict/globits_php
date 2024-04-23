

@extends('layout.web')

@section('content')
    <div class="container">
        <h1>Chỉnh sửa thông tin person</h1>

        <form action="{{ route('people.update', $person->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="full_name">Họ và tên đầy đủ</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $person->full_name }}" required>
            </div>
            <div class="form-group">
                <label for="gender">Giới tính</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="Nam" @if ($person->gender == 'Nam') selected @endif>Nam</option>
                    <option value="Nữ" @if ($person->gender == 'Nữ') selected @endif>Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="birthdate">Ngày sinh</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $person->birthdate }}" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Số điện thoại</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $person->phone_number }}" required>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <textarea class="form-control" id="address" name="address" rows="3" required>{{ $person->address }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
@endsection
