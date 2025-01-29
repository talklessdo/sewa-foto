<x-layout>
    @php
        $total = $booking->durasi * $booking->price;
    @endphp
    @if (auth()->user()->role == 'customer')
    
      <section class="content pt-3">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
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
    
                  @if ($booking->status =='pending')
                  
                    <div class="row">
                      <!-- accepted payments column -->
                      <div class="col-6">
                        <p class="lead">Transaksi sementara ini bisa melalui bank yang sudah bekerjasama dengan kami yaitu:</p>
                        <div >
                            <img style="width: 300px; max-width: 100%;" src="{{ asset('admin') }}/img/bank.png" alt="bank">
                        </div>
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
                    <form id="bayarForm" style="display: none;" enctype="multipart/form-data" action="/update_form" method="POST">
                      @csrf
                      <input type="file" name="payment" id="payment" accept="image/*" />
                      <input type="hidden" name="tipe" value="bayar" />
                      <input type="hidden" name="kode" value="{{ $booking->kode_booking }}" />
                    </form>
                    <form id="batalForm" action="/update_form" method="POST">
                      @csrf
                      <input type="hidden" name="tipe" id="tipeHapus" />
                      <input type="hidden" name="kode" value="{{ $booking->kode_booking }}" />
                    </form>
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                      <div class="col-12">
                        <a href="" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                        <button type="button" onclick="bayar()" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Bayar
                        </button>
                        <button type="button" onclick="batal('{{ $booking->kode_booking }}')" class="btn btn-danger float-right" style="margin-right: 5px;">
                          <i class="fas fa-trash"></i> Batalkan
                        </button>
                        <button type="button" class="btn btn-warning float-right" onclick="back()" style="margin-right: 5px;">
                          <i class="fas fa-left"></i> Kembali
                        </button>
                      </div>
                    </div>
                  @else
                    <div class="row">
                      <!-- accepted payments column -->
                      <div class="col-6 d-flex justify-content-center align-items-center">
                        <h1 class="text-warning">Menunggu konfirmasi dari Admin <br> Silahkan Hubungi <strong style="cursor: pointer" onclick="hubungi('{{ $booking->kode_booking }}')">disini</strong></h1>
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
                      
                  @endif


                </div>
                <!-- /.invoice -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </section>
    @else
      <section class="content pt-3">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                  <!-- title row -->
                  {{-- <div class="row">
                    <div class="col-12">
                      <h4>
                        <i class="fas fa-globe"></i> AdminLTE, Inc.
                        <small class="float-right">Date: 2/10/2014</small>
                      </h4>
                    </div>
                    <!-- /.col -->
                  </div> --}}
                  <!-- info row -->
                  {{-- <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                      From
                      <address>
                        <strong>Admin, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (804) 123-5432<br>
                        Email: info@almasaeedstudio.com
                      </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      To
                      <address>
                        <strong>John Doe</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        Phone: (555) 539-1037<br>
                        Email: john.doe@example.com
                      </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      <b>Invoice #007612</b><br>
                      <br>
                      <b>Order ID:</b> 4F3S8J<br>
                      <b>Payment Due:</b> 2/22/2014<br>
                      <b>Account:</b> 968-34567
                    </div>
                    <!-- /.col -->
                  </div> --}}
                  <!-- /.row -->
    
                  <!-- Table row -->
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table class="table table-striped">
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Customer</th>
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
                          <td>{{ $namaUser->name }}</td>
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
    
                  @if ($booking->status =='pending')
                  
                    <div class="row">
                      <!-- accepted payments column -->
                      <div class="col-6">
                        <p class="lead">Transaksi sementara ini bisa melalui bank yang sudah bekerjasama dengan kami yaitu:</p>
                        <div >
                            <img style="width: 300px; max-width: 100%;" src="{{ asset('admin') }}/img/bank.png" alt="bank">
                        </div>
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
                    {{-- <formbayar" style="display: none;" enctype="multipart/form-data" action="/update_form" method="POST">
                      @csrf
                      <input type="file" name="payment" id="payment" accept="image/*" />
                      <input type="hidden" name="tipe" value="bayar" />
                      <input type="hidden" name="kode" value="{{ $booking->kode_booking }}" />
                    </form> --}}
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                      <div class="col-12">
                        
                        <button type="button" class="btn btn-warning float-right" onclick="back()" style="margin-right: 5px;">
                          <i class="fas fa-left"></i> Kembali
                        </button>
                      </div>
                    </div>
                  @else
                    <div class="row">
                      <!-- accepted payments column -->
                      <div class="col-6">
                        <p class="lead">Transaksi sementara ini bisa melalui bank yang sudah bekerjasama dengan kami yaitu:</p>
                        <div class="text-center">
                            <img style="width: 300px; max-width: 100%;" src="{{ asset('admin') }}/img/bank.png" alt="bank">
                        </div>
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
                    <form id="approveForm" style="display: none;" action="/update_form" method="POST">
                      @csrf
                      <input type="hidden" name="tipe" value="approve" />
                      <input type="hidden" name="kode" value="{{ $booking->kode_booking }}" />
                    </form>
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                      <div class="col-12">
                        <button type="button" onclick="approve('{{ asset('admin') }}/img/payment/{{ $booking->payment }}')" class="btn btn-success float-right"><i class="far fa-check-circle"></i> Check
                        </button>
                        <button type="button" class="btn btn-warning float-right" onclick="back()" style="margin-right: 5px;">
                          <i class="fas fa-left"></i> Kembali
                        </button>
                      </div>
                    </div>
                      
                  @endif


                </div>
                <!-- /.invoice -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </section>
        
    @endif
      <script>
        function back(){
          window.location.href = '/pending';
        }

        function batal(data){
          Swal.fire({
            title: "Batalkan pesanan?",
            text: "Pesanan Anda akan dibatalkan oleh sistem",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, batalkan!",
            cancelButtonText: "Tidak!",
          }).then((result) => {
            if (result.isConfirmed) {
              const tipe = document.getElementById('tipeHapus');
              tipe.value = 'hapus';
              document.getElementById('batalForm').submit();
            }
          });
        }

        async function bayar(){
          var nameBank = '';
          var numberBank = '';
          const { value: bank,isConfirmed  } = await Swal.fire({
            title: "Pilih Bank",
            input: "select",
            inputOptions: {
              1: "Bank BRI",
              2: "Bank BCA",
              3: "Bank Mandiri",
            },
            inputPlaceholder: "Pilih bank",
            showCancelButton: true,
          });
            if(isConfirmed && bank){
              if (bank == '1'){
                nameBank = 'Bank BRI';
                numberBank = ': 456789456';
              }else if (bank == '2'){
                nameBank = 'Bank BCA';
                numberBank = ': 7845612358';
              }else {
                nameBank = 'Bank Mandiri';
                numberBank = ': 5525845231';
              }
            
            const { value: buktiPembayaran } = await Swal.fire({
              title: nameBank + numberBank + "<br> (RIS Studio)",
              text: "Silahkan Upload Bukti Pembayaran",
              input: "file",
              inputAttributes: {
                "accept": "image/*",
                "aria-label": "Upload bukti pembayaran"
              }
            });
            if (buktiPembayaran) {
              const reader = new FileReader();
              const form = document.getElementById("bayarForm");
              const payment = document.getElementById("payment");
              reader.onload = (e) => {
                Swal.fire({
                  title: "Apakah sudah benar?",
                  imageUrl: e.target.result,
                  imageAlt: "The uploaded picture",
                  showCancelButton: true,
                  confirmButtonText: "Ya, sudah",
                  cancelButtonText: "Tidak, batalkan"
                }).then((result) => {
                  if (result.isConfirmed) {
                    // Tentukan file yang dipilih dari SweetAlert untuk input file
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(buktiPembayaran); // Tambahkan file ke DataTransfer
                    
                    // Set input file dengan FileList yang baru
                    payment.files = dataTransfer.files;

                    // Pastikan form disubmit setelah input file terupdate
                    form.submit();
                  } else {
                    // Jika gambar salah, batalkan tindakan
                    Swal.fire("Tindakan dibatalkan", "Gambar tidak diupload", "error");
                  }
                });
              };
              reader.readAsDataURL(buktiPembayaran);
            }
            }
          
        }

        function approve(data) {
          Swal.fire({
            title: "Bukti Pembayaran",
            text: "Apakah sudah sesuai?",
            imageUrl: data,
            imageWidth: 500,
            imageAlt: "Custom image",
            showCancelButton: true, // Menampilkan tombol batal
            confirmButtonText: 'Ya, sudah benar', // Teks tombol konfirmasi
            cancelButtonText: 'Tidak, batalkan', // Teks tombol batal
          }).then((result) => {
            if (result.isConfirmed) {
              // Jika tombol konfirmasi ditekan
              Swal.fire('Approved', 'Bukti pembayaran diterima.', 'success').then(() => {
                document.getElementById('approveForm').submit();
              });
              // Di sini Anda bisa menambahkan kode untuk proses approve lainnya
            } else if (result.isDismissed) {
              // Jika tombol batal ditekan
              Swal.fire('Tindakan dibatalkan', 'Bukti pembayaran tidak sesuai.', 'error');
            }
          });
        }

        function hubungi(kode) {
          var phoneNumber = '6285591302225'; // Gantilah dengan nomor WhatsApp yang diinginkan
          var message = 'Halo kak, saya telah melakukan pembayaran dengan kode booking #' + kode + '. Mohon tindak lanjunya ya';
          var url = 'https://wa.me/' + phoneNumber + '?text=' + encodeURIComponent(message);
          
          // Membuka WhatsApp di tab baru
          window.open(url, '_blank');
        }
      </script>
</x-layout>