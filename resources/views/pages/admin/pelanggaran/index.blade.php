@extends('layouts.admin')
@section('title', 'Data Pelanggaran')

@section('content')

 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Pelanggaran</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Data Pelanggaran</a></div>
            </div>
          </div>
         
      <div class="card col-12 col-md-6 col-lg-12">
            <div class="card-header">
                     <a href="{{ route('pelanggaran.create') }}" style="" class="btn btn-primary btn-icon icon-left"><i class="far fa-tabel"></i> Tambah Data</a>
                     <a href="{{ route('cekpelanggaran') }}" style="margin-left: 5px" class="btn btn-warning btn-icon icon-left"><i class="far fa-tabel"></i> Cek Pelanggaran</a>
                    
                       <form action="{{ route('pelanggaran.index') }}" method="GET" enctype="multipart/form-data">
                        @csrf

                              <div class="input-group" style="margin-left: 90px">
                                  
                                  <select name="tahun" id="" class="form-control" value="{{ old('tahun') }}"   required>

                                     <option value="">-- Pilih Tahun Ajaran --</option>
                                     @foreach($tahunajar as $tha => $th)

                                    <option value="{{$th->nama_tahunakademik}}">{{$th->nama_tahunakademik}}</option>
                                     @endforeach
                                  </select>

                                  
                                  <select name="kelas" id="" style="margin-left: 15px" class="form-control" value="{{ old('kelas') }}"   required>

                                     <option value="">-- Pilih Kelas --</option>
                                     @foreach($kelas as $kel => $k)

                                    <option value="{{$k->nama_kelas}}">{{$k->nama_kelas}}</option>
                                     @endforeach
                                  </select>
                                  

                               <div class="form-group-btn" style="margin-left: 15px; margin-top: 5px">
                              <button class="btn btn-icon icon-left btn-primary"><i class="fa fa-search"></i> Cari</button>
                           </div>
                         </div>
                    </form>
          
                  </div>
      <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped" id="pelanggaranTable">
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
        </section>
      </div>
</div>
@endsection

@push('scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var id_pelanggaran =  $(this).closest("id_pelanggaran");
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