@extends('layouts.admin')
@section('title', 'Edit Data Pelanggaran')

@section('content')

 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Data Kelas</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ url('pelanggaran.index') }}">Data Pelanggaran</a></div>
              <div class="breadcrumb-item">Edit Data Pelanggaran</a></div>
            </div>
          </div>
         
          <div class="section-body">
            <div class="row">
              <div class="col-xl-7">
                <div class="card">
                  <div class="card-header">
                    <a href="{{ route('pelanggaran.index') }}" class="btn btn-primary"> Kembali </a>
                  </div>
                  <div class="card-body p-0">
                    <form action="{{ route('pelanggaran.update', $pelanggaran->id_detailpelanggaran) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">NISN</label>
                                <input type="text" name="name" class="form-control" value="{{$pelanggaran->nisn}}" disabled="" required=""></input>
                            </div>
                             <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="name" class="form-control" value="{{$pelanggaran->nama}}" disabled="" required=""></input>
                            </div>
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <input type="text" name="name" class="form-control" value="{{$pelanggaran->nama_kelas}}" disabled=""></input>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Pelanggaran</label>
                                <select name="id_katpel" id="" class="form-control" value="{{ old('id_katpel') }}" required>
                                  <option value="{{ $pelanggaran->kate_id_katpel}}">{{ $pelanggaran->nama_pelanggaran}}</option>
                                     @foreach($kategoripelanggaran as $kel => $k)
                                    <option value="{{$k->id_katpel}}">{{$k->nama_pelanggaran}}</option>
                                     @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea style="height: 100px" type="text" name="keterangan" class="form-control" required>{{ $pelanggaran->detail_keterangan }}</textarea>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">SIMPAN</button>
                            </div>
                            
                        </div>
                        
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
</div>
@endsection
