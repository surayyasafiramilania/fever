@extends('layouts.template')

@section('content')
<!-- row -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data {{ $title }}</h4>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-light btn-outline-primary addButton" data-toggle="modal" data-target="#modal-all"> + Tambah Data</button>
                    <!-- Modal -->
                    <div class="table-responsive">
                        <table id="diagnosa-table" class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Diagnosa</th>
                                    <th>Deskripsi</th>
                                    <th>Pengobatan</th>
                                    <th>Pencegahan</th>
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
<div class="modal fade" id="modal-all">
    <form id="ajaxForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="basic-form">
                        <form>
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label>Diagnosa</label>
                                <input type="text" name="nama_diagnosa" id="nama_diagnosa" class="form-control" placeholder="Masukan Diagnosa">
                                <span id="diagnosaError" class="text-danger error-messages"></span>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi:</label>
                                <textarea class="form-control h-150px" rows="6" name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukan Deskripsi"></textarea>
                                <span id="deskripsiError" class="text-danger error-messages"></span>
                            </div>
                            <div class="form-group">
                                <label>Pengobatan:</label>
                                <textarea class="form-control h-150px" rows="6" name="pengobatan" id="pengobatan" class="form-control" placeholder="Masukan pengobatan"></textarea>
                                <span id="pengobatanError" class="text-danger error-messages"></span>
                            </div>
                            <div class="form-group">
                                <label>Pencegahan:</label>
                                <textarea class="form-control h-150px" rows="6" name="pencegahan" id="pencegahan" class="form-control" placeholder="Masukan pencegahan"></textarea>
                                <span id="pencegahanError" class="text-danger error-messages"></span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveBtn"></button>
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

        var table = $('#diagnosa-table').DataTable({
            processing: false,
            serverSide: true,

            ajax: "{{ route('diagnosa.datatable') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, searchable:false },
                { data: 'nama_diagnosa' },
                { data: 'deskripsi' },
                { data: 'pengobatan' },
                { data: 'pencegahan' },
                { data: 'action', name: 'action', orderable:false, searchable:false },
            ]
        });
        //script tambah data
        $('body').on('click', '.addButton', function(){
            $('#modal-title').html('Tambah {{ $title }}');
            $('#saveBtn').html('Save');
            $('#nama_diagnosa').val('');
            $('#deskripsi').val('');
            $('#pengobatan').val('');
            $('#pencegahan').val('');
        });

        //script simpan data
        var form = $('#ajaxForm')[0];

        $('#saveBtn').click(function(){

             $('.error-messages').html('');

            var formData = new FormData(form);

            $.ajax({
                url: '{{ route('diagnosa.store') }}',
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
                        $('#diagnosaError').html(error.responseJSON.errors.nama_diagnosa);
                        $('#deskripsiError').html(error.responseJSON.errors.deskripsi);
                        $('#pengobatanError').html(error.responseJSON.errors.pengobatan);
                        $('#pencegahanError').html(error.responseJSON.errors.pencegahan);
                    }
                }
            });
        });

        //script edit data
        $('body').on('click', '.editButton', function(){
            var id = $(this).data('id');

            $.ajax({
                url: '{{ url("diagnosa", '') }}'+ '/' + id + '/edit',
                method: 'GET',
                success: function(response){
                    $('#modal-all').modal('show');
                    $('#modal-title').html('Edit {{ $title }}');
                    $('#saveBtn').html('Update');

                    $('#id').val(response.id);
                    $('#nama_diagnosa').val(response.nama_diagnosa);
                    $('#deskripsi').val(response.deskripsi);
                    $('#pencegahan').val(response.pencegahan);
                    $('#pengobatan').val(response.pengobatan);
                },
                error:function(error){
                    if(error){
                        $('#diagnosaError').html(error.responseJSON.errors.nama_diagnosa);
                        $('#deskripsiError').html(error.responseJSON.errors.deskripsi);
                        $('#pengobatanError').html(error.responseJSON.errors.pengobatan);
                        $('#pencegahanError').html(error.responseJSON.errors.pencegahan);
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
                    url: '{{ url("diagnosa", '') }}'+ '/' + id,
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
