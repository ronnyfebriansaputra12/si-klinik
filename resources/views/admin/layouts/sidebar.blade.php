  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('dashboard') }}">
          <i class="bi bi-person"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link {{ Request::is('pasiens') ? 'active' : '' }}" href="{{ url('pasiens') }}">
          <i class="bi bi-person"></i>
          <span>Pasien</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link {{ Request::is('dokter') ? 'active' : '' }}" href="{{ url('dokter') }}">
          <i class="bi bi-person"></i>
          <span>Dokter</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link {{ Request::is('obat') ? 'active' : '' }}" href="{{ url('obat') }}">
          <i class="bi bi-person"></i>
          <span>Obat</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link {{ Request::is('antrian') ? 'active' : '' }}" href="{{ url('antrian') }}">
          <i class="bi bi-person"></i>
          <span>Antrian</span>
        </a>
      </li><!-- End Profile Page Nav -->


      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link {{ Request::is('pemeriksaan') ? 'active' : '' }}" href="{{ url('pemeriksaan') }}">
          <i class="bi bi-person"></i>
          <span>Pemeriksaan</span>
        </a>
      </li>




    </ul>

  </aside><!-- End Sidebar-->