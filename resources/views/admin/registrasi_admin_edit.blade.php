<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:role>{{ $role }}</x-slot:role>

  <div class="col">
    <div class="container">
      <div class="col-xl-12 col-lg-8">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold text-primary"><b style="color: rgba(1, 67, 56, 0.8);">Tambah Akun</b></h5>
          </div>
          <div class="card-body">
            <form class="form" method="post" name="converter" action="{{ route('registrasi-admin.update', $dataAdmin->id_admin) }}">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label class="control-label col-md-12 col-sm-12 col-xs-12">ID Account</label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <input class="form-control" type="text" name="id_admin" value="{{ $dataAdmin->id_admin }}" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-12 col-sm-12 col-xs-12">Nama Pegawai</label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <input class="form-control" type="text" name="nama_admin" value="{{ old('nama_admin', $dataAdmin->nama_admin) }}" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-sm-6 col-sm-6">
                  <label class="control-label col">Username</label>
                  <div class="col">
                    <input class="form-control" type="text" name="username" value="{{ old('username', $dataAdmin->username) }}" required>
                  </div>
                </div>
                <div class="col-sm-6 col-sm-6">
                  <label class="control-label col">Password</label>
                  <div class="col">
                    <input class="form-control" type="password" name="password" value="{{ old('password', $dataAdmin->password) }}" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-12 col-sm-12 col-xs-12">Level Akun</label>
                <div class="input-group-prepend col-sm-1 col-sm-3 col-sm-3">
                  <select class="custom-select" name="level" required>
                    <option value="Admin" {{ old('level', $dataAdmin->level) == 'Admin' ? 'selected' : '' }}>Admin</option>
                  </select>
                </div>
              </div>
              <div class="mb-5"></div>
              <div class="col text-center">
                <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                <a href="/admin/registrasi-admin" class="btn btn-danger">Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layout>
