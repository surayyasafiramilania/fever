@extends('layouts.template')

@section('content')
<!-- row -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Model pelatihan yang aktif</h4>
                    <form id="pengujian">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nilai K Ketetanggaan:</label>
                            <input readonly type="number" class="form-control" value="{{ $pelatihan->k_ketetanggaan}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nilai Exp:</label>
                            <input readonly type="number" class="form-control" value="{{ $pelatihan->exp }}">
                        </div>
                        <input type="hidden" name="pelatihan_id" value="{{ $pelatihan->id }}">
                    </div>
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-light btn-outline-success" id="testButton"><i class="icon-refresh menu-icon before:text-success"> Uji</i></button>
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
                        <table id="test-table" class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nilai K<br>Ketetanggan</th>
                                    <th>Nilai Exp</th>
                                    <th>Akurasi</th>
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

        var table = $('#test-table').DataTable({
            processing: false,
            serverSide: true,

            ajax: "{{ route('proses-uji.datatable') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, searchable:false },
                { data: 'k_ketetanggaan' },
                { data: 'exp' },
                { data: 'akurasi' },
                { data: 'action', name: 'action', orderable:false, searchable:false },
            ]
        });

        //script simpan data
        var form = $('#pengujian')[0];

        $('#testButton').click(function(){
            $('#testButton').prop('disabled', true);
            var formData = new FormData(form);

            $.ajax({
                url: '{{ route("proses-uji") }}',
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
                    $('#testButton').prop('disabled', false);
                    $('#k_ketetanggaan').val('');
                    $('#exp').val('');
                },

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
                    url: '{{ url("pengujian", '') }}'+ '/' + id,
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



