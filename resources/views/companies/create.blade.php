@extends('layout.web')

@section('content')
<div class="container" style="margin-top: 1cm;">
    <div class="card">
    <div class="card-header">Thêm mới công ty</div>
        <div class="card-body">
            <form action="{{ route('companies.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Tên công ty:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="code">Mã công ty:</label>
                    <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}" required>
                </div>

                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Tạo mới</button>
            </form>
        </div>
    </div>
</div>
@endsection