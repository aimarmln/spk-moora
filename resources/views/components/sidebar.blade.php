<div class="wrapper">
  {{-- sidebar --}}
  <nav id="sidebar">
    <img src="{{ asset('img/logo.png') }}" class="img-fluid" alt="Responsive image">
    <ul class="list-unstyled components">
      @if ($role == 'admin')
        <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
          <a href="{{ route('admin.dashboard') }}"><i class="fas fa-fw fa-home mr-3"></i>Dashboard</a>
        </li>
        <li class="{{ request()->is('admin/registrasi-guru') ? 'active' : '' }}">
          <a href="{{ route('admin.registrasi-guru') }}"><i class="fas fa-fw fa-users-cog mr-3"></i>Pengaturan Akun Guru</a>
        </li>
        <li class="{{ request()->is('admin/registrasi-admin') ? 'active' : '' }}">
          <a href="{{ route('admin.registrasi-admin') }}"><i class="fas fa-fw fa-users-cog mr-3"></i>Pengaturan Akun Admin</a>
        </li>
        <li class="{{ request()->is('admin/data-siswa') ? 'active' : '' }}">
          <a href="{{ route('admin.data-siswa') }}"><i class="fas fa-fw fa-table mr-3"></i>Data Nama Siswa</a>
        </li>
        <li class="{{ request()->is('admin/data-kriteria') ? 'active' : '' }}">
          <a href="{{ route('admin.data-kriteria') }}"><i class="fas fa-fw fa-book mr-3"></i>Kriteria MOORA</a>
        </li>
      @elseif ($role == 'user')
        <li class="{{ request()->is('user/dashboard') ? 'active' : '' }}">
          <a href="{{ route('user.dashboard') }}"><i class="fas fa-fw fa-home mr-3"></i>Dashboard</a>
        </li>
        <li class="{{ request()->is('user/proses-moora') || request()->is('user/normalisasi-moora') || request()->is('user/hasil-optimasi-moora') ? 'active' : '' }}">
          <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <i class="fas fa-fw fa-calculator mr-3"></i>Perhitungan MOORA
          </a>
          <ul class="collapse list-unstyled" id="pageSubmenu">
            <li class="{{ request()->is('user/proses-moora') ? 'active' : '' }}">
              <a href="{{ route('moora-proses') }}">Proses Moora</a>
            </li>
            <li class="{{ request()->is('user/normalisasi-moora') ? 'active' : '' }}">
              <a href="{{ route('moora-normalisasi') }}">Normalisasi Metode Moora</a>
            </li>
            <li class="{{ request()->is('user/hasil-optimasi-moora') ? 'active' : '' }}">
              <a href="{{ route('moora-hasil-optimasi') }}">Hasil Optimasi</a>
            </li>
          </ul>
        </li>
        <li class="{{ request()->is('user/perangkingan') ? 'active' : '' }}">
          <a href="{{ route('moora-perangkingan') }}"><i class="fas fa-fw fa-trophy mr-3"></i>Perangkingan</a>
        </li>
        <li class="{{ request()->is('user/data-siswa') ? 'active' : '' }}">
          <a href="{{ route('user.data-siswa') }}"><i class="fas fa-fw fa-table mr-3"></i>Data Nama Siswa</a>
        </li>
        <li class="{{ request()->is('user/data-kriteria') ? 'active' : '' }}">
          <a href="{{ route('user.data-kriteria') }}"><i class="fas fa-fw fa-book mr-3"></i>Kriteria MOORA</a>
        </li>
      @endif
    </ul>
  </nav>
</div>
