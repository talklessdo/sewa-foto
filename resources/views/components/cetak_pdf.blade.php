
    @php
        $total = $booking->durasi * $booking->price;
    @endphp

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak invoice</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin') }}/dist/css/adminlte.min.css">
  </head>
  <body>
    <section id="content-to-save" class="content pt-3">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Main content -->
              <div class="invoice p-3 mb-3">
                <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> RIS Studio
                    {{-- <small class="float-right">Date: 2/10/2014</small> --}}
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>RIS Studio</strong><br>
                    Jl. Kedoya No.14<br>
                    Jakarta Barat 17433<br>
                    Phone: (804) 123-5432<br>
                    Email: ris-studio@gmail.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{ auth()->user()->name }}</strong><br>
                    Alamat: {{ auth()->user()->alamat }}<br>
                    Phone: {{ auth()->user()->phone }}<br>
                    Email: {{ auth()->user()->email }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b> Kode Booking #{{ $booking->kode_booking }}</b><br>
                  <br>
                  <b>Tanggal:</b> {{ $booking->booking_date }}<br>
                  <b>Status:</b> <span class="text-success">Approve</span><br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
                <!-- Table row -->
                <div class="row">
                  <div class="col-12 table-responsive">
                    <table class="table table-striped">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>Paket</th>
                        <th>Fotografer</th>
                        <th>Editor</th>
                        <th>Tanggal</th>
                        <th>Durasi</th>
                        <th>Harga</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>1</td>
                        <td>{{ $paket->name }}</td>
                        <td>{{ $nameFotografers->name }}</td>
                        <td>{{ $nameEditors->name }}</td>
                        <td>{{ $booking->booking_date }}</td>
                        <td>{{ $booking->durasi }} Jam</td>
                        <td>Rp {{ number_format($booking->price,0,'.',',') }}</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
  
                <div class="row">
                  <!-- /.col -->
                  <div class="col-12">
                    <p class="lead">Rincian</p>
  
                    <div class="table-responsive">
                      <table class="table">
                        <tr>
                          <th style="width:50%">Harga Paket:</th>
                          <td>Rp {{ number_format($booking->price,0,'.',',') }}</td>
                        </tr>
                        <tr>
                          <th>Durasi</th>
                          <td>{{ $booking->durasi }} Jam</td>
                        </tr>
                        <tr>
                          <th>Total:</th>
                          <td>Rp {{ number_format($total,0,'.',',') }}</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
  
                <!-- this row will not appear when printing -->
                <div class="row no-print">
                  <div class="col-12">
                    {{-- <button type="button" class="btn btn-warning float-right" onclick="back()" style="margin-right: 5px;">
                      <i class="fas fa-left"></i> Kembali
                    </button> --}}
                  </div>
                </div>
              </div>
              <!-- /.invoice -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          <div class="row ">
            <div class="col-12">
              <h3 class="text-danger text-center">--{ Silahkan tunjukkan transaksi ini kepada Admin }--</h3>
            </div>
          </div>
        </div><!-- /.container-fluid -->
    </section>
    
  </body>
  <!-- jQuery -->
      <script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- jsPDF library -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

      <!-- html2pdf.js library -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

      <script>
        window.onload = function() {
        Mendapatkan elemen yang ingin disimpan sebagai PDF
        var element = document.getElementById('content-to-save');

        // Mengonversi elemen HTML menjadi PDF
            html2pdf()
                .from(element)               // Elemen yang akan dikonversi
                .save('invoice.pdf') // Nama file PDF yang dihasilkan
                .then(()=>{
                  window.history.back();
                });
        };
    </script>    
  </html>

    
