@extends('layouts.template')

@section('content')
<!-- row -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $title }}</h4>
                    <div class="table-responsive">
                        <table id="datamodel-table" class="table table-striped table-bordered zero-configuration">
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
        //define datatable
        var table = $('#datamodel-table').DataTable({
            processing: false,
            serverSide: true,

            ajax: "{{ route('data-model.datatable') }}",
            columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, searchable:false },
                    { data: 'nama_pasien' },
                    { data: 'jenis_kelamin' },
                    { data: 'umur' },
                    { data: 'diagnosa_id' },
                    { data: 'action', name: 'action', orderable:false, searchable:false },
                    ]
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
    });
</script>

@endsection