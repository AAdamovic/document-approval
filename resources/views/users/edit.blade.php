@extends('layouts.admin.layout')

@section('seo-title')
<title> Edit user {{ $user->name }} {{ config('app.seo-title-separator') }} {{ config('app.name') }}</title>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit user - {{ $user->name }}</h1>
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
                            <input class="form-control" type="text" name="name" value="{{ old('name', $user->name) }}" autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>* Email: </label>
                            <input class="form-control" type="text" name="email" value="{{ $user->email }}" disabled>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                     
                        <!-- select for roles -->
                        <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                            <label>Choose user role: </label>
                            <select class="form-control" name="role_id"  @if ( auth()->user()->role->name != \App\User::ROLE_ADMINISTRATOR) disabled @endif>
                                <option value=''>-- Choose role --</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}" @if(old('role_id', $user->role->name) == $role->name) selected  @endif>{{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
                            
                            @if ($errors->has('role_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('role_id') }}</strong>
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