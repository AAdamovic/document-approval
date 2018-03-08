@extends('layouts.admin.layout')

@section('seo-title')
<title> Create new user {{ config('app.seo-title-separator') }} {{ config('app.name') }}</title>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create new user</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6">
            <form action="" method="post">
                {{ csrf_field() }}
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label>* Name: </label>
                            <input class="form-control" type="text" name="name" value="{{ old('name') }}" autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>* Email: </label>
                            <input class="form-control" type="text" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                       
                        <!-- select for roles -->
                        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                            <label>Choose user role: </label>
                            <select class="form-control" name="role_id">
                                <option value=''>-- Choose role --</option>
                                @if(count($roles) > 0)
                                @foreach ($roles as $role)
                                <option value="{{$role->id}}" @if(old('role_id') == $role->name) selected  @endif>{{ $role->name }}</option>
                                @endforeach
                                @else
                                <option value="Create roles" </option>
                                @endif
                            </select>
                            
                            @if ($errors->has('role_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('role_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label>Password: </label>
                            <input class="form-control" type="password" name="password" value="">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label>Confirm password: </label>
                            <input class="form-control" type="password" name="password_confirmation" value="">
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection