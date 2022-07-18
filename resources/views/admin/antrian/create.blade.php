@extends('admin.layouts.main')

@section('container')
<div class="card">
    <h5 class="card-header">Antrian</h5>
    <div class="card-body">
    <form action ="/antrian" method="post">
        @csrf
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nomor Antrian</label>
        <input type="text" class="form-control @error('no_antrian') is-invalid @enderror" id="no_antrian" name="no_antrian" value="{{old('no_antrian','AN-'.$kd)}}" readonly >
        @error('no_antrian')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>   

        <div class="mb-3">
            <label for="jurusan" class="form-label">Pasien</label>
            <select class="form-select" name="pasien_id" aria-label="Default select example">
                <option selected>Pasien</option>
                @foreach($pasiens as $pasien)
                    @if (old('jurusan_id') == $pasien->id)
                        <option value="{{ $pasien->id }}" selected>{{ $pasien->nama_pasien }}</option>
                    @else
                        <option value="{{ $pasien->id }}">{{ $pasien->nama_pasien }}</option>  
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tanggal CheckUp</label>
            <input type="date" class="form-control @error('tanggal_checkup') is-invalid @enderror" id="tanggal_checkup" name="tanggal_checkup" value="{{old('tanggal_checkup')}}" required autofocus>
            @error('tanggal_checkup')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status_antrian" class="form-label">Status antrian</label>
            <select class="form-select" name="status_antrian" aria-label="Default select example">
                <option selected>Status</option>
                <option value="menunggu">Menunggu</option>
                <option value="diperiksa">Selesai Di Periksa</option>
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