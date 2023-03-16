@extends('layouts.admin')
@section('title', 'Kategori Pelanggaran')

@section('content')

 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Kategori Pelanggaran</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ url('home') }}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Kategori Pelanggaran</a></div>
            </div>
          </div>
         
      <div class="card col-12 col-md-6 col-lg-9">
      <div class="card-header">
        <a href="{{ route('kategori-pelanggaran.create') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-tabel"></i> Tambah Kategori</a>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-striped" id="kategoriTable">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Poin</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
                @foreach($kategoripelanggaran as $i => $kat)
                <tr>
                    <td>{{ $i + $kategoripelanggaran->firstItem() }}</td>
                    <td>{{ $kat -> nama_pelanggaran}} </td>
                    <td>{{ $kat -> poin}} </td>
                    <td>{{ $kat -> status}} </td>
                    <td>
                        <a href="{{ route('kategori-pelanggaran.edit', $kat->id_katpel)}}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                        <form action="{{ route('kategori-pelanggaran.destroy', $kat->id_katpel) }}" class="d-inline" method="POST" id="delete{{$kat->id_katpel}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-action fas fa-trash delete-btn" data-toggle="tooltip" title="Delete" ></button>
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
            </table>
            {{ $kategoripelanggaran->links() }}
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
          var id_pelanggran =  $(this).closest("id_pelanggaran");
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