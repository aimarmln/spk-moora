<nav class="navbar navbar-expand navbar-light  bg-light mb-5 shadow">
  <!-- Sidebar Toggle (Topbar) -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button type="button" id="sidebarCollapse" class="btn btn btn-light btn-lg">
        <i class="fas fa-align-left"></i>  
      </button>
    </div>
  </nav>
  <div class="row">
    <div class="col-md-12">
      <h5 class="mt-2 font-weight-bolder text-primary ">
        <b style="color: rgba(1, 67, 56, 0.8);">Pemilihan Siswa Penerima Bantuan PAUDQu Assabiqunal Awwalun <span style="color: rgba(1, 67, 56, 0.8);">MOORA</span></b>
      </h5>
    </div>
  </div>

  <ul class="navbar-nav ml-auto">
    <div class="topbar-divider d-none d-sm-block m"></div>
    <br>
    <li>
      <h6 class="mt-2 mr-4 font-weight-bold text-primary text-dark">
            <i class="fas fa-user-circle mr-lg-2 text-lg"></i>
            <span>{{ ($role == 'admin') ? session('admin_username') : session('user_username') }}</span>
      </h6>
    </li>
    <li class="nav-item dropdown no-arrow ">
      <button type="button" class="btn btn-danger font-weight-bolder btn-user shadow rounded-pill" data-toggle="modal" data-target="#exampleModalCenter">
        <i class="fas fa-sign-out-alt mr-lg-2"></i>
        Sign Out</button>
    </li>

    <!-- Modal -->
    <div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bolder text-primary " id="exampleModalLongTitle">Peringatan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Apakah anda ingin keluar dari halaman ini?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            <form action="{{ ($role == 'admin') ? route('logout-admin') : route('logout-user') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-primary btn btn-danger {{ (request()->is('admin/dashboard') || request()->is('user/dashboard')) ? 'mt-3' : '' }}">Iya</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    </li>
  </ul>
</nav>

<script>
  $(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
      $('#sidebar').toggleClass('active');
    });
  });
</script>
