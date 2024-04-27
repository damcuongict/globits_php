@extends('layout.web')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 1cm;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Chỉnh sửa thông tin phòng ban</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('departments.update', $department->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Tên phòng ban:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $department->name) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="code">Mã phòng ban:</label>
                                <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $department->code) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="company_id">Công ty:</label>
                                <select class="form-control" id="company_id" name="company_id" readonly>
                                    <option value="{{ $department->company_id }}">{{ $department->company->name }}</option>
                                </select>
                            </div>
                            <h5>Các phòng ban con:</h5>
                            @foreach($department->children as $child)
                                    <div class="child-department">
                                        <div class="form-group">
                                            <label for="child_name_{{ $child->id }}">Tên phòng ban con:</label>
                                            <input type="text" class="form-control" id="child_name_{{ $child->id }}" name="child_name_{{ $child->id }}" value="{{ old('child_name_'.$child->id, $child->name) }}" required>
                                        </div>
                                    </div>
                                @endforeach

                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
