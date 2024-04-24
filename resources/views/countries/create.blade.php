@extends('layout.web')

@section('content')
<div class="container" style="margin-top: 1cm;">
    <div class="card">
    <div class="card-header">Thêm mới quốc gia</div>
        <div class="card-body">
            <form method="POST" action="{{ route('countries.store') }}">
                @csrf
                <div class="form-group">
                    <label for="code">Mã quốc gia</label>
                    <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" placeholder="Nhập mã quốc gia" value="{{ old('code') }}">
                    @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Tên quốc gia</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nhập tên quốc gia" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Nhập mô tả">{{ old('description') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
</div>
@endsection
