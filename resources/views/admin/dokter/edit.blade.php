@extends('admin.layouts.main')

@section('container')


    <div class="card">
        <h5 class="card-header">Dokter</h5>
        <div class="card-body">
            <h5 class="card-title">Edit Data Dokter</h5>
            <form action ="/dokter/{{ $dokters->id }}" method="post">
                @method('PUT')
                @csrf
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama_dokter') is-invalid @enderror" id="nama_dokter" name="nama_dokter" value="{{old('nama_dokter',$dokters->nama_dokter)}}" required autofocus>
                    @error('nama_dokter')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                  
                  <div class="mb-3">
                      <label class="form-label">Jenis Kelamin</label>
                      <div class="d-flex">
                          <div class="form-check me-3">
                              <input type="radio" class="form-check-input" name="jenis_kelamin" value="L" {{ old('jenis_kelamin',$dokters->jenis_kelamin)=='L' ? 'checked' : ''}} checked>Laki-laki
                          </div>
                          <div class="form-check me-3">
                              <input type="radio" class="form-check-input" name="jenis_kelamin" value="P" @checked(old('jenis_kelamin',$dokters->jenis_kelamin)=='P')>Perempuan
                          </div>
                      </div>
                      @error('jenis_kelamin')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                  </div> 
  
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Umur</label>
                  <input type="text" class="form-control @error('umur') is-invalid @enderror" id="umur" name="umur" value="{{old('umur',$dokters->umur)}}" required autofocus>
                  @error('umur')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
  
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">No HP</label>
                  <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{old('no_hp',$dokters->no_hp)}}" required autofocus>
                  @error('no_hp')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
  
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email',$dokters->email)}}" required autofocus>
                  @error('email')
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