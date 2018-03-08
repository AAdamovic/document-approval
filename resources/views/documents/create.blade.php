

@extends('layouts.admin.layout')

@section('seo-title')
<title> Create new Document {{config('app.seo-title-separator')}} {{ config('app.name')}} </title>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create new document</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <form action="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="panel panel-default">
                    
                    <div class="panel-body">
                        
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label>* Title: </label>
                            <input class="form-control" type="text" name="title" value="{{ old('title') }}" autofocus>
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label>* Description: </label>
                            <input class="form-control" type="text" name="description" value="{{ old('description') }}" autofocus>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                            <label>Choose user role: </label>
                            <select class="form-control" name="priority">
                                <option value=''>-- Choose role --</option>
                                @if(count($roles) > 0)
                                @foreach ($roles as $role)
                                <option value="{{$role->priority}}" @if(old('priority') == $role->name) selected  @endif>{{ $role->name }}</option>
                                @endforeach
                                @else
                                <option value="Create roles" </option>
                                @endif
                            </select>
                            
                            @if ($errors->has('priority'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('priority') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        
                        <div class="form-group{{ $errors->has('document') ? ' has-error' : '' }}">
                            <label>Document: </label>
                            <input type="file" name="document">
                            @if ($errors->has('document'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('document') }}</strong>
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

@endsection

@section ('plugin-js')

@endsection

@section ('custom-js')

@endsection
