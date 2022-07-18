@extends('admin.layouts.main')

@section('container')


    <div class="card">
        <h5 class="card-header">Obat</h5>
        <div class="card-body">
            <h5 class="card-title">Edit Data Obat</h5>
            <form action ="/obat/{{ $obats->id }}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Nama Obat</label>
                  <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" id="nama_obat" name="nama_obat" value="{{old('nama_obat',$obats->nama_obat)}}" required autofocus>
                  @error('nama_obat')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>   
  
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jenis Obat</label>
                    <input type="text" class="form-control @error('jenis_obat') is-invalid @enderror" id="jenis_obat" name="jenis_obat" value="{{old('jenis_obat',$obats->jenis_obat)}}" required autofocus>
                    @error('jenis_obat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>   
  
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Merek Obat</label>
                  <input type="text" class="form-control @error('merek_obat') is-invalid @enderror" id="merek_obat" name="merek_obat" value="{{old('merek_obat',$obats->merek_obat)}}" required autofocus>
                  @error('merek_obat')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>
  
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Masa Berlaku</label>
                  <input type="date" class="form-control @error('masa_berlaku') is-invalid @enderror" id="masa_berlaku" name="masa_berlaku" value="{{old('masa_berlaku',$obats->masa_berlaku)}}" required autofocus>
                  @error('masa_berlaku')
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