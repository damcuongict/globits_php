@extends('layout.web')

@section('content')
    <div class="container" style="margin-top: 1cm;">
        <div class="card">
            <div class="card-header">Tạo mới dự án</div>
            <div class="card-body">
                <form method="POST" action="{{ route('projects.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên dự án</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên dự án">
                    </div>
                    <div class="form-group">
                        <label for="code">Mã dự án</label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="Nhập mã dự án">
                    </div>
                    <div class="form-group">
                        <label for="description">Mô tả dự án</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Nhập mô tả dự án"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="company">Chọn công ty</label>
                        <select class="form-control" id="company" name="company_id">
                            <option value="">-- Chọn công ty --</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="persons">Chọn nhân viên</label>
                        <select  class="form-control" id="persons" name="persons[]">
                            <option value="">-- Chọn nhân viên --</option>
                            @foreach($persons as $person)
                                <option value="{{ $person->id }}">{{ $person->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tạo dự án</button>
                </form>
            </div>
        </div>
    </div>
@endsection
