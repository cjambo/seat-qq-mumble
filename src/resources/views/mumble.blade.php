@extends('web::layouts.grids.12')

@section('title', 'Mumble Certificate')

@section('full')

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Mumble 凭证</h3>
        </div>
        <form method="POST" action="">
            <div class="card-body">
                <div class="form-group">
                    <label for="ip">服务器 IP</label>
                    <input type="text" class="form-control" id="ip" value="{{ $address }}" readonly>
                </div>
                <div class="form-group">
                    <label for="port">服务器端口</label>
                    <input type="text" class="form-control" id="port" value="{{ $port }}" readonly>
                </div>
                <div class="form-group">
                    <label for="username">用户名</label>
                    <input type="text" class="form-control" id="username" value="{{ $username }}" readonly>
                </div>
                <div class="form-group">
                    <label for="setpw">密码</label>
                    <input type="text" class="form-control" name="setpw" id="setpw" value="{{ $password }}" readonly>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <input type="submit" class="btn btn-danger " value="重置密码" />
                </div>
                {{ csrf_field() }}
            </div>
        </form>
    </div>

@stop

@push('javascript')
    <script>
        console.log('Include any JavaScript you may need here!');
    </script>
@endpush
