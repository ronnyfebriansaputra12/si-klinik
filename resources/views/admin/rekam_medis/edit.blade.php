@extends('admin.layouts.main')

@section('container')

<div class="card">
    <h5 class="card-header">Rekam Medis</h5>
    <div class="card-body">
        <form action ="/rekam-medis/{{ $rekam_medis->id }}" method="post">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Kode Rekam Medis</label>
                <input type="text" class="form-control @error('kode_rekam_medis') is-invalid @enderror" id="kode_rekam_medis" name="kode_rekam_medis" value="{{old('kode_rekam_medis',$rekam_medis->kode_rekam_medis)}}" readonly  autofocus>
                @error('kode_rekam_medis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
        </div>

            <div class="mb-3">
                <label for="jurusan" class="form-label">Kode Pemeriksaan</label>
                <select class="form-select" name="pemeriksaan_id" aria-label="Default select example">
                    <option selected></option>
                    @foreach($pemeriksaans as $pemeriksaan)
                        @if (old('pemeriksaan_id',$rekam_medis->pemeriksaan_id) == $pemeriksaan->id)
                            <option value="{{ $pemeriksaan->id }}" selected>{{ $pemeriksaan->kode_pemeriksaan }}</option>
                        @else
                            <option value="{{ $pemeriksaan->id }}">{{ $pemeriksaan->kode_pemeriksaan }}</option>  
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="dokter_id" class="form-label">Dokter</label>
                        <select class="form-select" name="dokter_id" aria-label="Default select example">
                            <option selected></option>
                            @foreach($dokters as $dokter)
                                @if (old('jurusan_id',$rekam_medis->dokter_id) == $dokter->id)
                                    <option value="{{ $dokter->id }}" selected>{{ $dokter->nama_dokter }}</option>
                                @else
                                    <option value="{{ $dokter->id }}">{{ $dokter->nama_dokter }}</option>  
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Diagnosa</label>
                    <input type="text" class="form-control @error('diagnosa') is-invalid @enderror" id="diagnosa" name="diagnosa" value="{{old('diagnosa',$rekam_medis->diagnosa)}}"  autofocus>
                    @error('diagnosa')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tindakan</label>
                    <input type="text" class="form-control @error('tindakan') is-invalid @enderror" id="tindakan" name="tindakan" value="{{old('tindakan',$rekam_medis->tindakan)}}"  autofocus>
                    @error('tindakan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Rujukan</label>
                    <input type="text" class="form-control @error('rujukan') is-invalid @enderror" id="rujukan" name="rujukan" value="{{old('rujukan',$rekam_medis->rujukan)}}"  autofocus>
                    @error('rujukan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>   
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
        </div>

        </form>
    </div>
</div>


@endsection