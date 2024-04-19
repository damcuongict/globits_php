@extends('layout.web')

@section('web-content')
<div class="container">
    <h1>Chỉnh sửa quốc gia</h1>
    <form method="POST" action="{{ route('countries.update', $country->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="code">Mã quốc gia</label>
            <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code', $country->code) }}" placeholder="Nhập mã quốc gia">
            @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Tên quốc gia</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $country->name) }}" placeholder="Nhập tên quốc gia">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Nhập mô tả">{{ old('description', $country->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection
