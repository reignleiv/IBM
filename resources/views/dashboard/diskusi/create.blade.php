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
                <label for="lokasi" class="form-label">Lokasi</label>
                <label for="provinsi">Provinsi</label>
                <select class="form-control" id="provinsi">
                    <option value="">Pilih Provinsi</option>
                </select>
                <label for="kota">Kota</label>
                <select class="form-control" id="kota" name="lokasi">
                    <option value="">Pilih Kota</option>
                </select>
                <label for="kota">Kecamatan</label>
                <select class="form-control" id="kecamatan" name="lokasi">
                    <option value="">Pilih Kecamatan</option>
                </select>
                <label for="kota">Desa</label>
                <select class="form-control" id="desa" name="lokasi">
                    <option value="">Pilih Desa</option>
                </select>
                @error('lokasi')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    readonly value="{{ old('slug') }}">
                @error('slug')
                    <div class="invalid-feedback" required> {{ $message }} </div>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="image" class="form-label">Input Gambar</label>
                <img class="img-fluid mb-3 col-sm-5">
                <input class="form-control @error('slug') is-invalid @enderror" type="file" id="image" name="image"">
            </div> --}}
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
        $(document).ready(function() {
            // ambil data provinsi
            $.ajax({
                url: "https://dev.farizdotid.com/api/daerahindonesia/provinsi",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    var provinsi = data.provinsi;
                    $.each(provinsi, function(i, data) {
                        $("#provinsi").append(
                            "<option value='" + data.id + "'>" + data.nama + "</option>"
                        );
                    });
                },
            });

            // ambil data kota
            $("#provinsi").change(function() {
                var id_provinsi = $("#provinsi").val();
                $("#kota").html("<option value=''>Pilih Kota</option>");
                $.ajax({
                    url: "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=" +
                        id_provinsi,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        // console.log(data);
                        var kota = data.kota_kabupaten;
                        $.each(kota, function(i, data) {
                            $("#kota").append(
                                "<option value='" + data.nama + "'>" + data.nama +
                                "</option>"
                            );
                        });
                    },
                });
            });

            //ambil data kecamatan
            var id_kota = $("#kota").val();
            $("#kecamatan").html("<option value=''>Pilih kecamatan</option>");
            $.ajax({
                url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=" +
                    id_kota,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    // console.log(data);
                    var kecamatan = data.kecamatan_desa;
                    $.each(kecamatan, function(i, data) {
                        $("#kecamatan").append(
                            "<option value='" + data.nama + "'>" + data.nama + "</option>"
                        );
                    });
                },
            });


            $("#kota").change(function() {
                const selectedKota = $('#kota').val();
                var slug = document.querySelector("#slug");
                var TempSlug = slug.value;
                let preslug = selectedKota;
                preslug = preslug.replace(/ /g, "-");
                slug.value = TempSlug + '-' + preslug.toLowerCase();
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let contentEl = document.querySelector('[name="content"]');
            let editorEl = document.querySelector('trix-editor');

            document.querySelector('input[type=file]').addEventListener('change', ({
                target
            }) => {
                let reader = new FileReader();
                reader.addEventListener('load', () => {
                    let image = document.createElement('img');
                    image.src = reader.result;
                    let tmp = document.createElement('div');
                    tmp.appendChild(image);
                    editorEl.editor.insertHTML(tmp.innerHTML);
                    target.value = '';
                }, false);
                reader.readAsDataURL(target.files[0]);
            });

            document.querySelector('[role="dump"]').addEventListener('click', () => {
                document.querySelector('textarea').value = contentEl.value;
            });

        });
    </script>
@endsection
