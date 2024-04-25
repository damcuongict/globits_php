@extends('layout.web')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 1cm;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tạo mới vai trò</div>
                    <div class="card-body">
                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="role">Vai trò</label>
                                <input type="text" class="form-control" id="role" name="role" placeholder="Nhập tên vai trò">
                            </div>
                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Nhập mô tả của vai trò"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Tạo mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
