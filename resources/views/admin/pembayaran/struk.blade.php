<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-5 md-4">
                <div class="card">
                    <h5 class="card-header text-center">Struk Pembayaran Klinik-KU</h5>
                    <div class="card-body">
                        {{-- <h5 class="text-center">Kode Pembayaran : {{ $pembayaran->kode_pembayaran }}</h5>
                        <h5 class="text-center">Kode Pemeriksaan : {{ $pembayaran->pemeriksaan->kode_pemeriksaan }}</h5>
                        <h5 class="text-center">Nama Pasien : {{ $pembayaran->pasien->nama_pasien }}</h5>
                        <h5 class="text-center">Tanggal Bayar : {{ $pembayaran->tanggal_bayar }}</h5>
                        <h5 class="text-center">Total Bayar : {{ $pembayaran->total_bayar }}</h5>
                        <h5 class="text-center">Status Bayar : {{ $pembayaran->status_bayar }}</h5> --}}
                        <table>
                        <tr>
                            <td>Kode Pembayaran</td>
                            <td> : </td>
                            <td> {{ $pembayaran->kode_pembayaran }}</td>
                        </tr>

                        <tr>
                            <td>Kode Pemeriksaan</td>
                            <td>:</td>
                            <td>{{ $pembayaran->pemeriksaan->kode_pemeriksaan }}</td>
                        </tr>

                        <tr>
                            <td>Nama Pasien</td>
                            <td>:</td>
                            <td>{{ $pembayaran->pasien->nama_pasien }}</td>
                        </tr>

                        <tr>
                            <td>Tanggal Pembayaran</td>
                            <td>:</td>
                            <td>{{ $pembayaran->tanggal_bayar }}</td>
                        </tr>

                        <tr>
                            <td>Total Pembayaran</td>
                            <td>:</td>
                            <td>{{ $pembayaran->total_bayar }}</td>
                        </tr>

                        <tr>
                            <td>Status Pembayaran</td>
                            <td>:</td>
                            <td>{{ $pembayaran->status_bayar }}</td>
                        </tr>

                    </table>
                    </div>
            </div>
        </div>
    </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

          <script>
        window.print();
      </script>
  </body>
</html>