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
                    <label class="control-label">服务器 IP</label>
                    <input type="text" class="form-control" id="ip" value="{{ $address }}" readonly>
                </div>
                <div class="form-group">
                    <label class="control-label">服务器端口</label>
                    <input type="text" class="form-control" id="port" value="{{ $port }}" readonly>
                </div>
                <div class="form-group">
                    <label class="control-label">用户名</label>
                    <input type="text" class="form-control" id="username" value="{{ $username }}" readonly>
                </div>
                <div class="form-group">
                    <label for="srpPingContent">密码</label>
                    <input type="password" class="form-control" name="setpw" id="setpw" placeholder="第一次使用请先设置密码">
                </div>

                <div class="btn-group pull-right" role="group">
                    <input type="submit" class="btn btn-primary" value="设置密码" />
                </div>
                {{ csrf_field() }}
            </div>
        </form>
    </div>
    </div>

@stop

@push('javascript')
    <script>
        console.log('Include any JavaScript you may need here!');
    </script>
@endpush