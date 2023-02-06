@extends('layouts.main')

@section('container')

    @if (session()->has('success'))
      <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
      </div>
    @endif
    @if (auth()->user()->is_admin)
      <div class="table-responsive col-lg-8">
        <a href="/dashboard/ibm/create" class="btn btn-primary mb-3">Buat IBM Baru</a>
      </div>
    @endif
    <form action="">
    <div class="row container">
      <div class="col-12 col-lg-4">
        <div class="form-group">
          <label for="provinsi">Provinsi</label>
          <select class="form-control" id="provinsi">
            <option value="">Pilih Provinsi</option>
          </select>
        </div>
      </div>
      <!-- kota -->
      <div class="col-12 col-lg-4">
        <div class="form-group">
          <label for="kota">Kota</label>
          <select class="form-control" id="kota" name="lokasi">
            <option value="">Pilih Kota</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-lg-4">
        <br>
        <button class="btn btn-outline-success" type="submit">
            Search
          </button>
      </div>
    </div>

      <div class="container">
        <div class="row">
            @foreach ( $ibms as $ibm )         
            <div class="col-md-2 p-2">
                <div class="card">
                        {{-- <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top mt-3" alt="{{ $post->category->name }}">                 --}}
                        <img src="{{ asset('storage/'. str_replace(' ', '_', strtolower($ibm->nama)) . '.jpg') }}" class="card-img-top" alt="{{ $ibm->nama }}">    
                    <div class="card-body">
                      <h6 class="card-text">{{ $ibm->nama }}</h6>
                      <h6 class="card-text">{{ $ibm->lokasi }}</h6>
                      <h6 class="card-text">{{ $ibm->satuan }}</h6>
                      <h6 class="card-text">{{ $ibm->harga }}</h6>
                      @if (auth()->user()->is_admin)
                      <a class="badge bg-warning" href="/dashboard/ibm/{{ $ibm->slug }}/edit"><i class="bi bi-pencil-square"></i>
                      </a>
                        <form action="/dashboard/ibm/{{ $ibm->slug }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                        </form>
                      @endif                     
                    </div>
                  </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- @else
      <p class="text-center fs-4">No Post found.</p>
    @endif --}}

    {{-- <div class="d-flex justify-content-center">
      {{ $ibms->links() }}
    </div> --}}

    <script>
        $(document).ready(function () {
          // ambil data provinsi
          $.ajax({
            url: "https://dev.farizdotid.com/api/daerahindonesia/provinsi",
            type: "GET",
            dataType: "json",
            success: function (data) {
              // console.log(data);
              var provinsi = data.provinsi;
              $.each(provinsi, function (i, data) {
                $("#provinsi").append(
                  "<option value='" + data.id + "'>" + data.nama + "</option>"
                );
              });
            },
          });
  
          // ambil data kota
          $("#provinsi").change(function () {
            var id_provinsi = $("#provinsi").val();
            $("#kota").html("<option value=''>Pilih Kota</option>"); 
            $.ajax({
              url:
                "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" +
                id_provinsi,
              type: "GET",
              dataType: "json",
              success: function (data) {
                // console.log(data);
                var kota = data.kota_kabupaten;
                $.each(kota, function (i, data) {
                  $("#kota").append(
                    "<option value='" + data.nama + "'>" + data.nama + "</option>"
                  );
                });
              },
            });
          });
        });
      </script>
@endsection

 {{-- @foreach ($posts->skip(1) as $post)
    <article class="mb-5 border-bottom pb-4">
        <a href="/posts/{{ $post->slug }}" class="text-decoration-none"> <h2>{{ $post->title }}</h2> </a>
        <p>By. <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>  in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
        <p>{{ $post->excerpt }}</p>


        <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read more..</a>
    </article>      
    @endforeach --}}
    


