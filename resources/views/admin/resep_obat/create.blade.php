@extends('admin.layouts.main')

@section('container')

<div class="card">
    <h5 class="card-header">Rekam Medis</h5>
    <div class="card-body">
        <form action ="/resep-obat" method="post">
            @csrf

            <div class="mb-3">
                <label for="rekam_medis_id" class="form-label">Kode Rekam Medis</label>
                <select class="form-select" name="rekam_medis_id" aria-label="Default select example">
                    <option selected></option>
                    @foreach($rekam_medis as $rm)
                        @if (old('jurusan_id') == $rm->id)
                            <option value="{{ $rm->id }}" selected>{{ $rm->kode_rekam_medis }}</option>
                        @else
                            <option value="{{ $rm->id }}">{{ $rm->kode_rekam_medis }}</option>  
                        @endif
                    @endforeach
                </select>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="dokter_id" class="form-label">Obat</label>
                        <select class="form-select" name="obat_id" aria-label="Default select example">
                            <option selected></option>
                            @foreach($obats as $obat)
                                @if (old('jurusan_id') == $obat->id)
                                    <option value="{{ $obat->id }}" selected>{{ $obat->nama_obat }}</option>
                                @else
                                    <option value="{{ $obat->id }}">{{ $obat->nama_obat }}</option>  
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jumlah Obat</label>
                    <input type="number" class="form-control @error('jumlah_obat') is-invalid @enderror" id="jumlah_obat" name="jumlah_obat" value="{{old('jumlah_obat')}}"  autofocus>
                    @error('jumlah_obat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{old('keterangan')}}"  autofocus>
            @error('keterangan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>   

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
        </div>

        </form>
    </div>
</div>


@endsection