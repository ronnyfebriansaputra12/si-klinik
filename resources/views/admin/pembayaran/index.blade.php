@extends('admin.layouts.main')


@section('container')

              <!-- Button trigger modal -->
    <a href="/pembayaran/create" type="button" class="btn btn-primary">Pembayaran</a>

    @if (session()->has('pesan_tambah'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert"">
            Data Berhasil di Tambah
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session()->has('pesan_edit'))
        <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert"">
            Data Berhasil di Edit
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session()->has('pesan_hapus'))
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert"">
            Data Berhasil di Hapus
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <section class="section mt-3">
        <div class="row">
          <div class="col-lg-12">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Pemeriksan</h5>
  
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Pembayaran</th>
                            <th scope="col">Kode Pemeriksaan</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Tanggal Bayar</th>
                            <th scope="col">Total Bayar</th>
                            <th scope="col">Status Bayar</th>
                            <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembayarans as $pembayaran)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pembayaran->kode_pembayaran}}</td>
                        <td>{{ $pembayaran->pemeriksaan->kode_pemeriksaan }}</td>
                        <td>{{ $pembayaran->pasien->nama_pasien }}</td>
                        <td>{{ $pembayaran->tanggal_bayar}}</td>
                        <td>{{ $pembayaran->total_bayar}}</td>
                        <td>
                          @if ($pembayaran->status_bayar == "pending")
                              <a href="/pembayaran/{{ $pembayaran->id }}/lunas" onclick="return confirm('Yakin Akan Mengubah Status Antrian..?')" class="btn btn-dark btn-sm">Pending</a>
                          @elseif($pembayaran->status_bayar == "lunas")
                              <button class="btn btn-success btn-sm">Lunas</button>
                          @endif
                        </td>
                        <td>
                            <a href="/pembayaran/{{ $pembayaran->id }}/edit" class="btn btn-warning mb-1">Edit</a>
                            <form action="/pembayaran/{{ $pembayaran->id }}" method="post" class="d-inline mb-1">
                                @method('DELETE')
                            @csrf
                                <button class="btn btn-danger" onclick="return confirm('Yakin Akan Menghapus Data..?')" type="submit">Delete</button>
                            </form>
                            <form action="/print/{{ $pembayaran->id }}/" method="post" class="d-inline">
                          @csrf
                          <a href="/print/{{ $pembayaran->id }}/"><button class="btn btn-success" target="_blank" >Print</button></a>
                          </form>
                        </td>
                    </tr>
                @endforeach
    
                </tbody>

                </table>
              </div>
            </div>
  
          </div>
        </div>



    {{-- <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Insert Data Pasien</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action ="/pembayaran" method="post">
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">NIK</label>
                <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{old('nik')}}"  autofocus>
                @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>   

                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Nama</label>
                  <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror" id="nama_pasien" name="nama_pasien" value="{{old('nama_pasien')}}"  autofocus>
                  @error('nama_pasien')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>   

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Umur</label>
                <input type="text" class="form-control @error('umur_pasien') is-invalid @enderror" id="umur_pasien" name="umur_pasien" value="{{old('umur_pasien')}}"  autofocus>
                @error('umur_pasien')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{old('alamat')}}"  autofocus>
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
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="L" {{ old('jenis_kelamin')=='L' ? 'checked' : ''}} checked>Laki-laki
                    </div>
                    <div class="form-check me-3">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="P" @checked(old('jenis_kelamin')=='P')>Perempuan
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
              <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
            </div>

            </form>
          </div>
        </div>
      </div>
    </div>
 --}}

      </section>

      {{ $pembayarans  ->links('pagination::bootstrap-5') }}

      {{-- <script>
        window.print();
      </script> --}}
  
    
@endsection