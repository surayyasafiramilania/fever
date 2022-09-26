@extends('layouts.template')

@section('content')
<!-- row -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $title }}</h4>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary addButton" data-toggle="modal" data-target="#modal-all">+ Tambah Data</button>
                    <div class="table-responsive">
                        <table id="dataset-table" class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Pasien</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Umur</th>
                                    <th>Diagnosa</th>
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

<!-- Modal edit dan create -->
<div class="modal fade" id="modal-all" aria-hidden="true">
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
                                <label>Nama Pasien</label>
                                <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" placeholder="Masukan Nama Pasien">
                                <span id="nameError" class="text-danger error-messages"></span>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select id="inputState jenis_kelamin" name="jenis_kelamin" class="form-control">
                                    <option selected="selected" disabled>Pilih Jenis Kelamin</option>
                                    <option value="1">Laki-Laki</option>
                                    <option value="0">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Umur</label>
                                <input type="text" name="umur" id="umur" class="form-control" placeholder="Masukan Umur">
                            </div>
                            <h5 class="text-muted">Gejala yang diderita:</h5>
                            <div class="form-group">
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[1]"  id="g1" value="1">Demam intermittent</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[2]" id="g2" value="1">Demam terutama malam hari</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[3]" id="g3" value="1">Demam terutama sepanjang hari</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[4]" id="g4" value="1">Demam menggigil</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[5]" id="g5" value="1">Berkeringat</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[6]" id="g6" value="1">Lama demam 2-7 hari</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[7]" id="g7" value="1">Lama demam 10-14 hari</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[8]" id="g8" value="1">Lama demam > 14 hari</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[9]" id="g9" value="1">Sakit kepala</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[10]"  id="g10" value="1">Nyeri perut</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[11]"  id="g11" value="1">Diare atau susah BAB</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[12]"  id="g12" value="1">Mual dan muntah</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[13]"  id="g13" value="1">Anoreksia</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[14]"  id="g14" value="1">Malaise</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[15]"  id="g15" value="1">Nyeri otot dan sendi</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[16]"  id="g16" value="1">Petechie</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[17]"  id="g17" value="1">Syok</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[18]"  id="g18" value="1">Melena</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[19]"  id="g19" value="1">Hematuria</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[20]"  id="g20" value="1">Nyeri punggung</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[21]"  id="g21" value="1">Riwayat berpergian ke daerah malaria</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[22]"  id="g22" value="1">Pucat</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[23]"  id="g23" value="1">Lidah kotor</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[24]"  id="g24" value="1">Perut kembung</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[25]"  id="g25" value="1">Letargi</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[26]"  id="g26" value="1">Delirium</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[27]"  id="g27" value="1">Pembesaran hati</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[28]"  id="g28" value="1">Pembesaran limpa</label>
                                </div>
                                <div class="form-check mb-3">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="g[29]"  id="g29" value="1">Ikterus</label>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label>Diagnosa</label>
                                    <select id="inputState diagnosa_id" name="diagnosa_id" class="form-control">
                                        <option selected="selected" disabled>Pilih Diagnosa</option>
                                        @foreach ($diagnosa as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_diagnosa }}</option>
                                        @endforeach
                                    </select>
                                </div>
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

<div class="modal fade" id="modal-detail" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detail-title">Detail gejala yang diderita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Demam intermittent: </strong><span id="gejala1"></span></p>
                    <p><strong>Demam terutama pada malam hari: </strong><span id="gejala2"></span></p>
                    <p><strong>Demam sepanjang hari: </strong><span id="gejala3"></span></p>
                    <p><strong>Demam Menggigil: </strong><span id="gejala4"></span></p>
                    <p><strong>Berkeringat: </strong><span id="gejala5"></span></p>
                    <p><strong>Lama demam 2-7 hari: </strong><span id="gejala6"></span></p>
                    <p><strong>Lama demam 10-14 hari: </strong><span id="gejala7"></span></p>
                    <p><strong>Lama demam < 14 hari: </strong><span id="gejala8"></span></p>
                    <p><strong>Sakit Kepala: </strong><span id="gejala9"></span></p>
                    <p><strong>Nyeri Perut: </strong><span id="gejala10"></span></p>
                    <p><strong>Diare atau susah BAB: </strong><span id="gejala11"></span></p>
                    <p><strong>Mual dan Muntah: </strong><span id="gejala12"></span></p>
                    <p><strong>Anoreksia: </strong><span id="gejala13"></span></p>
                    <p><strong>Malaise: </strong><span id="gejala14"></span></p>
                    <p><strong>Nyeri otot dan sendi: </strong><span id="gejala15"></span></p>
                    <p><strong>Petechie: </strong><span id="gejala16"></span></p>
                    <p><strong>Syok: </strong><span id="gejala17"></span></p>
                    <p><strong>Melena: </strong><span id="gejala18"></span></p>
                    <p><strong>Hematuria: </strong><span id="gejala19"></span></p>
                    <p><strong>Nyeri Punggung: </strong><span id="gejala20"></span></p>
                    <p><strong>Riwayat berpergian ke daerah malaria: </strong><span id="gejala21"></span></p>
                    <p><strong>Pucat: </strong><span id="gejala22"></span></p>
                    <p><strong>Lidah Kotor: </strong><span id="gejala23"></span></p>
                    <p><strong>Perut Kembung: </strong><span id="gejala24"></span></p>
                    <p><strong>Letargi: </strong><span id="gejala25"></span></p>
                    <p><strong>Delirium: </strong><span id="gejala26"></span></p>
                    <p><strong>Pembesaran hati: </strong><span id="gejala27"></span></p>
                    <p><strong>Pembesaran Limpa: </strong><span id="gejala28"></span></p>
                    <p><strong>Ikterus: </strong><span id="gejala29"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
</div>



<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //define datatable
        var table = $('#dataset-table').DataTable({
                processing: false,
                serverSide: true,

                ajax: "{{ route('dataset.datatable') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, searchable:false },
                    { data: 'nama_pasien' },
                    { data: 'jenis_kelamin' },
                    { data: 'umur' },
                    { data: 'diagnosa_id' },
                    { data: 'action', name: 'action', orderable:false, searchable:false },
                ]
        });

        //create data
        $('body').on('click', '.addButton', function(){
            $('#modal-title').html('Tambah {{ $title }}');
            $('#saveBtn').html('Save')
            $('#nama_pasien').val('');
            $('#jenis_kelamin').val('');
            $('#umur').val('');
            $('#g1').prop("checked", false);
            $('#g2').prop("checked", false);
            $('#g3').prop("checked", false);
            $('#g4').prop("checked", false);
            $('#g5').prop("checked", false);
            $('#g6').prop("checked", false);
            $('#g7').prop("checked", false);
            $('#g8').prop("checked", false);
            $('#g9').prop("checked", false);
            $('#g10').prop("checked", false);
            $('#g11').prop("checked", false);
            $('#g12').prop("checked", false);
            $('#g13').prop("checked", false);
            $('#g14').prop("checked", false);
            $('#g15').prop("checked", false);
            $('#g16').prop("checked", false);
            $('#g17').prop("checked", false);
            $('#g18').prop("checked", false);
            $('#g19').prop("checked", false);
            $('#g20').prop("checked", false);
            $('#g21').prop("checked", false);
            $('#g22').prop("checked", false);
            $('#g23').prop("checked", false);
            $('#g24').prop("checked", false);
            $('#g25').prop("checked", false);
            $('#g26').prop("checked", false);
            $('#g27').prop("checked", false);
            $('#g28').prop("checked", false);
            $('#g29').prop("checked", false);
            $('#diagnosa_id').val('');
        });

        //script simpan data
        var form = $('#ajaxForm')[0];

        $('#saveBtn').click(function(){

             $('.error-messages').html('');

            var formData = new FormData(form);

            $.ajax({
                url: '{{ route('dataset.store') }}',
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
                        
                    }
                }
            });
        });

        function gejala(x) {
            if (x == 1) {
                return 'Ya';
            } else {
                return 'Tidak';
            }
        }

        //script detail data
        $('body').on('click', '.showButton', function(){
            var id = $(this).data('id');

            $.ajax({
                    url: '{{ url("dataset", '') }}'+ '/' + id,
                    method: 'GET',
                    success: function(response){
                    $('#modal-detail').modal('show');
                    $('#gejala1').text(gejala(response.g1));
                    $('#gejala2').text(gejala(response.g2));
                    $('#gejala3').text(gejala(response.g3));
                    $('#gejala4').text(gejala(response.g4));
                    $('#gejala5').text(gejala(response.g5));
                    $('#gejala6').text(gejala(response.g6));
                    $('#gejala7').text(gejala(response.g7));
                    $('#gejala8').text(gejala(response.g8));
                    $('#gejala9').text(gejala(response.g9));
                    $('#gejala10').text(gejala(response.g10));
                    $('#gejala11').text(gejala(response.g11));
                    $('#gejala12').text(gejala(response.g12));
                    $('#gejala13').text(gejala(response.g13));
                    $('#gejala14').text(gejala(response.g14));
                    $('#gejala15').text(gejala(response.g15));
                    $('#gejala16').text(gejala(response.g16));
                    $('#gejala17').text(gejala(response.g17));
                    $('#gejala18').text(gejala(response.g18));
                    $('#gejala19').text(gejala(response.g19));
                    $('#gejala20').text(gejala(response.g20));
                    $('#gejala21').text(gejala(response.g21));
                    $('#gejala22').text(gejala(response.g22));
                    $('#gejala23').text(gejala(response.g23));
                    $('#gejala24').text(gejala(response.g24));
                    $('#gejala25').text(gejala(response.g25));
                    $('#gejala26').text(gejala(response.g26));
                    $('#gejala27').text(gejala(response.g27));
                    $('#gejala28').text(gejala(response.g28));
                    $('#gejala29').text(gejala(response.g29));
                    }
            }); 

        });

        //script edit data
        $('body').on('click', '.editButton', function(){
            var id = $(this).data('id');

            $.ajax({
                url: '{{ url("dataset", '') }}'+ '/' + id + '/edit',
                method: 'GET',
                success: function(response){
                    $('#modal-all').modal('show');
                    $('#modal-title').html('Edit {{ $title }}');
                    $('#saveBtn').html('Update');
                    $('#id').val(response.id);
                    $('#nama_pasien').val(response.nama_pasien);
                    $('#jenis_kelamin').val(response.jenis_kelamin);
                    $('#umur').val(response.umur);
                    if (response.g1 == 1) {
                        $('#g1').prop("checked", true);
                    }
                    if (response.g2 == 1) {
                        $('#g2').prop("checked", true);
                    }
                    if (response.g3 == 1) {
                        $('#g3').prop("checked", true);
                    }
                    if (response.g4 == 1) {
                        $('#g4').prop("checked", true);
                    }
                    if (response.g5 == 1) {
                        $('#g5').prop("checked", true);
                    }
                    if (response.g6 == 1) {
                        $('#g6').prop("checked", true);
                    }
                    if (response.g7 == 1) {
                        $('#g7').prop("checked", true);
                    }
                    if (response.g8 == 1) {
                        $('#g8').prop("checked", true);
                    }
                    if (response.g9 == 1) {
                        $('#g9').prop("checked", true);
                    }
                    if (response.g10 == 1) {
                        $('#g10').prop("checked", true);
                    }
                    if (response.g11 == 1) {
                        $('#g11').prop("checked", true);
                    }
                    if (response.g12 == 1) {
                        $('#g12').prop("checked", true);
                    }
                    if (response.g13 == 1) {
                        $('#g13').prop("checked", true);
                    }
                    if (response.g14 == 1) {
                        $('#g14').prop("checked", true);
                    }
                    if (response.g15 == 1) {
                        $('#g15').prop("checked", true);
                    }
                    if (response.g16 == 1) {
                        $('#g16').prop("checked", true);
                    }
                    if (response.g17 == 1) {
                        $('#g17').prop("checked", true);
                    }
                    if (response.g18 == 1) {
                        $('#g18').prop("checked", true);
                    }
                    if (response.g19 == 1) {
                        $('#g19').prop("checked", true);
                    }
                    if (response.g20 == 1) {
                        $('#g20').prop("checked", true);
                    }
                    if (response.g21 == 1) {
                        $('#g21').prop("checked", true);
                    }
                    if (response.g22 == 1) {
                        $('#g22').prop("checked", true);
                    }
                    if (response.g23 == 1) {
                        $('#g23').prop("checked", true);
                    }
                    if (response.g24 == 1) {
                        $('#g24').prop("checked", true);
                    }
                    if (response.g25 == 1) {
                        $('#g25').prop("checked", true);
                    }
                    if (response.g26 == 1) {
                        $('#g26').prop("checked", true);
                    }
                    if (response.g27 == 1) {
                        $('#g27').prop("checked", true);
                    }
                    if (response.g28 == 1) {
                        $('#g28').prop("checked", true);
                    }
                    if (response.g29 == 1) {
                        $('#g29').prop("checked", true);
                    }
                    $('#diagnosa_id').val(response.diagnosa_id);
                },
                error:function(error){
                    if(error){

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
                    url: '{{ url("dataset", '') }}'+ '/' + id,
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
