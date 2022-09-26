@extends('layouts.template')

@section('content')
<!-- row -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">{{ $title }}</h4>
                    <form id="pelatihan">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nilai K Ketetanggaan:</label>
                            <input type="number" class="form-control" name="k_ketetanggaan" id="k_ketetanggaan" placeholder="Masukan nilai K Ketetanggaan">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nilai Exp:</label>
                            <input type="number" class="form-control" name="exp" id="exp" placeholder="Masukan nilai exp">
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-light btn-outline-success" id="trainButton"><i class="icon-refresh menu-icon before:text-success"> Latih</i></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tabel {{ $title }}</h4>
                    <div class="table-responsive">
                        <table id="train-table" class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nilai K<br>Ketetanggan</th>
                                    <th>Nilai Exp</th>
                                    <th>Akurasi</th>
                                    <th>Status</th>
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

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('#train-table').DataTable({
            processing: false,
            serverSide: true,

            ajax: "{{ route('proses-latih.datatable') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, searchable:false },
                { data: 'k_ketetanggaan' },
                { data: 'exp' },
                { data: 'akurasi' },
                { data: 'status'},
                { data: 'action', name: 'action', orderable:false, searchable:false },
            ]
        });

        //script simpan data
        var form = $('#pelatihan')[0];

        $('#trainButton').click(function(){
            $('#trainButton').prop('disabled', true);
            var formData = new FormData(form);

            $.ajax({
                url: '{{ route("proses-pelatihan") }}',
                method: 'POST',
                processData: false,
                contentType: false,
                data: formData,

                success: function(response){
                    table.draw();
                    if(response){
                        swal({
                            text: response,
                            icon: "success",
                        });
                    }
                    $('#trainButton').prop('disabled', false);
                    $('#k_ketetanggaan').val('');
                    $('#exp').val('');
                },

            });
        });


        $('body').on('click', '.statusButton', function(){
            swal({
                text: "Apakah anda yakin ingin mengaktifkan model ini?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willStatus) => {
            if (willStatus) {
                var id = $(this).data('id');

                $.ajax({
                    url: '{{ url("status", '') }}'+ '/' + id,
                    method: 'get',
                    success: function(){
                        swal("Model Aktif", {
                        icon: "success",
                        });
                        table.draw();
                    },
                }); 
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
                    url: '{{ url("pelatihan", '') }}'+ '/' + id,
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



