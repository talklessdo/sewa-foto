<x-layout>
    @php
        $total = $booking->durasi * $booking->price;
    @endphp
    <section class="content pt-3">
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
                  <!-- accepted payments column -->
                  <div class="col-6 d-flex justify-content-center align-items-center">
                    <h1 class="text-success">Transaksi telah di Approve oleh Admin. <br> Silahkan Simpan Invoicenya <strong style="cursor: pointer" onclick="print('{{ $booking->kode_booking }}')">disini</strong></h1>
                  </div>
                  <!-- /.col -->
                  <div class="col-6">
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
                    <button type="button" class="btn btn-warning float-right" onclick="back()" style="margin-right: 5px;">
                      <i class="fas fa-left"></i> Kembali
                    </button>
                  </div>
                </div>
              </div>
              <!-- /.invoice -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <script>
        function back(){
          window.location.href = '/approve';
        }

        function print(data){
          window.location.href = '/cetak_pdf/' + data;
        }

      </script>
</x-layout>