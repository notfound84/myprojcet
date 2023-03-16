@extends('layouts.admin')
@section('title', 'Laporan')

@section('content')

 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Laporan Pelanggaran</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="">Laporan Pelanggaran</a></div>
            </div>
          </div>
         
          <div class="col-12 col-md-6 col-lg-12">
                <div class="card card-success">
                  <div class="card-header">
                    
                  <div class="card-body">
                    <form class="card-header-form" method="get" action="{{ route('laporan-pelanggaran.index') }}" style="">
                      <div class="input-group mb-3">
                        <label for="label">Tanggal Awal</label>
                        <input style="margin-left: 10px; margin-right: 600px" type="date" name="tgl_satu" id="tgl_satu" class="form-control" value="">
                      </div>
                      <div class="input-group mb-3">
                        <label for="label">Tanggal Akhir</label>
                        <input style="margin-left: 10px; margin-right: 600px" type="date" name="tgl_dua" id="tgl_dua" class="form-control" value="">
                      </div>
                      <div class="input-group mb-3">
                           <button class="btn btn-primary" type="submit">Cari</button>
                      </div>
                    </form>
                   @if(empty($tgl_satu)) 
                    <form action="{{ route('cetaksemuapelanggaran') }}" target="_blank" method="GET" enctype="multipart/form-data">
                          @csrf
                                        
                      <button style="padding-bottom: ;" class="btn btn-icon icon-left btn-success"><i class="fa fa-print"></i> Cetak Pelanggaran</button>
                    </form>
                    @else
                        <form action="{{ route('cetakpelanggaran') }}" target="_blank" method="GET" enctype="multipart/form-data">
                          @csrf
                        <input type="hidden" name="tgl_satu" class="form-control" value="{{ $tgl_satu }}" required>
                        <input type="hidden" name="tgl_dua" class="form-control" value="{{ $tgl_dua }}" required>
                                           
                      <button style="padding-bottom: ;" class="btn btn-icon icon-left btn-success"><i class="fa fa-print"></i> Cetak Pelanggaran</button>
                    </form>
                  @endif
                    
                    </div>
                  </div>
                   
                  <div class="card-footer text-right">
                  <div class="card-body p-0">
                  <div class="table-responsive">
                      <table class="table table-striped" id="pelanggaranTable">
                      <thead>
                      <tr>
                          <th>No</th>
                          <th>NISN</th>
                          <th>Nama</th>
                          <th>Pelanggaran</th>
                          <th>Poin</th>
                          <th>Keterangan</th>
                          <th>Tanggal</th>
                          <th>Petugas</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $no=1;?>
                          @foreach($pelanggaran as $pel)
                          <tr>
                              <td>{{ $no++}}</td>
                              <td>{{ $pel ->nisn}}</td>
                              <td>{{ $pel ->nama}}</td>
                              <td>{{ $pel ->nama_pelanggaran}}</td>
                              <td>{{ $pel ->poin}}</td>
                              <td>{{ $pel ->detail_keterangan}}</td>
                              <td>{{ $pel -> tgl_pelanggaran}}</td>
                              <td>{{ $pel ->nama_petugas}}</td>
                          </tr>

                          @endforeach
                      </tbody>
                      
                      </table>
                    </div>
                </div>
                </div>
              </div>
      
    </div>
        </section>
      </div>
</div>
@endsection

@push('scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var id_kelas =  $(this).closest("id_kelas");
          event.preventDefault();
          swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          })
          .then((result) => {
            if (result.isConfirmed) {
                form.submit();
                Swal.fire(
                'Deleted!',
                'Your data has been deleted.',
                'success'
                )
            }
        });
      });
  
</script>    
@endpush