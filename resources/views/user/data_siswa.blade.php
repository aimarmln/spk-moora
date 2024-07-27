<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:role>{{ $role }}</x-slot:role>

  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-12 col-lg-8">
        <div class="card shadow mb-4">
          <div class="card-header">
            <div class="row">
              <div class="col-lg-6 col-xl-6">
                <h5 class="mt-2 font-weight-bold text-primary"> <b style="color: rgba(1, 67, 56, 0.8);"> Pemilihan Siswa</b></h5>
              </div>
            </div>
          </div>
          <div class="card-body table-responsive">
            <table border="border-left-info" class="table table-bordered shadow table-striped table-hover table-sm" id="dataTable">
              <thead align="center" class="thead-light">
                <th>No</th>
                <th>Nama Siswa</th>
                {{-- loop kriteria --}}
                @foreach ($mooraKriteria as $kriteria)
                  <th>{{ $kriteria->kriteria }}</th>
                @endforeach
                {{-- end loop --}}
                <th>Detail</th>
              </thead>
              <tbody>
                {{-- loop siswa --}}
                @foreach ($dataSiswa as $siswa)          
                  <tr>
                    <td align="center">{{ $siswa->id_siswa }}</td>
                    <td align="center">{{ $siswa->nama_siswa }}</td>
                    <td align="center" style="width: 20.66%">{{ $siswa->penghasilan }}</td>
                    <td align="center" style="width: 5.66%">{{ $siswa->jarak }} KM</td>
                    <td align="center">{{ $siswa->tanggungan }} Tanggungan</td>
                    <td align="center" style="width: 5.66%">{{ $siswa->pendidikan }}</td>
                    <td align="center" style="width: 3.66%">{{ number_format($siswa->rata_nilai) }}</td>
                    <td align="center" style="width: 1.66%">{{ number_format($siswa->kehadiran) }} %</td>
                    <td align="center">
                      <a class="btn btn-info btn rounded-circle border-0 btn-outline-info" href="/user/data-siswa/{{ $siswa->id_siswa }}">
                        <span class="icon ">
                          <i class="fas fa-info-circle"></i>
                        </span>
                      </a>
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

<script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('datatables/dataTables.bootstrap4.js') }}"></script>
