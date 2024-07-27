<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:role>{{ $role }}</x-slot:role>

  <div class="col">
    <div class="container">
      <div class="col-xl-12  col-lg-8">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h5 class="m-0 font-weight-bold text-primary"> <b style="color: rgba(1, 67, 56, 0.8);"> Tambah Siswa </b></h5>
          </div>
          <div class="card-body">
            <form class="form" method="POST" action="{{ route('data-siswa.update', $dataSiswa->id_siswa) }}">
              @csrf
              @method('PUT')
              <div class="form-group ">
                <label class="control-label col-md-12 col-sm-12 col-xs-12">Nomor</label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <input class="form-control" type="text" name="id_siswa" value="{{ $dataSiswa->id_siswa }}" readonly="readonly">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-12 col-sm-12 col-xs-12">Nomor Induk Siswa</label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <input id="txtNumber" onkeypress="return isNumberKey(event)" maxlength="4" class="form-control" type="text" name="nis" value="{{ old('nis', $dataSiswa->nis) }}" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-12 col-sm-12 col-xs-12">Nama Siswa</label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <input class="form-control" id="txtCharacter" onkeypress="return isNumericKey(event)" type="text" name="nama_siswa" value="{{ old('nama_siswa', $dataSiswa->nama_siswa) }}" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-12 col-sm-12 col-xs-12">Alamat Siswa</label>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <textarea class="form-control" style="resize:none" name="alamat" required>{{ old('alamat', $dataSiswa->alamat) }}</textarea>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-sm-6 col-sm-6 ">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12">Nama Ayah</label>
                  <div class="col">
                    <input class="form-control" id="txtCharacter" type="text" onkeypress="return isNumericKey(event)" name="nama_ayah" value="{{ old('nama_ayah', $dataSiswa->nama_ayah) }}" required>
                  </div>
                </div>
                <div class="form-group col-sm-6 col-sm-6">
                  <label class="control-label col">Pekerjaan Ayah</label>
                  <div class="col">
                    <input class="form-control"  id="txtCharacter" type="text" onkeypress="return isNumericKey(event)" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah', $dataSiswa->pekerjaan_ayah) }}" required>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-sm-6 col-sm-6 ">
                  <label class="control-label col-md-12 col-sm-12 col-xs-12">Nama Ibu</label>
                  <div class="col">
                    <input class="form-control"  id="txtCharacter" onkeypress="return isNumericKey(event)" type="text" name="nama_ibu" value="{{ old('nama_ibu', $dataSiswa->nama_ibu) }}" required>
                  </div>
                </div>
                <div class="form-group col-sm-6 col-sm-6">
                  <label class="control-label col">Pekerjaan Ibu</label>
                  <div class="col">
                    <input class="form-control"  id="txtCharacter" onkeypress="return isNumericKey(event)" type="text" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu', $dataSiswa->pekerjaan_ibu) }}" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-12 col-sm-12 col-xs-12">Penghasilan Orang Tua</label>
                <div class="input-group-prepend col">
                  <select class="custom-select" name="penghasilan" required>
                    <option value="" selected>--- Pilih Penghasilan Orang Tua ---</option>
                    <option value="Lebih dari Rp 4.000.000" {{ old('penghasilan', $dataSiswa->penghasilan) == 'Lebih dari Rp 4.000.000' ? 'selected' : '' }}>Lebih dari Rp 4.000.000</option>
                    <option value="Rp 2.000.000 - Rp 4.000.000" {{ old('penghasilan', $dataSiswa->penghasilan) == 'Rp 2.000.000 - Rp 4.000.000' ? 'selected' : '' }}>Rp 2.000.000 - Rp 4.000.000</option>
                    <option value="Rp 1.000.000 - Rp 2.000.000" {{ old('penghasilan', $dataSiswa->penghasilan) == 'Rp 1.000.000 - Rp 2.000.000' ? 'selected' : '' }}>Rp 1.000.000 - Rp 2.000.000</option>
                    <option value="Rp 50.000 - Rp 1.000.000" {{ old('penghasilan', $dataSiswa->penghasilan) == 'Rp 50.000 - Rp 1.000.000' ? 'selected' : '' }}>Rp 50.000 - Rp 1.000.000</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-sm-6 col-sm-6">
                  <label class="control-label col">Jarak yang ditempuh untuk kesekolah</label>
                  <div class="col input-group-append">
                    <input class="form-control" step=".1" min="1" type="number" name="jarak" value="{{ old('jarak', $dataSiswa->jarak) }}" required>
                    <span class="input-group-text">Kilometer</span>
                  </div>
                </div>
                <div class="form-group col-sm-6 col-sm-6">
                  <label class="control-label col">Tanggungan Orang Tua</label>
                  <div class="col input-group-append">
                    <input class="form-control" type="number" min="1" step="1" name="tanggungan" value="{{ old('tanggungan', $dataSiswa->tanggungan) }}" required>
                    <span class="input-group-text">Tanggungan</span>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-sm-6 col-sm-6">
                  <label class="control-label col">Rata-Rata nilai rapot</label>
                  <div class="col">
                    <input class="form-control" type="number" step="1" min="1" max="100" name="rata_nilai" value="{{ old('rata_nilai', $dataSiswa->rata_nilai) }}" required>
                  </div>
                </div>
                <div class="form-group col-sm-6 col-sm-6">
                  <label class="control-label col">Absensi Kehadiran Siswa</label>
                  <div class="col input-group-prepend">
                    <input class="form-control" type="number" step="1" min="1" max="100" name="kehadiran" value="{{ old('kehadiran', $dataSiswa->kehadiran) }}" required>
                    <span class="input-group-text">%</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-12 col-sm-12 col-xs-12">Pendidikan Terakhir Orang Tua</label>
                <div class="input-group-prepend col">
                  <select class="custom-select" name="pendidikan" required>
                    <option value="" selected>--- Pilih Pendidikan Terakhir Orang Tua ---</option>
                    <option value="SARJANA" {{ old('pendidikan', $dataSiswa->pendidikan) == 'SARJANA' ? 'selected' : '' }}>SARJANA</option>
                    <option value="DIPLOMA" {{ old('pendidikan', $dataSiswa->pendidikan) == 'DIPLOMA' ? 'selected' : '' }}>DIPLOMA</option>
                    <option value="SMA" {{ old('pendidikan', $dataSiswa->pendidikan) == 'SMA' ? 'selected' : '' }}>SMA</option>
                    <option value="SMP" {{ old('pendidikan', $dataSiswa->pendidikan) == 'SMP' ? 'selected' : '' }}>SMP</option>
                    <option value="SD" {{ old('pendidikan', $dataSiswa->pendidikan) == 'SD' ? 'selected' : '' }}>SD</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="col text-center mt-3 mb-3">
                <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
                <a href="/admin/data-siswa" class="btn btn-danger">Batal</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-layout>

<script>
  function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 
    && (charCode < 48 || charCode > 57))
    return false;
    return true;
  }  
        
  function isNumericKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode != 46 && charCode > 31 
    && (charCode < 48 || charCode > 57))
    return true;
    return false;
  }
</script>
