@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data {{ $title }}</h4>
                    <!-- Button trigger modal -->
                    <button class="btn btn-light btn-outline-primary addButton" data-toggle="modal" data-target="#modal-all">+  Tambah Data</button>
                    <div class="table-responsive">
                        <table id="user-table" class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal-all" aria-labelledby="modal-title" aria-hidden="true">
    <form id="ajaxForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="basic-form">
                        <form>
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Masukan Nama">
                                <span id="nameError" class="text-danger error-messages"></span>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Example@gmail.com">
                                <span id="emailError" class="text-danger error-messages"></span>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password">
                                <span id="passwordError" class="text-danger error-messages"></span>
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select id="inputState role" name="role" class="form-control">
                                    <option selected="selected" disabled>Pilih role</option>
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="saveBtn"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('#user-table').DataTable({
            processing: false,
            serverSide: true,

            ajax: "{{ route('user.datatable') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, searchable:false },
                { data: 'name' },
                { data: 'email' },
                { data: 'role'},
                { data: 'action', name: 'action', orderable:false, searchable:false },
            ]
        });
        //script tambah data
        $('body').on('click', '.addButton', function(){
            $('#modal-title').html('Tambah {{ $title }}');
            $('#saveBtn').html('Save');
            $('#name').val('');
            $('#email').val('');
            $('#password').val('');
            $('#role').val('');
        });

        //script simpan data
        var form = $('#ajaxForm')[0];

        $('#saveBtn').click(function(){

            $('.error-messages').html('');

            var formData = new FormData(form);

            $.ajax({
                url: '{{ route('user.store') }}',
                method: 'POST',
                processData: false,
                contentType: false,
                data: formData,

                success: function(response){
                    table.draw();
                    $('#modal-all').modal('hide');
                    if(response){
                        swal({
                            text: response.success,
                            icon: "success",
                        });
                    }
                },
                error: function(error){
                    if(error){
                        $('#nameError').html(error.responseJSON.errors.name);
                        $('#emailError').html(error.responseJSON.errors.email);
                        $('#passwordError').html(error.responseJSON.errors.password);
                    }
                }
            });
        });

        //script edit data
        $('body').on('click', '.editButton', function(){
            var id = $(this).data('id');

            $.ajax({
                url: '{{ url("user", '') }}'+ '/' + id + '/edit',
                method: 'GET',
                success: function(response){
                    $('#modal-all').modal('show');
                    $('#modal-title').html('Edit {{ $title }}');
                    $('#saveBtn').html('Update');

                    $('#id').val(response.id);
                    $('#name').val(response.name);
                    $('#email').val(response.email);
                    $('#password').val('');
                    $('#role').val(response.role);
                },
                error:function(error){
                    if(error){
                        $('#nameError').html(error.responseJSON.errors.name);
                        $('#emailError').html(error.responseJSON.errors.email);
                        $('#passwordError').html(error.responseJSON.errors.password);
                    }
                }
            });
        });

        $('body').on('click', '.delButton', function(){
            swal({
                text: "Apakah anda yakin ingin menghapus?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                var id = $(this).data('id');

                $.ajax({
                    url: '{{ url("user", '') }}'+ '/' + id,
                    method: 'DELETE',
                    success: function(){
                        swal("Data Berhasil Dihapus", {
                        icon: "success",
                        });
                        table.draw();
                    },
                }); 
            }
            });
        });
    });
</script>   

@endsection
