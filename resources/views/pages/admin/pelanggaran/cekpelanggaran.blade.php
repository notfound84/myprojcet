@extends('layouts.admin')
@section('title', 'Pembayaran')

@section('content')

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Cek Pelanggaran</h1>
            <!-- <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Pembayaran</div>
            </div> -->
          </div>
          <div class="">
              <div class="col-12 col-md-6 col-lg-12">
                
            <div class="row">
              <div class="col-12 col-md-4 col-lg-4">
                <div class="card card-primary" style="margin-left: -10px; margin-right: 11px">
                  <div class="card-header" style="margin-right: 30px">
                    <h4 style="">Cari Pelanggaran Siswa</h4>
                    <a href="{{ route('pelanggaran.index') }}" class="btn btn-icon icon-left btn-primary"> Kembali </a>
                  </div>
                  
                   <form action="{{ route('cekpelanggaran') }}" method="GET" enctype="multipart/form-data">
                        @csrf
                  <div class="card-body">
                    <div class="form-group">
                        <label for="">NISN</label>
                        <input type="text" name="nisn" class="form-control" value="{{ old('nisn') }}" required>
                    </div>
                    
                    <div class="form-group">
                      <div class="form-group">
                                <label for="">Tahun Pelajaran</label>
                                <select name="tahun" id="" class="form-control" value="{{ old('tahun') }}"   required>

                                   <option value="">-- Pilih Tahun Ajaran --</option>
                                   @foreach($tahunajar as $tha => $th)

                                  <option value="{{$th->nama_tahunakademik}}">{{$th->nama_tahunakademik}}</option>
                                   @endforeach
                                </select>
                            </div>
                          </div>
                      <br>
                      <h4><button class="btn btn-icon icon-left btn-primary"><i class="fa fa-search"></i> Cari</button></h4>
                  
                  </div>
                </div>
              </div>
            </form>


              <div class="col-12 col-md-8 col-lg-8">
                <div class="card card-success" style="margin-right: -15px; margin-left: -17px">
                 

                  
                  @if(empty($nisncari))
                  <div class="card-header">
                    <h4>Data Pelanggaran</h4>
                  </div>
                  <div class="card-body">
                    <div class="card-body">
                    
                        
                            <div style="margin-top: -20px" class="alert alert-danger">
                            <b>Note!</b> Belum ada pelanggaran yang dicari.
                            </div>
                        </div>
                      </div>
                    @else

                      <div class="card-header">
                    <h4>Data Siswa</h4>
                  </div>
                  <div class="card-body">
                <div class="card-body p-0"> 
                <div class="table-responsive">
                   <table class="table table-striped" id="pembayaranTable">
                    <thead>
                      @foreach($pelanggaran as $pe)
                      @if($loop->first) 
                    
                     
                    <tr>
                        <th>NISN</th>
                        <th>: {{ $pe ->nisn}}</th>
                        <th>Kelas</th>
                        <th>: {{ $pe ->nama_kelas}}</th>

                      </tr>
                    </thead>

                    <tbody>
                    
                        <tr>
                            <th>Nama</th>
                            <th>: {{ $pe ->nama}} </th>
                            <th>Tahun Akademik</th>
                            <th>: {{ $pe ->nama_tahunakademik}} </th>
                   
                                
                            </td>
                        </tr>
                       
                        @endif
                        @endforeach
                    </tbody>
                    
                    </table>
                  </div>
                </div>
              </div>

                <div class="card-header" style="margin-top: -20px">
                    <h4>Rincian Pelanggaran Siswa</h4>
                     
                  </div>
                  <div class="card-body">
                  <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped" id="pembayaranTable">
                    <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggaran</th>
                <th>Keterangan</th>
                <th>poin</th>
                <th>Petugas</th>
                <th>Tanggal</th>
              </tr>
            </thead>

            <tbody>
              <?php
                      // $tgl = date("d-m-Y", strtotime($pel->tgl_pelanggaran)); 
                      $no=1;
                      $totalpoin=0;
                      ?>
                @foreach($pelanggaran as $pel)
                <?php
                      $tgl = date("d-m-Y", strtotime($pel->tgl_pelanggaran)); 
                      
                      ?>

                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $pel ->nama_pelanggaran}}</td>
                    <td>{{ $pel ->detail_keterangan}}</td>
                    <td>{{ $pel ->poin}}</td>
                    <td>{{ $pel ->nama_petugas}}</td>
                    <td>{{$tgl}}</td>

                    <?php $totalpoin+=$pel->poin; ?>
                    
                </tr>
                @endforeach
                   <tr style="background-color: #e1e1ea" >
                          <td colspan="3" style="color: black; font-style: bold;">Total Poin   : </td>
                          <td style="color: black; font-style: bold;">{{$totalpoin}} </td>
                          <td colspan="2">

                      <form action="{{ route('cetakrincianpelanggaran') }}" target="_blank" method="GET" enctype="multipart/form-data">
                          @csrf
                        <input type="hidden" name="nisn" class="form-control" value="{{ $nisncari }}" required>
                        <input type="hidden" name="tahun" class="form-control" value="{{ $tahun }}" required>
                                           
                      <button style="padding-bottom: ;" class="btn btn-icon icon-left btn-success"><i class="fa fa-print"></i> Cetak Pelanggaran</button>
                    </form>
              
                  </td> 
                        </tr>
            </tbody>
                    </table>
                  </div>
                
                  </div>
                </div>
              </div>
                @endif

            
                </div>
              </div>
            </div>
        </section>
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