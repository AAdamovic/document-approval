@extends('layouts.admin.layout')

@section('seo-title')
<title> All documents {{ config('app.seo-title-separator') }} {{ config('app.name') }}</title>
@endsection

@section('plugins-css')
<!-- DataTables CSS -->
<link href="/admin/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="/admin/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">All documents</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    
    @include('layouts.admin.partials.message')
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr class="text-center">
                                <th>Title</th>
                                <th>Description</th>
                                <th>Document</th>
                                <th>priority</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($documents) > 0)
                                @foreach($documents as $document)
                                <tr>
                                    <td>{{ $document->title }}</td>
                                    <td>{{ $document->description }}</td>
                                    
                                    <td class="text-center">{{ ($document->document) }}</td>
                                    <td class="text-center">{{ ($document->priority) }}</td>
                                    <td class="text-right">
                                        <a data-placement="top" title="Edit document" href="{{ route('documents-edit', $document->id) }}" class="btn btn-success btn-xs btn-tooltip">Edit</a>
                                        <a data-placement="top" title="Delete document" data-documentid="{{ $document->id }}" data-href="{{ route('documents-delete', $document->id) }}"  data-documentname="{{ $document->name }}" class="btn btn-danger btn-xs btn-tooltip" data-toggle="modal" data-target="#myModal">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- /.container-fluid -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete document !!!</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="" type="button" class="btn btn-danger delete-button">Delete</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection


@section('plugins-js')
<!-- DataTables JavaScript -->
<script src="/admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="/admin/vendor/datatables-responsive/dataTables.responsive.js"></script>
@endsection

@section('custom-js')
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true,
        columnDefs: [
            { 
                orderable: false, targets: [4]
            },
            { 
                searchable: false, targets: [3]
            }
        ]
    });
});


$('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var documentId = button.data('documentid');
    var documentHref = button.data('href');
    var documentName = button.data('documentname');// Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find('.modal-body').text('Are you sure that you want to delete document: ' + documentName + '?')
    //modal.find('.delete-button').attr('href', '/documents/delete/' + documentId);
    modal.find('.delete-button').attr('href', documentHref);
})

$(function () {
  $('.btn-tooltip').tooltip();
})

</script>
@endsection