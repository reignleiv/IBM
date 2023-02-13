@extends('dashboard.layouts.main');


@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Post</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/diskusi" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text"
                    class="form-control
          @error('title')
              is-invalid
          @enderror"
                    id="title" name="title" required autofocus value="{{ old('title') }}">
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
                    readonly value="{{ old('slug') }}">
                @error('slug')
                    <div class="invalid-feedback" required> {{ $message }} </div>
                @enderror
<<<<<<< HEAD
            </div>            
            {{-- <div class="mb-3">
                <label for="image" class="form-label">Input Gambar</label>
                <img class="img-fluid mb-3 col-sm-5">
                <input class="form-control @error('slug') is-invalid @enderror" type="file" id="image" name="image"">
            </div> --}}
=======
            </div>
            {{-- <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                {{-- <select class="form-select" id="category_id" name="category_id">
                @foreach ($categories as $category)
                @if (old('category_id') == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                    <option value={{ $category->id }}>{{ $category->name }}</option>
                @endif
            @endforeach
              </select> --}}
            {{-- </div> --}}
            <div class="mb-3">
                <label for="image" class="form-label">Default file input example</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
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
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
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

        // upload image di trix editor
        (function() {
            var HOST = "http://127.0.0.1:8000/dashboard/posts"

            addEventListener("trix-attachment-add", function(event) {
                if (event.attachment.file) {
                    uploadFileAttachment(event.attachment);
                }
            })

            function uploadFileAttachment(attachment) {
                uploadFile(attachment.file, setProgress, setAttributes)

                function setProgress(progress) {
                    attachment.setUploadProgress(progress)
                }

                function setAttributes(attributes) {
                    attachment.setAttributes(attributes)
                }
            }

            function uploadFile(file, progressCallback, successCallback) {
                var key = createStorageKey(file)
                var formData = createFormData(key, file)
                var xhr = new XMLHttpRequest()

                xhr.open("POST", HOST, true)

                xhr.upload.addEventListener("progress", function(event) {
                    var progress = event.loaded / event.total * 100
                    progressCallback(progress)
                })

                xhr.addEventListener("load", function(event) {
                    if (xhr.status == 204) {
                        var attributes = {
                            url: HOST + key,
                            href: HOST + key + "?content-disposition=attachment"
                        }
                        successCallback(attributes)
                    }
                })
                xhr.send(formData)
            }

            function createStorageKey(file) {
                var date = new Date()
                var day = date.toISOString().slice(0, 10)
                var name = date.getTime() + "-" + file.name
                return ["tmp", day, name].join("/")
            }

            function createFormData(key, file) {
                var data = new FormData()
                data.append("key", key)
                data.append("Content-Type", file.type)
                data.append("file", file)
                return data
            }
        })();
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
