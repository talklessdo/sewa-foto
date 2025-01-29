<x-layout>
    @foreach ($data as $item)
        
    <section class="content pt-3">

        <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none"></h3>
                    <div class="col-12">
                        <img src="{{ asset('admin') }}/img/{{ $item->sample }}" class="product-image" alt="Product Image">
                    </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Formulir</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="/booking" id="formBooking" onsubmit="order()">
                                @csrf
                                <input type="hidden" name="csId" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="paketId" value="{{ $item->id }}">
                              <div class="card-body">
                                <div class="form-group">
                                    <label class="col-form-label" for="tanggal">Tanggal dan Waktu</label>
                                    <input type="date" name="tgl" class="form-control" id="tanggal"  required>
                                    <div class="invalid-feedback" role="alert">Tanggal Tidak Boleh Kosong</div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="errorFotografer">Pilih Fotografer</label>
                                    <select name="fotogr" class="custom-select mr-sm-2" id="inlineFormCustomSelect" required>
                                        <option value="" selected>Fotografer</option>
                                        @foreach ($fotografer as $fotos)
                                            <option value="{{ $fotos->id }}">{{ $fotos->name }}</option>
                                        @endforeach
                                      </select>
                                      @if(session()->has('errorF'))
                                      <div class="text-danger">{{ session('errorF') }}</div>
                                      @endif
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="errorFotografer">Pilih Editor</label>
                                    <select class="custom-select mr-sm-2" name="editor" id="inlineFormCustomSelect" required>
                                        <option value="" selected>Editor</option>
                                        @foreach ($editor as $edit)
                                            <option value="{{ $edit->id }}">{{ $edit->name }}</option>
                                        @endforeach
                                      </select>
                                      @if(session()->has('errorE'))
                                      <div class="text-danger">{{ session('errorE') }}</div>
                                      @endif
                                </div>
                                <div class="form-group">
                                    <label for="validationDurasi">Durasi</label>
                                    <div class="input-group">
                                        <input type="number" name="duration" value="1" min="1" max="5" class="form-control" id="validationDurasi" aria-describedby="inputGroupAppend" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="inputGroupAppend">Jam</span>
                                        </div>
                                        <div class="invalid-feedback">
                                            Durasi tidak boleh Kosong.
                                        </div>
                                    </div>
                                </div>
                              </div>
                              <!-- /.card-body -->
                
                              <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a onclick="back('{{ $item->slug }}')" class="btn btn-warning float-right">Kembali</a>
                              </div>
                            </form>
                          </div>
                    </div>
                </div>
                </div>
                <!-- /.card-body -->
            </div>
        <!-- /.card -->

    </section>
    @endforeach
    <script>
        const today = new Date().toISOString().split('T')[0];
    
        // Menetapkan nilai min pada input date
        document.getElementById('tanggal').setAttribute('min', today);
        function back(data){
            window.location.href = '/detail/'+data;
        }
        // function order(){
        //     Swal.fire({
        //         title: "Apakah sudah yakin?",
        //         text: "Pesanan Anda akan masuk ke daftar booking",
        //         icon: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: "#3085d6",
        //         cancelButtonColor: "#d33",
        //         confirmButtonText: "Ya, sudah!"
        //         }).then((result) => {
        //         if (result.isConfirmed) {
        //             document.getElementById('formBooking').submit();
        //         }
        //     });
        // }
    </script>
</x-layout>