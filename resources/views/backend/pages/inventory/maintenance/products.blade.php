@extends('backend.master.index')

@section('title', 'Product List')

@section('breadcrumbs')
    <span>Maintenance</span>  /  <span class="highlight">Products</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Product Maintenance Screen
                    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#productModal" style="float:right">
                        Add Product
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
                                <th>Product Name</th>
                                <th>Color</th>
                                <th>Class Name</th>
                                <th>Unit Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="save_record" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">
                            @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Color</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" style="outline:none !important;" aria-label="Color" aria-describedby="basic-addon1" id="color" name="color" readonly  data-toggle="modal" data-target="#colorList">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary text-light" id="basic-addon1"  data-toggle="modal" data-target="#colorList"><i class="fas fa-search"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Class Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" style="outline:none !important;" aria-label="Class Name" aria-describedby="basic-addon1" id="class_name" name="class_name" readonly  data-toggle="modal" data-target="#classnameList">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text bg-primary text-light" id="basic-addon1"  data-toggle="modal" data-target="#classnameList"><i class="fas fa-search"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Unit Price</label>
                                <input type="number" class="form-control" id="unit_price" name="unit_price" placeholder="Unit Price">
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


{{--Color Modal--}}
<div class="modal fade" id="colorList" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">List of Color</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <table id="datatables" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Color Code</th>
                                <th>Color Name</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
{{--Color Modal--}}

{{--Color Modal--}}
<div class="modal fade" id="classnameList" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Class of Bags</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <table id="datatables" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Class Code</th>
                                <th>Bag Type</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
{{--Color Modal--}}
                    
@stop

@section('styles')
<style>
    .input-group.mb-3 
    {
        margin-bottom: 0px !important;
    }
</style>

@section('scripts')
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(function() {
    $('#datatables').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: {
            url: "/inventory/product/get",
            type: "GET"
        },
        columns: [
            { data: "DT_RowIndex", title:"#" },
            { data: "product_name", title: "Product Name" },
            { data: "color", title: "color" },
            { data: "class_name", title: "class_name" },
            { data: "unit_price", title: "unit_price" },
            { data: "id", title:"Action", render: function(data, type, row, meta) {
                var html = "";
                html += '<a href="#" class="align-middle edit" onclick="edit(' + row.id + ')" title="Edit" data-toggle="modal" data-target="#productModal"><i class="fas fa-pen"></i></a>';
                html += '<a href="#"  onclick="deleteRecord('+row.id+')" data-toggle="modal" data-target="#deleteMessage"><i class="align-middle fas fa-fw fa-trash"></i></a>';
                return html;
            }}
        ]
    });

        $('.add').click(function(){
            $('.modal-title').text('Add Product');
            $('.submit-button').text('Add');
            $('#save_record')[0].reset();
            record_id = null;
        });

        $('#save_record').validate({
            submitHandler: function (form) {
                var formData = $("#save_record").serialize();

                if(record_id === null) {
                    scion.record.add('/inventory/product/save', formData,
                    function() {
                        $('#datatables').DataTable().draw();
                        $('#productModal').modal('hide');
                    });
                }
                else {
                    scion.record.update('/inventory/product/update', record_id, formData,
                    function() {
                        $('#datatables').DataTable().draw();
                        $('#productModal').modal('hide');
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
            url: '/inventory/product/edit/' + id,
            method: 'get',
            data: {},
            success: function(data) {
                $('.modal-title').text('Update Product');
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
        delete_func = scion.record.delete('/inventory/product/destroy', id,
        function() {
            $('#datatables').DataTable().draw();
        },
        function() {
            console.log('error');
        });
    }

</script>
@endsection