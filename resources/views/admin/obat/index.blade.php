@extends('admin.layouts.main')


@section('container')

              <!-- Button trigger modal -->
    <a href="/obat/create" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data Obat</a>

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
                <h5 class="card-title">Obat</h5>
  
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Obat</th>
                            <th scope="col">Jenis Obat</th>
                            <th scope="col">Merek</th>
                            <th scope="col">Masa Berlaku</th>
                            <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($obats as $obat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $obat->nama_obat }}</td>
                        <td>{{ $obat->jenis_obat }}</td>
                        <td>{{ $obat->merek_obat }}</td>
                        <td>{{ $obat->masa_berlaku }}</td>
                        <td>
                            <a href="/obat/{{ $obat->id }}/edit" class="btn btn-warning">Edit</a>
    
                            <form action="/obat/{{ $obat->id }}" method="post" class="d-inline">
                                @method('DELETE')
                            @csrf
                                <button class="btn btn-danger" onclick="return confirm('Yakin Akan Menghapus Data..?')" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
    
                </tbody>
                </table>
                <!-- End Table with stripped rows -->
  
              </div>
            </div>
  
          </div>
        </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Insert Data Obat</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action ="/obat" method="post">
              @csrf
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Obat</label>
                <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" id="nama_obat" name="nama_obat" value="{{old('nama_obat')}}" required autofocus>
                @error('nama_obat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>   

                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Jenis Obat</label>
                  <input type="text" class="form-control @error('jenis_obat') is-invalid @enderror" id="jenis_obat" name="jenis_obat" value="{{old('jenis_obat')}}" required autofocus>
                  @error('jenis_obat')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
                </div>   

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Merek Obat</label>
                <input type="text" class="form-control @error('merek_obat') is-invalid @enderror" id="merek_obat" name="merek_obat" value="{{old('merek_obat')}}" required autofocus>
                @error('merek_obat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>

              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Masa Berlaku</label>
                <input type="date" class="form-control @error('masa_berlaku') is-invalid @enderror" id="masa_berlaku" name="masa_berlaku" value="{{old('masa_berlaku')}}" required autofocus>
                @error('masa_berlaku')
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


      </section>

      {{ $obats->links('pagination::bootstrap-5') }}
  
    
@endsection