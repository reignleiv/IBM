@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Informasi Bahan Makanan</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/dashboard/ibm/{{ $ibm->slug }}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control 
          @error('nama')
              is-invalid
          @enderror" id="nama" name="nama" required autofocus value="{{ old('nama', $ibm->nama) }}">
          @error('nama')
            <div class="invalid-feedback"> {{ $message }} </div>
          @enderror
        </div>  
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control 
            @error('lokasi')
                is-invalid
            @enderror" id="lokasi" name="lokasi" required autofocus value="{{ old('lokasi', $ibm->lokasi) }}">
            @error('lokasi')
              <div class="invalid-feedback"> {{ $message }} </div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly value="{{ old('slug', $ibm->slug) }}">
          @error('slug')
              <div class="invalid-feedback" required> {{ $message }} </div>
          @enderror
        </div>
        <div class="mb-3">
        <label for="satuan" class="form-label">Satuan</label>
        <select class="form-select" id="satuan" name="satuan">
            @if (old('satuan', $ibm->satuan) == $ibm->satuan)
                <option value="{{ $ibm->satuan }}" selected>{{ $ibm->satuan }}</option>
                @if (old('satuan', $ibm->satuan) != "Unit")
                    <option option value="Unit">Unit</option>
                @endif
                @if (old('satuan', $ibm->satuan) != "100 Gram")
                    <option option value="100 Gram">100 Gram</option>
                @endif
                @if (old('satuan', $ibm->satuan) != "100 Gram")
                    <option option value="100 Gram">100 Gram</option>
                @endif
                @if (old('satuan', $ibm->satuan) != "250 Gram")
                    <option option value="250 Gram">250 Gram</option>
                @endif
                @if (old('satuan', $ibm->satuan) != "500 Gram")
                    <option option value="500 Gram">500 Gram</option>
                @endif
                @if (old('satuan', $ibm->satuan) != "1 KG")
                    <option option value="1 KG">1 KG</option>
                @endif
            @endif
          </select>
    </div>
        <div class="mb-3">
          <label for="harga" class="form-label">Harga</label>
          <input type="number" class="form-control 
          @error('harga')
              is-invalid
          @enderror" id="harga" name="harga" required autofocus value="{{ old('harga', $ibm->harga) }}">
          @error('harga')
            <div class="invalid-feedback"> {{ $message }} </div>
          @enderror
        </div>
      </div>            
        <button type="submit" class="btn btn-primary">Ubah IBM</button>
    </form>

</div>

<script>
    var nama = document.querySelector("#nama");
    var lokasi = document.querySelector("#lokasi");
    var TempSlug = "";
    var slug = document.querySelector("#slug");

    nama.addEventListener("keyup", function() {
        let preslug = nama.value;
        preslug = preslug.replace(/ /g,"-");
        slug.value = preslug.toLowerCase();
        TempSlug = slug.value;
    });
    

    lokasi.addEventListener("keyup", function() {
        let preslug = lokasi.value;
        preslug = preslug.replace(/ /g,"-");
        slug.value = TempSlug + '-' + preslug.toLowerCase();
    });

    // Biar bisa upload

    // biar upload image gak jalan
    // document.addEventListener('trix-file-accept', function(e) {
    //    e.preventDefault();
    // })

    function previewImage() {
        const image = document.querySelector("#image");
        const imgPreview = document.querySelector(".img-preview");

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

{{-- Bisa Seperti ini (di video) --}}
{{-- <script>
    const title = document.querySelector('title');
    const slugs = document.querySelector('slug');

    title.addEventListener('change', function(){
      fetch('/dasboard/posts/checkSlug?title='+title.value+'')
      .then(response => response.json())
      .then(data => slugs.value = data.slug)
      console.log(data.slug);
    })
</script> --}}

@endsection