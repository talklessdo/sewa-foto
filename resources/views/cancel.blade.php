<x-layout>
  @php
      $no = 1;
  @endphp
    <div class="content pt-3">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Booking</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr class="text-center">
                    <th style="width: 5%">#</th>
                    <th style="width: 30%">Nama Paket</th>
                    <th style="width: 10%">Status</th>
                    <th style="width: 20%">Tanggal</th>
                    <th style="width: 15%">Durasi</th>
                    <th style="width: 15%">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                    <tr>
                      <td class="text-center">{{ $no++ }}</td>
                      <td>{{ $booking->name }}</td>
                      <td class="text-center"><span class="badge bg-danger">{{ $booking->status }}</span></td>
                      <td class="text-center">
                        {{ $booking->booking_date }}
                      </td>
                      <td class="text-center">{{ $booking->durasi }} Jam</td>
                      <td>
                          <div class="text-center">
                              <button type="button" data-kode="{{ $booking->kode_booking }}" onclick="detail(this)" class="btn btn-warning"><i class="fa fa-eye"></i> Lihat</button>
                              {{-- <button type="button" data-kode="{{ $booking->kode_booking }}" onclick="hapus(this)" class="btn btn-danger"><i class="fa fa-trash"></i> Batalkan</button> --}}
                          </div>
                      </td>
                    </tr>
                        <form action="/update_form" id="formId" method="post">
                          @csrf
                          <input type="hidden" name="tipe" id="tipe">
                          <input type="hidden" name="kode" value="{{ $booking->kode_booking }}">
                        </form>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="/dashboard" class="float-right">Kembali</a>
          </div>
    </div>
    <script>
        function detail(e){
            var kode_booking = e.getAttribute('data-kode');
            document.location.href = '/detail_cancel/' + kode_booking;
        }
    </script>
      <!-- /.card -->
</x-layout>