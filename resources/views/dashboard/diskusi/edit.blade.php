@extends('dashboard.layouts.main');


@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
    </div>

    <div class="col-lg-8">
<<<<<<< HEAD
        <form method="POST" action="/dashboard/diskusi/{{ $diskusis->slug }}" class="mb-5" enctype="multipart/form-data">
=======
        <form method="POST" action="/dashboard/diskusi/{{ $diskusis->id }}" class="mb-5" enctype="multipart/form-data">
>>>>>>> 30ca5c1867dabcbc70a25fd665e9543580191794
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text"
                    class="form-control
          @error('title')
              is-invalid
          @enderror"
                    id="title" name="title" required autofocus value="{{ old('title', $diskusis->title) }}">
                @error('title')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
            <div class="mb-3">
<<<<<<< HEAD
                <label for="lokasi" class="form-label">Lokasi</label>
                <label for="provinsi">Provinsi</label>
                <select class="form-control" id="provinsi">
                  <option value="">Pilih Provinsi</option>
                </select>
                <label for="kota">Kota</label>
              <select class="form-control" id="kota" name="lokasi">
                <option value="">Pilih Kota</option>
              </select>
                @error('lokasi')
                  <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
            <div class="mb-3">
=======
>>>>>>> 30ca5c1867dabcbc70a25fd665e9543580191794
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    readonly value="{{ old('slug', $diskusis->slug) }}">
                @error('slug')
                    <div class="invalid-feedback" required> {{ $message }} </div>
                @enderror
            </div>
<<<<<<< HEAD
=======
            {{-- <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" id="category_id" name="category_id">
                    @foreach ($categories as $category)
                        @if (old('category_id', $category->id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value={{ $category->id }}>{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div> --}}
            <div class="mb-3">
                <label for="image" class="form-label">Default file input example</label>
                <input type="hidden" name="oldImage" value="{{ $diskusis->image }}">
                @if ($diskusis->image)
                    <img src="{{ asset('storage/' . $diskusis->image) }}"
                        class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input class="form-control @error('slug') is-invalid @enderror" type="file" id="image" name="image"
                    onchange="previewImage()">
                @error('slug')
                    <div class="invalid-feedback" required> {{ $message }} </div>
                @enderror
            </div>
>>>>>>> 30ca5c1867dabcbc70a25fd665e9543580191794
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body', $diskusis->body) }}">
                <trix-editor input="body"></trix-editor>
            </div>

            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>
<<<<<<< HEAD

    <script>
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");

        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });

        // biar upload image gak jalan
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        // agar bisa preview image
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
  
      // ambil data kecamatan
      $("#kota").change(function () {
            const selectedKota = $('#kota').val();
            var slug = document.querySelector("#slug");
            var TempSlug = slug.value;
            let preslug = selectedKota;
            preslug = preslug.replace(/ /g,"-");
            slug.value = TempSlug + '-' + preslug.toLowerCase();
          });
    });
  </script>


<script>
    document.addEventListener('DOMContentLoaded', ()=> {
  let contentEl = document.querySelector('[name="content"]');
  let editorEl = document.querySelector('trix-editor');
  
  document.querySelector('input[type=file]').addEventListener('change', ({ target })=> {
    let reader = new FileReader();
    reader.addEventListener('load', ()=> {
      let image = document.createElement('img');
      image.src = reader.result;
      let tmp = document.createElement('div');
      tmp.appendChild(image);
      editorEl.editor.insertHTML(tmp.innerHTML);
      target.value = '';
    }, false);
    reader.readAsDataURL(target.files[0]);
  });
  
  document.querySelector('[role="dump"]').addEventListener('click', ()=> {
    document.querySelector('textarea').value = contentEl.value;
  });

});
</script>

=======

    <script>
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");

        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });

        // biar upload image gak jalan
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        // agar bisa preview image
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
>>>>>>> 30ca5c1867dabcbc70a25fd665e9543580191794
@endsection
