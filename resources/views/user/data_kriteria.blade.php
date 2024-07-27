<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:role>{{ $role }}</x-slot:role>

  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-xl-12 ">
        <div class="card mb-4 shadow ">
          <div class="card-header">
            <div class="row">
              <div class="col">
                <h5 class="mt-2 font-weight-bold text-primary"><b style="color: rgba(1, 67, 56, 0.8);">Jenis Dan Bobot Kriteria</b></h5>
              </div>
            </div>
          </div>
          <div class="card-body">
            <table border="border-left-info" class="table table-bordered table-striped table-hover table-sm" width="100%" cellspacing="0" id="dataTable">
              <thead align="center" class="thead-dark">
                <th> Kode </th>
                <th> Kriteria </th>
                <th> Type </th>
                <th> Bobot </th>
              </thead>
              <tbody>
                {{-- loop kriteria --}}
                @foreach ($mooraKriteria as $kriteria)                  
                  <tr>
                    <td align="center">{{ $kriteria->kode }}</td>
                    <td align="center">{{ $kriteria->kriteria }}</td>
                    <td align="center">{{ $kriteria->type }}</td>
                    <td align="center">{{ $kriteria->bobot * 100 }}%</td>
                  </tr>
                 @endforeach
                 {{-- end loop --}}
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-xl-12">
            <div class="card shadow mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5 class="mt-2 font-weight-bold text-dark text-primary text-center"><b style="color: rgba(1, 67, 56, 0.8);">Nilai Sub-kriteria</b></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-xl-6">
            <div class="card shadow mb-4">
              <div class="card-header ">
                <div class="row">
                  <div class="col">
                    <h5 class="mt-2 font-weight-bold text-primary">
                      <b style="color: rgba(1, 67, 56, 0.8);">Nilai Untuk Kriteria Penghasilan Orang Tua</b>
                    </h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered table-striped table-hover table-sm" width="100%" cellspacing="0">
                  <thead align="center" class="thead-dark">
                    <th> Nomor </th>
                    <th> Penghasilan Perbulan </th>
                    <th> Nilai </th>
                  </thead>
                  <tbody>
                    {{-- loop kriteria penghasilan ortu --}}
                    @foreach ($kriteriaPenghasilanOrtu as $row)
                      <tr>
                        <td align="center">{{ $row->id_penghasilan }}</td>
                        <td align="center">{{ $row->penghasilan }}</td>
                        <td align="center">{{ $row->nilai }}</td>
                      </tr>
                    @endforeach
                    {{-- end loop --}}
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-xl-6">
            <div class="card shadow mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5 class="mt-2 font-weight-bold text-primary">
                      <b style="color: rgba(1, 67, 56, 0.8);">Nilai Untuk Kriteria Jarak yang Ditempuh Siswa</b>
                   </h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered table-striped table-hover table-sm" width="100%" cellspacing="0">
                  <thead align="center" class="thead-dark">
                    <th> Nomor </th>
                    <th> Jarak </th>
                    <th> Nilai </th>
                  </thead>
                  <tbody>
                    {{-- loop kriteria jarak --}}
                    @foreach ($kriteriaJarak as $row)  
                      <tr>
                        <td align="center">{{ $row->id_jarak }} </td>
                        <td align="center">{{ $row->jarak }} KM</td>
                        <td align="center">{{ $row->nilai }}</td>
                      </tr>
                    @endforeach
                    {{-- end loop --}}
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-xl-6">
            <div class="card shadow mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5 class="mt-2 font-weight-bold text-primary"> 
                      <b style="color: rgba(1, 67, 56, 0.8);">Nilai Untuk Kriteria Jumlah Tanggungan Orang Tua</b>
                    </h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered table-striped table-hover table-sm" width="100%" cellspacing="0">
                  <thead align="center" class="thead-dark">
                    <th> Nomor </th>
                    <th> Tanggungan </th>
                    <th> Nilai </th>
                  </thead>
                  <tbody>
                    {{-- loop kriteria tanggungan --}}
                    @foreach ($kriteriaTanggungan as $row)   
                      <tr>
                        <td align="center">{{ $row->id_tanggungan }} </td>
                        <td align="center">{{ $row->tanggungan }} Tanggungan</td>
                        <td align="center">{{ $row->nilai }}</td>
                      </tr>
                    @endforeach
                    {{-- end loop --}}
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-xl-6">
            <div class="card shadow mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5 class="mt-2 font-weight-bold text-primary"> 
                      <b style="color: rgba(1, 67, 56, 0.8);">Nilai Untuk Kriteria Rata-Rata Nilai Siswa</b>
                    </h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered table-striped table-hover table-sm" width="100%" cellspacing="0">
                  <thead align="center" class="thead-dark">
                    <th> Nomor </th>
                    <th> Nilai Rata-Rata</th>
                    <th> Nilai </th>
                  </thead>
                  <tbody>
                    {{-- loop kriteria rata nilai --}}
                    @foreach ($kriteriaRataNilai as $row)                     
                      <tr>
                        <td align="center">{{ $row->id_rata_nilai }}</td>
                        <td align="center">{{ $row->rata_nilai }}</td>
                        <td align="center">{{ $row->nilai }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-xl-6">
            <div class="card shadow mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5 class="mt-2 font-weight-bold text-primary"> 
                      <b style="color: rgba(1, 67, 56, 0.8);">Nilai Untuk Kriteria Kehadiran Siswa</b>
                    </h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered table-striped table-hover table-sm" width="100%" cellspacing="0">
                  <thead align="center" class="thead-dark">
                    <th> Nomor </th>
                    <th> Kehadiran </th>
                    <th> Nilai </th>
                  </thead>
                  <tbody>
                    {{-- loop kriteria kehadiran --}}
                    @foreach ($kriteriaKehadiran as $row)  
                      <tr>
                        <td align="center">{{ $row->id_kehadiran }}</td>
                        <td align="center">{{ $row->kehadiran }}%</td>
                        <td align="center">{{ $row->nilai }}</td>
                      </tr>
                    @endforeach
                    {{-- end loop --}}
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5 class="mt-2 font-weight-bold text-primary">
                      <b style="color: rgba(1, 67, 56, 0.8);">Nilai Untuk Kriteria Pendidikan Terakhir Orang Tua</b>
                    </h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered table-striped table-hover table-sm " width="100%" cellspacing="0">
                  <thead align="center" class="thead-dark">
                    <th> No </th>
                    <th> Pendidikan Terakhir Orang Tua </th>
                    <th> Nilai </th>
                  </thead>
                  <tbody>
                    {{-- loop kriteria pendidikan --}}
                    @foreach ($kriteriaPendidikan as $row)                      
                      <tr>
                        <td align="center">{{ $row->id_pendidikan }}</td>
                        <td align="center">{{ $row->pendidikan }}</td>
                        <td align="center">{{ $row->nilai }}</td>
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
