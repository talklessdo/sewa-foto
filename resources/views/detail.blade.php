<x-layout>
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Paket</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item active">Detail Paket</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    @foreach ($data as $item)
        <section class="content">

        <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">{{ $item->name }}</h3>
                    <div class="col-12">
                        <img src="{{ asset('admin') }}/img/{{ $item->sample }}" class="product-image" alt="Product Image">
                    </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">{{ $item->name }}</h3>
                        <p>{{ $item->description }}</p>

                        <hr>

                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                            Harga: Rp{{ number_format($item->price,0,',',',') }}
                            </h2>
                            <h4 class="mt-0">
                            <small>/Jam</small>
                            </h4>
                        </div>

                        <div class="mt-4">
                            <div onclick="form(this)" data-slug="{{ $item->slug }}" class="btn btn-primary btn-lg btn-flat">
                                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                Order
                            </div>

                            <div onclick="back()" class="btn btn-default btn-lg btn-flat">
                                <i class="fas fa-arrow-left fa-lg mr-2"></i>
                                    Kembali
                            </div>
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
            function back() {
                window.location.href = '/dashboard';
            }
            function form(e) {
                var slug = e.getAttribute('data-slug');
                // alert(slug);
                window.location.href = '/form/'+slug;
            }
        </script>
        
    <!-- /.content -->
  <!-- /.content-wrapper -->
</x-layout>