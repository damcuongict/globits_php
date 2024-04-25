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
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" >
                    </div>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="full_name">Họ và tên đầy đủ</label>
                        <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" value="{{ $person->full_name }}" >
                    </div>
                    @error('full_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="gender">Giới Tính</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="Male" @if ($person->gender == 'Male') selected @endif>Nam</option>
                            <option value="Female" @if ($person->gender == 'Female') selected @endif>Nữ</option>
                        </select>
                        @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="birthdate">Ngày sinh</label>
                        <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" name="birthdate" value="{{ $person->birthdate }}">
                    </div>
                    @error('birthdate')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="phone_number">Số điện thoại</label>
                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ $person->phone_number }}">
                    </div>
                    @error('phone_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" >{{ $person->address }}</textarea>
                    </div>
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="company_id">Công ty</label>
                        <select class="form-control @error('company_id') is-invalid @enderror" id="company_id" name="company_id">
                            <option value="">Chọn công ty</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" @if ($person->company_id == $company->id) selected @endif>{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('company_id')
                            <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection
