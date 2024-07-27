<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:role>{{ $role }}</x-slot:role>

  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-xl-12">
        <div class="card mb-4 card border-success">
          <div class="card-header">
            <div class="row">
              <div class="col">
                <h5 class="mt-2 font-weight-bold text-success"><b style="color: rgba(1, 67, 56, 0.8);">Hasil Rekomendasi</b></h5>
              </div>
            </div>
          </div>
          <div class="card-body text-success" style="color: black !important;">
    Nama siswa prioritas yang terpilih untuk menerima bantuan adalah 
    <b style="color: rgba(1, 67, 56, 0.8);">{{ $hasilAlternatif }}</b> 
    dengan nilai optimasi 
    <b style="color: rgba(1, 67, 56, 0.8);">{{ $hasilOptimasi }}</b>
</div>


        </div>
      </div>

      <!-- rangking -->
      <div class="col-lg-12 col-xl-12">
        <div class="card shadow mb-4">
          <div class="card-header">
            <div class="row">
              <div class="col-lg-6 col-xl-6">
                <h5 class="mt-2 font-weight-bold text-primary"> <b style="color: rgba(1, 67, 56, 0.8);"> Perangkingan </b></h5>
              </div>
              <div class="col-lg-6 col-xl-6" style="text-align: right;">
                <a class="btn btn-dark rounded shadow" href="/user/proses-moora">
                <i class="fas fa-calculator mr-lg-2"></i>Perhitungan MOORA</a>
                <a class="btn btn-dark" href="/user/cetak-siswa">
                  <span class="icon ">
                    <i class="fas fa-print mr-lg-2"></i>
                  </span>Cetak Tabel</a>            
              </div>
            </div>
          </div>
          <div class="card-body">
            <table border="border-left-info" class="table table-responsive-sm table-bordered table-striped shadow table-sm table-hover" width="100%" cellspacing="0" id=sortdisable>
              <thead align="center" class=thead-dark>
                <tr>
                  <th>Nama Siswa</th>
                  <th>Alternatif</th>
                  <th>Nilai Optimasi</th>
                  <th>Rangking</th>
                </tr>
              </thead>
              <tbody align="center">
                @foreach ($optimasi as $key => $value)
                  <tr>
                    <td>{{ $alternatif[$key][1] }}</td>
                    <td>{{ 'A' . $alternatif[$key][0] }}</td>
                    <td>{{ $optimasi[$key] }}</td>
                    <td>{{ 'Rangking ke ' . $rank++ }}</td>
                  </tr>
                @endforeach
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
<script>
$('#sortdisable').dataTable({
    "ordering": false
});
</script>
