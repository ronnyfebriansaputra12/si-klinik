@extends('admin.layouts.main')

@section('container')

<div class="card">
    <h5 class="card-header">Pemeriksaan</h5>
    <div class="card-body">
        <form action ="/pemeriksaan" method="post">
            @csrf

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Kode Pemeriksaan</label>
                <input type="text" class="form-control @error('kode_pemeriksaan') is-invalid @enderror" id="kode_pemeriksaan" name="kode_pemeriksaan" value="{{old('kode_pemeriksaan','KP-'.$kd)}}" readonly >
                @error('kode_pemeriksaan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>  

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Antrian</label>
                        <select class="form-select" name="antrian_id" aria-label="Default select example">
                            <option selected></option>
                            @foreach($antrians as $antrian)
                                @if (old('jurusan_id') == $antrian->id)
                                    <option value="{{ $antrian->id }}" selected>{{ $antrian->no_antrian }}</option>
                                @else
                                    <option value="{{ $antrian->id }}">{{ $antrian->no_antrian }}</option>  
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="jurusan" class="form-label">Pasien</label>
                    <select class="form-select" name="pasien_id" aria-label="Default select example">
                        <option selected></option>
                        @foreach($pasiens as $pasien)
                            @if (old('jurusan_id') == $pasien->id)
                                <option value="{{ $pasien->id }}" selected>{{ $pasien->nama_pasien }} - {{ $pasien->nik }}</option>
                            @else
                                <option value="{{ $pasien->id }}">{{ $pasien->nama_pasien }} - {{ $pasien->nik }}</option>  
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Dokter</label>
            <select class="form-select" name="dokter_id" aria-label="Default select example">
                <option selected></option>
                @foreach($dokters as $dokter)
                    @if (old('dokter_id') == $dokter->id)
                        <option value="{{ $dokter->id }}" selected>{{ $dokter->nama_dokter }}</option>
                    @else
                        <option value="{{ $dokter->id }}">{{ $dokter->nama_dokter }}</option>  
                    @endif
                @endforeach
            </select>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Suhu Badan</label>
                    <input type="text" class="form-control @error('suhu_badan') is-invalid @enderror" id="suhu_badan" name="suhu_badan" value="{{old('suhu_badan')}}"  autofocus>
                    @error('suhu_badan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tekanan Darah</label>
                    <input type="text" class="form-control @error('tekanan_darah') is-invalid @enderror" id="tekanan_darah" name="tekanan_darah" value="{{old('tekanan_darah')}}"  autofocus>
                    @error('tekanan_darah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>   
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Keluhan</label>
            <input type="text" class="form-control @error('keluhan') is-invalid @enderror" id="keluhan" name="keluhan" value="{{old('keluhan')}}"  autofocus>
            @error('keluhan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
            
            <div class="mb-3">
                <label for="status_antrian" class="form-label">Status Pemeriksaan</label>
                <select class="form-select" name="status_pemeriksaan" aria-label="Default select example">
                    <option selected></option>
                    <option value="selesai">Selesai</option>
                    <option value="belum">Belum</option>
                </select>
            </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
        </div>

        </form>
    </div>
</div>


@endsection