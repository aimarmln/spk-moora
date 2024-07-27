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
                <h5 class="mt-2 font-weight-bold text-primary"><b style="color: rgba(1, 67, 56, 0.8);"> Daftar Siswa </b></h5>
              </div>
              <div class="col-lg-6 col-xl-6" style="text-align: right;">
                <a class="btn btn-primary shadow" href="/admin/data-siswa-tambah">
                <span class="icon ">
                  <i class="fas fa-user-plus mr-lg-2"></i>
                </span>Tambah Data Siswa</a>
              </div>
            </div>
          </div>
          <div class="card-body table-responsive ">
            <table border="border-left-info" class=" shadow table table-bordered table-striped table-hover table-sm " id="dataTable" >
              <thead align="center" class="thead-light">
                <th style="width: 3.66%">No</th>
                <th>Nama Siswa</th>
                {{-- loop the criteria --}}
                  @foreach ($mooraKriteria as $kriteria) 
                    <th>{{ $kriteria->kriteria }}</th>
                  @endforeach
                {{-- end loop --}}
                <th style="width: 15.66%">Aksi</th>
              </thead>
              <tbody>
                {{-- loop student data --}}
                @foreach ($dataSiswa as $siswa)                   
                  <tr>
                    <td align="center" style="width: 1.66%">{{ $siswa->id_siswa }}</td>
                    <td align="center" style="width: 55.66%">{{ $siswa->nama_siswa }}</td>
                    <td align="center" style="width: 25.66%">{{ $siswa->penghasilan }}</td>
                    <td align="center" style="width: 5.66%">{{ $siswa->jarak }} KM</td>
                    <td align="center">{{ $siswa->tanggungan }} Tanggungan</td>
                    <td align="center" style="width: 5.66%">{{ $siswa->pendidikan }}</td>
                    <td align="center" style="width: 3.66%">{{ number_format($siswa->rata_nilai) }}</td>
                    <td align="center" style="width: 3.66%">{{ number_format($siswa->kehadiran) }} %</td>
                    <td align="center" style="width: 1.66%">
                      <a class="btn btn-outline-info btn-sm  border-0"
                        href="/admin/data-siswa/{{ $siswa->id_siswa }}">
                        <span class="icon">
                          <i class="fas fa-info-circle"></i>
                        </span>
                      </a>
                      <a class="btn btn-outline-info btn-sm  border-0"
                        href="/admin/data-siswa/{{ $siswa->id_siswa }}/edit">
                        <span class="icon">
                          <i class="fas fa-edit"></i>
                        </span>
                      </a>
                      <form action="{{ route('data-siswa.destroy', $siswa->id_siswa) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm border-0" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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

<script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('datatables/dataTables.bootstrap4.js') }}"></script>
