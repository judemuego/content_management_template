@extends('backend.master.index')

@section('title', 'Class of Bag')

@section('breadcrumbs')
    <span>Maintenance</span>  /  <span class="highlight">Class of Bags</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Class of Bag Maintenance Screen
                    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#bagModal" style="float:right">
                        Add Class of Bag
                    </button>
                </h5>
            </div>
            @include('backend.partials.flash-message')
            <div class="col-12">
                <div class="card-body">
                    <table id="datatables" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Class Code</th>
                                <th>Bag Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <div class="modal fade" id="bagModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="save_record" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Class of Bag</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">
                            @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">Class Code</label>
                                <input type="text" class="form-control" id="class_code" name="class_code" placeholder="Class Code">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Bag Type</label>
                                <input type="text" class="form-control" id="bag_type" name="bag_type" placeholder="Bag Type">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary submit-button">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL --}}
                        
                    
    @stop

    @section('scripts')
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(function() {
           
           $('#datatables').DataTable({
               responsive: true,
               processing: true,
               serverSide: true,
               ajax: {
                   url: "/inventory/bag/get",
                   type: "GET"
               },
               columns: [
                   { data: "DT_RowIndex", title:"#" },
                   { data: "class_code", title: "Class Code" },
                   { data: "bag_type", title: "Bag Type" },
                   { data: "id", title:"Action", render: function(data, type, row, meta) {
                       var html = "";
                       html += '<a href="#" class="align-middle edit" onclick="edit(' + row.id + ')" title="Edit" data-toggle="modal" data-target="#bagModal"><i class="fas fa-pen"></i></a>';
                       html += '<a href="#"  onclick="deleteRecord('+row.id+')" data-toggle="modal" data-target="#deleteMessage"><i class="align-middle fas fa-fw fa-trash"></i></a>';
                       return html;
                   }}
               ]
           });

            $('.add').click(function(){
                $('.modal-title').text('Add Class of Bag');
                $('.submit-button').text('Add');
                $('#save_record')[0].reset();
                record_id = null;
            });

            $('#save_record').validate({
                submitHandler: function (form) {
                    var formData = $("#save_record").serialize();

                    if(record_id === null) {
                        scion.record.add('/inventory/bag/save', formData,
                        function() {
                            $('#datatables').DataTable().draw();
                            $('#bagModal').modal('hide');
                        });
                    }
                    else {
                        scion.record.update('/inventory/bag/update', record_id, formData,
                        function() {
                            $('#datatables').DataTable().draw();
                            $('#bagModal').modal('hide');
                        },
                        function() {});
                    }

                    return false;
                }
            });
        });

        function edit(id){
            event.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/inventory/bag/edit/' + id,
                method: 'get',
                data: {},
                success: function(data) {
                    $('.modal-title').text('Update Class of Bag');
                    $('.submit-button').text('Update');
                    record_id = id;
                    $.each(data, function() {
                        $.each(this, function(k, v) {
                            $('#'+k).val(v);
                        });
                    });
                }
            });
        }
        
        function deleteRecord(id) {
            delete_func = scion.record.delete('/inventory/bag/destroy', id,
            function() {
                $('#datatables').DataTable().draw();
            },
            function() {
                console.log('error');
            });
        }

    </script>
@endsection