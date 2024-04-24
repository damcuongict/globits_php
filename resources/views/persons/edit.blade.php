

@extends('layout.web')

@section('content')
    <div class="container" style="margin-top: 1cm;">
        <div class="card">
            <div class="card-header">Chỉnh sửa thông tin cá nhân</div>
                <div class="card-body">
                        <form action="{{ route('persons.update', $person->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                            </div>
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
                            <div class="form-group">
                                <label for="company_id">Công ty</label>
                                <select class="form-control" id="company_id" name="company_id" required>
                                    <option value="">Chọn công ty</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}" @if ($person->company_id == $company->id) selected @endif>{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
