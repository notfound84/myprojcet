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
                 

                  
                  @if(empty($nisn))
                  <div class="card-header">
                    <h4>Data Pelanggaran</h4>
                  </div>
                  <div class="card-body">
                    <div class="card-body">
                    
                        
                            <div style="margin-top: -20px" class="alert alert-danger">
                            <b>Note!</b> Belum ada pelanggaran yang dicari.
                            </div>
                        </div>
                    @else

                     <div class="card-header">
                    <h4>Data Pelanggaran Siswa</h4>
                  </div>
                 
                <div class="card-header" style="margin-top: -20px">
                    <h4>Rincian Pembayaran Siswa</h4>
                     
                  </div>
                  <div class="card-body">
                  <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped" id="pembayaranTable">
                    <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tahun Akademik</th>
                <th>Nama Pelanggaran</th>
                <th>Petugas</th>
                <th>Tanggal</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?php
                      // $tgl = date("d-m-Y", strtotime($pel->tgl_pelanggaran)); 
                      $no=1;
                      ?>
                @foreach($pelanggaran as $pel)
                <?php
                      $tgl = date("d-m-Y", strtotime($pel->tgl_pelanggaran)); 
                      
                      ?>

                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $pel ->nisn}}</td>
                    <td>{{ $pel ->nama}}</td>
                    <td>{{ $pel ->nama_kelas}}</td>
                    <td>{{ $pel ->nama_tahunakademik}}</td>
                    <td>{{ $pel ->nama_pelanggaran}}</td>
                    <td>{{ $pel ->nama_petugas}}</td>
                    <td>{{$tgl}}</td>
                    <td>
                        <a href="{{ route('pelanggaran.edit', $pel->id_detailpelanggaran)}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                       
                    </td>
                </tr>
                @endforeach
            </tbody>
                    </table>
                  </div>
                
                  </div>
                </div>
                @endif
              </div>
            </div>

            
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