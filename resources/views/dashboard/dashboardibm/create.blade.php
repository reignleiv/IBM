@extends('dashboard.layouts.main')


@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Informasi Bahan Makanan</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/ibm" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text"
                    class="form-control
          @error('nama')
              is-invalid
          @enderror"
                    id="nama" name="nama" required autofocus value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="provinsi">Provinsi</label>
                <select class="form-control" id="provinsi" disabled>
                    <option value="">Jawa Barat</option>
                </select>
                <label for="kota">Kabupaten atau Kota</label>
                <select class="form-control" id="kota" name="lokasi" disabled>
                    <option value="">Bandung Kota</option>
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
            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <select class="form-select" id="satuan" name="satuan">
                    <option option value="Unit">Unit</option>
                    <option option value="1 Ikat">1 Ikat</option>
                    <option option value="100 Gram">100 Gram</option>
                    <option option value="250 Gram">250 Gram</option>
                    <option option value="500 Gram">500 Gram</option>
                    <option option value="1 KG">1 KG</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number"
                    class="form-control
          @error('harga')
              is-invalid
          @enderror"
                    id="harga" name="harga" required autofocus value="{{ old('harga') }}">
                @error('harga')
                    <div class="invalid-feedback"> {{ $message }} </div>
                @enderror
            </div>
    </div>
    <button type="submit" class="btn btn-primary">Tambah IBM</button>
    </form>

    </div>

    <script>
        var nama = document.querySelector("#nama");
        var lokasi = document.querySelector("#lokasi");
        var TempSlug = "";
        var slug = document.querySelector("#slug");

        nama.addEventListener("keyup", function() {
            let preslug = nama.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
            TempSlug = slug.value;
        });
    </script>

    {{-- <script>
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
                    url: "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota" +
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

            // ambil data kecamatan
            $("#kota").change(function() {
                const selectedKota = $('#kota').val();
                var slug = document.querySelector("#slug");
                var TempSlug = slug.value;
                let preslug = selectedKota;
                preslug = preslug.replace(/ /g, "-");
                slug.value = TempSlug + '-' + preslug.toLowerCase();
            });
        }); --}}
    </script>
@endsection
