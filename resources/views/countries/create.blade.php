@extends('layout.web')

@section('web-content')
<div class="container">
    <h1>Tạo mới quốc gia</h1>
    <form method="POST" action="{{ route('countries.store') }}">
        @csrf
        <div class="form-group">
            <label for="code">Mã quốc gia</label>
            <input type="text" class="form-control" id="code" name="code" placeholder="Nhập mã quốc gia">
        </div>
        <div class="form-group">
            <label for="name">Tên quốc gia</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên quốc gia">
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Nhập mô tả"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tạo mới</button>
    </form>
</div>
@endsection
