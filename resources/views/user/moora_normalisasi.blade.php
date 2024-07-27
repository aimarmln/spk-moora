<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:role>{{ $role }}</x-slot:role>

  {{-- include perhitungan_hasil.php --}}

  <!-- normalisasi -->
  <div class="container-fluid">
    <div class="col-xl-12 col-lg-8">
      <div class="card shadow mb-4">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-6 col-xl-6">
              <h5 class="mt-2 font-weight-bold text-primary"> <b style="color: rgba(1, 67, 56, 0.8);"> Membuat Matriks Normalisasi </b></h5>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table border="border-left-info" class=" shadow table table-bordered table-striped table-sm table-hover " width="100%" cellspacing="0" id="sortdisable">
            <thead align="center" class="thead-dark">
              <tr>
                <th>Nama</th>
                <th>Alternatif</th>
                {{-- loop kriteria --}}
                @foreach ($kriteria as $key => $value)
                  <th>{{ $value[0] }}</th>
                @endforeach
                {{-- end loop --}}
              </tr>
            </thead>
            <tbody align="center">
              {{-- loop hasil normalisasi --}}
              @foreach ($normal as $key => $value)
                <tr>
                  <td>{{ $alternatif[$key][1] }}</td>
                  <td>{{ 'A' . $alternatif[$key][0] }}</td>
                  @for ($i = 1; $i <= count($value); $i++)
                    <td>{{ $value[$i] }}</td>
                  @endfor
                </tr>
              @endforeach
              {{-- end loop --}}
            </tbody>
          </table>
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
