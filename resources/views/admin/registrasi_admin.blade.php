<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:role>{{ $role }}</x-slot:role>
  
  <div class = "container">
    <div class="row">
      <div class="col-lg-12 col-xl-12">
        <div class="card shadow mb-4">
          <div class="card-header">
            <div class="row">
              <div class="col">
                <h5 class="mt-2 font-weight-bold text-primary"><b style="color: rgba(1, 67, 56, 0.8);">Pengaturan Akun Admin</b></h5>
              </div>
              <div class="col-lg-6 col-xl-6" style="text-align: right;">
                <a class="btn btn-primary shadow" href="/admin/registrasi-admin-tambah"> 
                  <span class="icon "><i class="fas fa-user-plus mr-lg-2"></i>Tambah Akun Pegawai
                </a>
              </div>
            </div>
          </div>
          <div class="card-body table-responsive ">
            <table border="border-left-info" class=" shadow table table-bordered table-striped table-hover table-sm " id="sortdisable">
              <thead align="center" class="thead-dark">
                <th>ID</th>
                <th>Nama Pegawai</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th style="width: 100px;">Aksi</th>
              </thead>
              <tbody>
                {{-- start loop --}}
                @foreach ($admins as $admin)
                  <tr>
                    <td align="center">{{ $admin->id_admin }}</td>
                    <td align="center">{{ $admin->nama_admin }}</td>
                    <td align="center">{{ $admin->username }}</td>
                    <td align="center">{{ 'Dirahasiakan' }}</i></td>
                    <td align="center">{{ $admin->level }}</td>
                    <td align="center">
                      <a class="btn btn-outline-info btn-sm mb-2  border-0"
                        href="/admin/registrasi-admin/{{ $admin->id_admin }}/edit">
                        <span class="icon">
                          <i class="fas fa-edit"></i>
                        </span>
                      </a>
                      <form action="{{ route('registrasi-admin.destroy', $admin->id_admin) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger mb-2 btn-sm border-0" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                          <span class="icon">
                            <i class="fas fa-trash"></i>
                          </span>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
                {{-- end loop --}}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layout>

@if (session('insert_success'))
  <script>
    alert('{{ session('insert_success') }}');
  </script>
@endif

@if (session('update_success'))
  <script>
    alert('{{ session('update_success') }}');
  </script>
@endif

@if (session('delete_success'))
  <script>
    alert('{{ session('delete_success') }}');
  </script>
@endif

@if (session('delete_error'))
  <script>
    alert('{{ session('delete_error') }}');
  </script>
@endif

<script src="{{ asset('js/jquery-easing/delete.js') }}"></script>
<script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('datatables/dataTables.bootstrap4.js') }}"></script>
<script>
  $('#sortdisable').dataTable({
    "ordering": false
  });
</script>
