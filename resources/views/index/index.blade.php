@extends('layouts.user.layout')

@section('seo-title')
<title> Welcome {{ config('app.seo-title-separator') }} {{ config('app.name') }}</title>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Welcome {{Auth::user()->name}}</h1>

            <div class="portlet box purple">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-database"></i>Documents</div>
                    
                </div>

                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col" style="width:450px !important"> Title </th>
                                    <th scope="col"> Description </th>
                                    <th scope="col">Document access level</th>
                                    <th scope="col"> Download </th>

                                </tr>
                            </thead>
                            <tbody>
                                @if(count($documents) > 0)
                                @foreach ($documents as $document)
                                @if ($document->priority == Auth()->user()->role->priority || Auth()->user()->role->name == \App\User::ROLE_ADMINISTRATOR)
                                <tr>
                                    <td>{{$document->title}}</td>
                                    <td>{{$document->description}}</td>
                                    <td> {{Auth()->user()->role->name}}</td>
                                    <td> <a href ="{{route('download', $document->id)}}" class="btn green-haze btn-outline sbold uppercase">Download</a> </td>

                                </tr>
                                                                
                                @endif
                                @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-database"></i>Old documents</div>
                    
                </div>

                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover ">
                            <thead>
                                <tr>
                                    <th scope="col" style="width:450px !important"> Title </th>
                                    <th scope="col"> Description </th>
                                    <th scope="col"> Download </th>

                                </tr>
                            </thead>
                            <tbody>
                                @if(count($documents) > 0)
                                @foreach ($documents as $document)
                                @if ($document->priority < Auth()->user()->role->priority &&  $document->priority != 0)
                                <tr>
                                    <td>{{$document->title}}</td>
                                    <td>{{$document->description}}</td>
                                                                        
                                    <td> <a href ="{{route('download', $document->id)}}" class="btn green-haze btn-outline sbold uppercase">Download</a> </td>

                                </tr>
                                                                
                                @endif
                                @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    @include('layouts.admin.partials.message')

</div>
<!-- /.container-fluid -->
@endsection