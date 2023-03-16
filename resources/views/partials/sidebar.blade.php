
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
          <img src="../assets/img/simas.png" alt="logo" width="200" class="shadow-light  mb-5 mt-3">
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="">SMS</a>
          </div>
          <ul class="sidebar-menu mt-5">
              <li class="menu-header">Dashboard</li>
              <li><a class="nav-link" href="{{ url('home') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
              @if (auth()->user()->level=="admin")

              <li class="menu-header">Data</li>
              <li class="nav-item">
                <a href="{{ url('data-user') }}" class="nav-link" ><i class="fas fa-user"></i> <span>Data Petugas</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ url('data-siswa') }}" class="nav-link" ><i class="fas fa-users"></i> <span>Data Siswa</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ url('data-kelas') }}" class="nav-link" ><i class="fas fa-university"></i> <span>Data Kelas</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ url('data-tahunakademik') }}" class="nav-link" ><i class="fas fa-university"></i> <span>Data Tahun Akademik</span></a>
              </li>
              @endif

              @if (auth()->user()->level=="Bendahara"||auth()->user()->level=="admin")
              <li class="menu-header">Transaksi</li>
              <li class="nav-item">
                <a href="{{ url('data-rincian-pembayaran') }}" class="nav-link" ><i class="fas fa-list-alt"></i> <span>Rincian Pembayaran</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ url('data-pembayaran') }}" class="nav-link" ><i class="fas fa-money-bill"></i> <span>Pembayaran</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ url('laporan-keuangan') }}" class="nav-link" ><i class="fas fa-solid fa-book"></i> <span>Laporan Pembayaran</span></a>
              </li>
              @endif

              @if (auth()->user()->level=="BK"||auth()->user()->level=="admin")
              <li class="menu-header">Bimbingan</li>
              <li class="nav-item">
                <a href="{{ url('kategori-pelanggaran') }}" class="nav-link" ><i class="fas fa-list-alt"></i> <span>Kategori Pelanggaran</span></a>
              </li>
              <li class="nav-item">
                <a href="{{ url('pelanggaran') }}" class="nav-link" ><i class="fas fa-solid fa-clipboard-list"></i><span>Pelanggaran</span></a>
              </li>
          <!--     <li class="nav-item">
                <a href="{{ url('cek-pelanggaran') }}" class="nav-link" ><i class="fas fa-solid fa-clipboard-check"></i> <span>Cek Pelanggaran</span></a>
              </li> -->
              <li class="nav-item">
                <a href="{{ url('laporan-pelanggaran') }}" class="nav-link" ><i class="fas fa-solid fa-book-open"></i><span>Laporan Pelanggaran</span></a>
              </li>
              @endif
        </aside>
      </div>