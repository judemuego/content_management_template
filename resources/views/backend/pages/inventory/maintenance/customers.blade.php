@extends('backend.master.index')

@section('title', 'Customer')

@section('breadcrumbs')
    <span>Maintenance</span>  /  <span class="highlight">Customers</span>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Customer Maintenance Screen
                    <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#customerModal" style="float:right">
                        Add Customer
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
                                <th>Customer ID</th>
                                <th>Customer Name</th>
                                <th>Email Address</th>
                                <th>Contact Person</th>
                                <th>Contact No.(s)</th>
                                <th>Company Position</th>
                                <th>Company TIN</th>
                                <th>Business Style</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="save_record" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body m-3">
                            @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">Customer ID</label>
                                <input type="text" class="form-control" id="customer_id" name="customer_id" placeholder="Customer ID">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Customer/Company Name</label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Customer Name">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Address #1 Description</label>
                                <input type="text" class="form-control" id="address1_description" name="address1_description" placeholder="Address #1 Description">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Address #1 Line 1</label>
                                <input type="text" class="form-control" id="address1_line1" name="address1_line1" placeholder="Address #1 Line 1">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Address #1 Line 2</label>
                                <input type="text" class="form-control" id="address1_line2" name="address1_line2" placeholder="Address #1 Line 2">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Address #2 Description</label>
                                <input type="text" class="form-control" id="address2_description" name="address2_description" placeholder="Address #2 Description">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Address #2 Line 1</label>
                                <input type="text" class="form-control" id="address2_line1" name="address2_line1" placeholder="Address #2 Line 1">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Address #2 Line 2</label>
                                <input type="text" class="form-control" id="address2_line2" name="address2_line2" placeholder="Address #2 Line 2">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Address #3 Description</label>
                                <input type="text" class="form-control" id="address3_description" name="address3_description" placeholder="Address #3 Description">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Address #3 Line 1</label>
                                <input type="text" class="form-control" id="address3_line1" name="address3_line1" placeholder="Address #3 Line 1">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Address #3 Line 2</label>
                                <input type="text" class="form-control" id="address3_line2" name="address3_line2" placeholder="Address #3 Line 2">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Contact Person</label>
                                <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Contact Person">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Company Position</label>
                                <input type="text" class="form-control" id="position" name="position" placeholder="Company Position">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Contact No.(s)</label>
                                <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Contact No">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Email Address</label>
                                <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Email Address">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Company TIN</label>
                                <input type="text" class="form-control" id="tin_no" name="tin_no" value="On File" placeholder="Company TIN">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Company Business Style</label>
                                <input type="text" class="form-control" id="company_business_style" name="company_business_style" placeholder="Company Business Style">
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
               scrollX: true,
               responsive: true,
               processing: true,
               serverSide: true,
               ajax: {
                   url: "/inventory/customer/get",
                   type: "GET"
               },
               columns: [
                   { data: "DT_RowIndex", title:"#" },
                   { data: "customer_id", title: "Customer ID" },
                   { data: "customer_name", title: "Customer Name" },
                   { data: "email_address", title: "Email Address" },
                   { data: "contact_person", title: "Contact Person" },
                   { data: "contact_no", title: "Contact No.(s)" },
                   { data: "position", title: "Company Position" },
                   { data: "tin_no", title: "Company TIN" },
                   { data: "company_business_style", title: "Company Business Style" },

                   { data: "id", title:"Action", render: function(data, type, row, meta) {
                       var html = "";
                       html += '<a href="#" class="align-middle edit" onclick="edit(' + row.id + ')" title="Edit" data-toggle="modal" data-target="#customerModal"><i class="fas fa-pen"></i></a>';
                       html += '<a href="#"  onclick="deleteRecord('+row.id+')" data-toggle="modal" data-target="#deleteMessage"><i class="align-middle fas fa-fw fa-trash"></i></a>';
                       return html;
                   }}
               ]
           });

            $('.add').click(function(){
                $('.modal-title').text('Add Customer');
                $('.submit-button').text('Add');
                $('#save_record')[0].reset();
                record_id = null;
            });

            $('#save_record').validate({
                submitHandler: function (form) {
                    var formData = $("#save_record").serialize();

                    if(record_id === null) {
                        scion.record.add('/inventory/customer/save', formData,
                        function() {
                            $('#datatables').DataTable().draw();
                            $('#customerModal').modal('hide');
                        });
                    }
                    else {
                        scion.record.update('/inventory/customer/update', record_id, formData,
                        function() {
                            $('#datatables').DataTable().draw();
                            $('#customerModal').modal('hide');
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
                url: '/inventory/customer/edit/' + id,
                method: 'get',
                data: {},
                success: function(data) {
                    $('.modal-title').text('Update Customer');
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
            delete_func = scion.record.delete('/inventory/customer/destroy', id,
            function() {
                $('#datatables').DataTable().draw();
            },
            function() {
                console.log('error');
            });
        }

    </script>
@endsection