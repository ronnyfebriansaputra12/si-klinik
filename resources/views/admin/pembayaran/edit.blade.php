@extends('admin.layouts.main')

@section('container')

<div class="card">
    <h5 class="card-header">Pembayaran</h5>
    <div class="card-body">
        <form action ="/pembayaran/{{ $pembayarans->id }}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Kode Pembayaran</label>
                <input type="text" class="form-control @error('kode_pembayaran') is-invalid @enderror" id="kode_pembayaran" name="kode_pembayaran" value="{{old('kode_pembayaran',$pembayarans->kode_pembayaran)}}" readonly >
                @error('kode_pembayaran')
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
                        @if (old('pemeriksaan_id',$pembayarans->pemeriksaan_id) == $pemeriksaan->id)
                            <option value="{{ $pemeriksaan->id }}" selected>{{ $pemeriksaan->kode_pemeriksaan }}</option>
                        @else
                            <option value="{{ $pemeriksaan->id }}">{{ $pemeriksaan->kode_pemeriksaan }}</option>  
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Pasien</label>
                <select class="form-select" name="pasien_id" aria-label="Default select example">
                    <option selected></option>
                    @foreach($pasiens as $pasien)
                        @if (old('pasien_id',$pembayarans->pasien_id) == $pasien->id)
                            <option value="{{ $pasien->id }}" selected>{{ $pasien->nama_pasien }}</option>
                        @else
                            <option value="{{ $pasien->id }}">{{ $pasien->nama_pasien }}</option>  
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Pembayaran</label>
                        <input type="date" class="form-control @error('tanggal_bayar') is-invalid @enderror" id="tanggal_bayar" name="tanggal_bayar" value="{{old('tanggal_bayar',$pembayarans->tanggal_bayar)}}" autofocus>
                        @error('tanggal_bayar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Total Pembayaran</label>
                    <input type="text" class="form-control @error('total_bayar') is-invalid @enderror" id="total_bayar" name="total_bayar" value="{{old('tanggal_bayar',$pembayarans->total_bayar)}}" required autofocus>
                    @error('total_bayar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
            
        <div class="mb-3">
            <label for="status_bayar" class="form-label">Status antrian</label>
            <select class="form-select" name="status_bayar" aria-label="Default select example">
                <option selected></option>
                <option value="pending" 
                @if ($pembayarans['status_bayar']=="pending")
                    {{ 'selected' }}
                @endif>Pending</option>
                <option value="lunas" @if ($pembayarans['status_bayar']=="lunas"){{ 'selected' }}@endif>Lunas </option>
                    
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