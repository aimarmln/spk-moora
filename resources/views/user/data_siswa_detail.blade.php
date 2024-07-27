<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:role>{{ $role }}</x-slot:role>

  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-lg-10 col-xl-10">
        <div class="card shadow mb-4">
          <div class="card-header">
            <div class="row">
              <div class="col">
                <h5 class="mt-2 font-weight-bold text-primary"> <b style="color: rgba(1, 67, 56, 0.8);"> Detail Siswa </b></h5>
              </div>
              <div class="col-lg-6 col-xl-6" style="text-align: right;">
                <a class="btn btn-outline-dark font-weight-bold" href="/user/data-siswa"><span class="icon "><i class="fas fa-arrow-left mr-lg-2"></i>Kembali</a>
              </div>
            </div>
          </div>
          <div class="card-body" style="background-color: #ecf0f1;">
            <div class=" ml-4">
              <div class="col  ">
                <div class=" mt-md-4 mb-4">
                  <h5>Nomor Urut</h5>
                  {{ $dataSiswa->id_siswa }}
                  <div class=" mt-md-4 mb-4">
                    <h5>Nomor Induk Siswa</h5>
                    {{ $dataSiswa->nis }}
                  </div>
                  <div class=" mt-md-4 mb-4">
                    <h5>Nama Lengkap Siswa</h5>
                    {{ $dataSiswa->nama_siswa }}
                  </div>
                  <div class=" mt-md-4 mb-4">
                    <h5>Alamat Lengkap Siswa</h5>
                    {{ $dataSiswa->alamat }}
                  </div>
                  <div class=" mt-md-4 mb-4">
                    <h5>Penghasilan Orang Tua</h5>
                    {{ $dataSiswa->penghasilan }} / Bulan
                  </div>
                  <div class=" mt-md-4 mb-4">
                    <h5>Pekerjaan Ayah</h5>
                    {{ $dataSiswa->pekerjaan_ayah }}
                    <div class=" mt-md-4 mb-4">
                      <h5>Pekerjaan Ibu</h5>
                      {{ $dataSiswa->pekerjaan_ibu }}
                      <div class=" mt-md-4 mb-4">
                        <h5>Jarak yang ditempuh untuk kesekolah</h5>
                        {{ $dataSiswa->jarak }} Kilometer
                      </div>
                      <div class=" mt-md-4 mb-4">
                        <h5>Nama Ayah</h5>
                        {{ $dataSiswa->nama_ayah }}
                      </div>
                      <div class=" mt-md-4 mb-4">
                        <h5>Nama Ibu</h5>
                        {{ $dataSiswa->nama_ibu }}
                      </div>
                      <div class=" mt-md-4 mb-4">
                        <h5>Jumlah Tanggungan</h5>
                        {{ $dataSiswa->tanggungan }} Tanggungan
                      </div>
                      <div class=" mt-md-4 mb-4">
                        <h5>Pendidikan Terakhir Orang Tua</h5>
                        {{ $dataSiswa->pendidikan }}
                      </div>
                      <div class=" mt-md-4 mb-4">
                        <h5>Nilai Rata-Rata Rapot</h5>
                        {{ $dataSiswa->rata_nilai }}
                      </div>
                      <div class=" mt-md-4 mb-4">
                        <h5>Persentase Kehadiran Siswa</h5>
                        {{ $dataSiswa->kehadiran }}%
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layout>