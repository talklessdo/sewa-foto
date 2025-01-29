<x-layout>
    <div class="container-fluid">
        <h1 class="text-center pt-4">Pilih Paket</h1>
        <div class="row my-4">
          @foreach ($data as $item)
              
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-{{ $item->warna }}">
              <div class="inner">
                <h3>{{ $item->name }}</h3>

                <p>{{ $item->description }}</p>
              </div>
              <div class="icon">
                <i class="ion ion-cube"></i>
              </div>
              <a style="cursor: pointer" data-slug="{{ $item->slug }}" onclick="more(this)" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endforeach
        </div>
        <!-- Gallery -->
        <h1 class="mb-5 text-center">Galeri Foto</h1>
        <div class="w-75 m-auto">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                <img
                    src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water"
                />
            
                <img
                    src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain1.webp"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Wintry Mountain Landscape"
                />
                </div>
            
                <div class="col-lg-6 mb-4 mb-lg-0">
                <img
                    src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain2.webp"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Mountains in the Clouds"
                />
            
                <img
                    src="{{ asset('admin') }}/img/bg.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water"
                />
                </div>
            </div>
        </div>
  <!-- Gallery -->
    </div>
    <script>
      function more(e) {
        var slug = e.getAttribute('data-slug');
        window.location.href = 'detail/' + slug;
      }
    </script>
</x-layout>