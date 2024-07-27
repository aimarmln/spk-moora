{{-- {{ dd($sample) }} --}}
{{-- {{ dd($alternatif) }} --}}
{{-- {{ dd($kriteria) }} --}}

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
                  <h5 class="mt-2 font-weight-bold text-primary"><b style="color: rgba(1, 67, 56, 0.8);"> Perhitungan dengan metode MOORA </b></h5>
                </div>
                <div class="col-lg-6 col-xl-6" style="text-align: right;">
                  <form method="POST" action="{{ route('metode.proses') }}">
                    @csrf
                    <input type="submit" name="kosongkan" value="Kosongkan Tabel" class="btn btn-danger shadow rounded mr-1">
                    <input type="submit" name="proses" value="Hitung!" class="btn btn-primary shadow rounded mr-1">
                    <a class="btn btn-dark rounded shadow" href="/user/perangkingan">
                      <i class="fas fa-trophy mr-lg-2"></i>Perangkingan
                    </a>
                  </form>
                </div>
              </div>
            </div>
            <br>
            <div class="container-fluid">
              <div class="col-xl-12 col-lg-8">
                <div class="card shadow mb-4">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-lg-6 col-xl-6">
                        <h5 class="mt-2 font-weight-bold text-primary"> <b style="color: rgba(1, 67, 56, 0.8);"> Pengambilan Nilai Alternatif </b></h5>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <table border="border-left-info" class="table table-bordered table-striped  table-sm table-hover shadow" id="sortdisable" width="100%" cellspacing="0">
                      <thead align="center" class="thead-dark">
                        <tr>
                          <th style="width: 35.66%">Nama</th>
                          <th style="width: 4.66%">Alternatif</th>
                          {{-- loop kriteria --}}
                          @foreach ($kriteria as $key => $value)
                            <th>{{ $value[0] }}</th>
                          @endforeach
                        </tr>
                      </thead>
                      <tbody align="center">
                        @foreach ($sample as $key => $value) 
                          <tr>
                            <td>{{ $alternatif[$key][1] }}</td>  
                            <td>{{ 'A' . $alternatif[$key][0] }}</td>
                            @for ($i = 1; $i <= count($value); $i++)
                              <td>{{ $value[$i] }}</td>
                            @endfor
                          </tr> 
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</x-layout>

@if (session('success'))
  <script>
    alert('{{ session('success') }}');
  </script>
@endif

<script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('datatables/dataTables.bootstrap4.js') }}"></script>
<script>
  $('#sortdisable').dataTable({
    "ordering": false
  });
</script>
