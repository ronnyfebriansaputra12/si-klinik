@extends('admin.layouts.main')

@section('container')


    <div class="card">
        <h5 class="card-header">Pasien</h5>
        <div class="card-body">
            <h5 class="card-title">Edit Data Pasien</h5>
            <form action ="/pasiens/{{ $pasiens->id }}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">NIK</label>
                  <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{old('nik',$pasiens->nik)}}">
                  @error('nik')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>   
  
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror" id="nama_pasien" name="nama_pasien" value="{{old('nama_pasien',$pasiens->nama_pasien)}}">
                    @error('nama_pasien')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>   
  
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Umur</label>
                  <input type="text" class="form-control @error('umur_pasien') is-invalid @enderror" id="umur_pasien" name="umur_pasien" value="{{old('umur_pasien',$pasiens->umur_pasien)}}">
                  @error('umur_pasien')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
  
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                  <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{old('alamat',$pasiens->alamat)}}">
                  @error('alamat')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
                
                <div class="mb-3">
                  <label class="form-label">Jenis Kelamin</label>
                  <div class="d-flex">
                      <div class="form-check me-3">
                          <input type="radio" class="form-check-input" name="jenis_kelamin" value="L" {{ old('jenis_kelamin',$pasiens->jenis_kelamin)=='L' ? 'checked' : ''}} checked>Laki-laki
                      </div>
                      <div class="form-check me-3">
                          <input type="radio" class="form-check-input" name="jenis_kelamin" value="P" @checked(old('jenis_kelamin',$pasiens->jenis_kelamin)=='P')>Perempuan
                      </div>
                  </div>
                  @error('jenis_kelamin')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
              </div> 
  
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Edit Data</button>
              </div>
  
              </form>

        </div>
    </div>



    
@endsection