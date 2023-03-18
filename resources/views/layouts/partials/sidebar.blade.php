<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">{{ Auth::user()->name }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @stack('sideDash')">
      <a class="nav-link" href="/admin">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>
    <li class="nav-item @stack('sideMinta')">
      <a class="nav-link" href="/permintaan/create">
        <i class="fab fa-wpforms"></i>
        <span>Permintaan Peminjaman</span></a>
    </li>

    {{-- Divider --}}
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Mengatur Driver
    </div>
    <li class="nav-item @stack('sideDrive')">
      <a class="nav-link collapsed" href="/jawaban" data-toggle='collapse' href="/kategori" data-target='#collapsdriver' aria-expanded="true">
        <i class="fas fa-user-alt"></i>
        <span>Driver</span></a>
        <div id="collapsdriver" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="/driver">List Driver</a>
              <a class="collapse-item" href="/driver/create">Tambah Driver</a>
          </div>
      </div>
    </li>

    {{-- Divider --}}
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Mengatur Kendaraan
    </div>
    <li class="nav-item @stack('sideKndr')">
      <a class="nav-link collapsed" href="/jawaban" data-toggle='collapse' href="/kategori" data-target='#collapskendaraan' aria-expanded="true">
        <i class="fas fa-truck"></i>
        <span>Kendaraan</span></a>
        <div id="collapskendaraan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="/kendaraan">List Kendaraan</a>
              <a class="collapse-item" href="/permintaan">List Permintaan</a>
              <a class="collapse-item" href="/kendaraan/create">Tambah Kendaraan</a>
          </div>
      </div>
    </li>
    <li class="nav-item @stack('sideJenis')">
      <a class="nav-link collapsed" href="/jawaban" data-toggle='collapse' href="/kategori" data-target='#collapsjenis' aria-expanded="true">
        <i class="fas fa-list"></i>
        <span>Jenis Kendaraan</span></a>
        <div id="collapsjenis" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="/jenis">List Jenis Kendaraan</a>
              <a class="collapse-item" href="/jenis/create">Tambah Jenis Kendaraan</a>
          </div>
      </div>
    </li>


    <hr class="sidebar-divider">
      <li class="nav-item bg-danger">
      <a class="nav-link" href="{{ route('logout') }}"
      onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
       <i class="fas fa-sign-out-alt"></i><span>{{ __('Logout') }}</span>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>