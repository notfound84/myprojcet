@extends('layouts.admin')
@section('title', 'Data Pelanggaran')

@section('content')

 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tambah Data Kelas</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ url('pelanggaran.index') }}">Data Pelanggaran</a></div>
              <div class="breadcrumb-item">Tambah Data Pelanggaran</a>

              </div>

            </div>
          </div>
         
          <div class="section-body">
            <div class="row">
              <div class="col-xl-7">
                <div class="card">
                  <div class="card-header">
                    <a href="{{ route('pelanggaran.index') }}" class="btn btn-primary"> Kembali </a>
                    <a href="{{ route('tampilsiswa') }}" class="btn btn-icon icon-left btn-success" style="margin-left: 10px" name="tampil" id="tampil"><i class="far fa-user"></i>Cari Siswa</a>
                  </div>
                    @if(empty($pilihsiswa) || count($pilihsiswa) ==0)
                  <div class="card-body p-0">
                        
                            <div style="margin: 10px;" class="alert alert-danger">
                            <b>Note!</b> Belum ada data yang dipilih !
                            </div>
                             <div class="card-body">
                            <div class="form-group">
                              <label>NISN</label>
                              <label type="text" name="name" class="form-control"></label>
                            </div>
                            <div class="form-group">
                              <label>Nama</label>
                              <label type="text" name="name" value="" class="form-control"></label>
                            </div>
                            <div class="form-group">
                              <label>Kelas</label>
                              <label type="text" name="name" class="form-control"></label>
                            </div>
                          </div>
                      @else
                      @foreach($pilihsiswa as $ds => $dss)
                    <form action="{{ route('pelanggaran.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">NISN</label>
                                <label type="text" name="name" class="form-control">{{$dss["nisn"]}}</label>
                            </div>
                             <div class="form-group">
                                <label for="">Nama</label>
                                <label type="text" name="name" class="form-control">{{$dss["nama"]}}</label>
                            </div>
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <label type="text" name="name" class="form-control">{{$dss["nama_kelas"]}}</label>
                            </div>
                            <div class="form-group">
                                <label for="">Pelanggaran</label>
                                <select name="id_katpel" id="" class="custom-select"{{ count($kategoripelanggaran) == 0 ? 'disabled' : ''}} required=""> 
                                  @if(count($kategoripelanggaran) == 0)
                                  <option value="">Pilihan tidak ada</option>
                                  @else
                                  <option value="">Pilih Salah Satu</option>
                                      @foreach ($kategoripelanggaran as $kp)
                                      <option value="{{ $kp->id_katpel}}">{{$kp->nama_pelanggaran}}</option>
                                      @endforeach
                                  @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea style="height: 100px" type="text" name="keterangan" class="form-control" value="{{ old('keterangan') }}" required></textarea>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                            
                        </div>
                        
                    </form>
                    @endforeach
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
</div>
@endsection
