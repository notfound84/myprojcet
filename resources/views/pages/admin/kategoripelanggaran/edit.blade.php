@extends('layouts.admin')
@section('title', 'Edit Kategori')

@section('content')

 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Kategori</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ url('kategori-pelanggaran') }}">Kategori</a></div>
              <div class="breadcrumb-item"><a>Edit Kategori</a></div>
            </div>
          </div>
         
          <div class="section-body">
            <div class="row">
              <div class="col-xl-7">
                <div class="card">
                  <div class="card-header">
                    <a href="{{ route('kategori-pelanggaran.index') }}" class="btn btn-primary"> Kembali </a>
                  </div>
                  <div class="card-body p-0">
                    <form action="{{ route('kategori-pelanggaran.update', $kategoripelanggaran->id_katpel) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">NAMA PELANGGARAN</label>
                                <input type="text" name="nama_pelanggaran" class="form-control" value="{{ $kategoripelanggaran->nama_pelanggaran}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">POIN</label>
                                <input type="text" name="poin" class="form-control" value="{{ $kategoripelanggaran->poin}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">STATUS</label>
                                <select name="status" id="status" class="form-control" value="{{ old('status') }}" required>
                                  <option value="{{ $kategoripelanggaran->status}}">{{ $kategoripelanggaran->status}}</option>
                                  <option value="a">aktif</option>
                                  <option value="n">nonaktif</option>
                                </select>
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
