<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:role>{{ $role }}</x-slot:role>

  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-xl-12">

        <div class="card shadow mb-4">
          <div class="card-header">
            <div class="row">
              <div class="col">
                <h5 class="mt-2 font-weight-bold text-primary"><b style="color: rgba(1, 67, 56, 0.8);"> Nilai kriteria </b></h5>
              </div>
            </div>
          </div>
          <div class="card-body">
            <table border="border-left-info" class="table shadow table-bordered table-striped table-hover table-sm" width="100%" cellspacing="0">
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
                    <h5 class="mt-2 font-weight-bold text-dark text-primary text-center"><b style="color: rgba(1, 67, 56, 0.8);"> Nilai Sub-kriteria </b></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-xl-6">
            <div class="card shadow mb-4">
              <div class="card-header ">
                <div class="row">
                  <div class="col-lg-6 col-xl-12">
                    <h5 class="mt-2 font-weight-bold text-primary"> 
                      <b style="color: rgba(1, 67, 56, 0.8);">
                      {{-- query nama kriteria penghasilan orang tua --}}
                      {{ $mooraKriteria[0]->kriteria }}
                      </b>
                    </h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered table-striped table-hover table-sm" width="100%" cellspacing="0">
                  <thead align="center" class="thead-dark">
                    <th> Nomor </th>
                    <th> 
                      {{-- query nama kriteria penghasilan orang tua --}}
                      {{ $mooraKriteria[0]->kriteria }}
                    </th>
                    <th> Nilai </th>
                  </thead>
                  <tbody>
                    {{-- loop data kriteria penghasilan orang tua --}}
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
                      <b style="color: rgba(1, 67, 56, 0.8);"> 
                        {{-- query nama kriteria jarak yang ditempuh --}}
                        {{ $mooraKriteria[1]->kriteria }}
                      </b>
                    </h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered table-striped table-hover table-sm" width="100%" cellspacing="0">
                  <thead align="center" class="thead-dark">
                    <th> Nomor </th>
                    <th> 
                      {{-- query nama kriteria jarak yang ditempuh --}}
                      {{ $mooraKriteria[1]->kriteria }}
                    </th>
                    <th> Nilai </th>
                  </thead>
                  <tbody>
                    {{-- loop data kriteria jarak --}}
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
                      <b style="color: rgba(1, 67, 56, 0.8);"> 
                        {{-- query nama kriteria tanggungan --}}
                        {{ $mooraKriteria[2]->kriteria }}
                      </b>
                    </h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered table-striped table-hover table-sm" width="100%" cellspacing="0">
                  <thead align="center" class="thead-dark">
                    <th> Nomor </th>
                    <th> 
                      {{-- query nama kriteria tanggungan --}}
                      {{ $mooraKriteria[2]->kriteria }}
                    </th>
                    <th> Nilai </th>
                  </thead>
                  <tbody>
                    {{-- loop data kriteria tanggungan --}}
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
                      <b style="color: rgba(1, 67, 56, 0.8);"> 
                        {{-- query nama kriteria nilai rata-rata siswa --}}
                        {{ $mooraKriteria[4]->kriteria }}
                      </b>
                    </h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered table-striped table-hover table-sm" width="100%" cellspacing="0">
                  <thead align="center" class="thead-dark">
                    <th> Nomor </th>
                    <th> 
                      {{-- query nama kriteria nilai rata-rata siswa --}}
                      {{ $mooraKriteria[4]->kriteria }}
                    </th>
                    <th> Nilai </th>
                  </thead>
                  <tbody>
                    {{-- loop data kriteria nilai rata rata siswa --}}
                    @foreach ($kriteriaRataNilai as $row)                     
                      <tr>
                        <td align="center">{{ $row->id_rata_nilai }}</td>
                        <td align="center">{{ $row->rata_nilai }}</td>
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
                      <b style="color: rgba(1, 67, 56, 0.8);"> 
                        {{-- query nama kriteria kehadiran siswa ku murah --}}
                        {{ $mooraKriteria[5]->kriteria }}
                      </b>
                    </h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered table-striped table-hover table-sm" width="100%" cellspacing="0">
                  <thead align="center" class="thead-dark">
                    <th> Nomor </th>
                    <th> 
                      {{-- query nama kriteria kehadiran siswa --}}
                      {{ $mooraKriteria[5]->kriteria }}
                    </th>
                    <th> Nilai </th>
                  </thead>
                  <tbody>
                    {{-- loop kriteria data kehadiran --}}
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
                      <b style="color: rgba(1, 67, 56, 0.8);"> 
                        {{-- query nama kriteria pendidikan terakhir orang tua --}}
                        {{ $mooraKriteria[3]->kriteria }}
                      </b>
                    </h5>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table border="border-left-info" class="table table-bordered table-striped table-hover table-sm " width="100%" cellspacing="0">
                  <thead align="center" class="thead-dark">
                    <th> No </th>
                    <th> 
                      {{-- query nama kriteria pendidikan terakhir orang tua --}}
                      {{ $mooraKriteria[3]->kriteria }}
                    </th>
                    <th> Nilai </th>
                  </thead>
                  <tbody>
                    {{-- loop data kriteria pendidikan terkahir orang tua --}}
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
    </div>
  </div>
</x-layout>
