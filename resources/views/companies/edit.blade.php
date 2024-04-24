@extends('layout.web')

@section('content')
<div class="container" style="margin-top: 1cm;">
    <div class="card">
        <div class="card-header">Chỉnh sửa thông tin công ty</div>
        <div class="card-body">
        <form method="POST" action="{{ route('companies.update', $company->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên công ty</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $company->name) }}" placeholder="Nhập tên công ty">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="code">Mã công ty</label>
                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code', $company->code) }}" placeholder="Nhập mã công ty">
                @error('code')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $company->address) }}" placeholder="Nhập địa chỉ công ty">
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
    </div>
@endsection
