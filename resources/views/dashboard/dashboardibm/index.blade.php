@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
</div>

@if (session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
@endif
  
  <div class="table-responsive col-lg-8">
    <a href="/dashboard/ibm/create" class="btn btn-primary mb-3">Buat IBM Baru</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Bahan Makanan</th>
          <th scope="col">Lokasi</th>
          <th scope="col">Satuan</th>
          <th scope="col">harga</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($ibms as $ibm)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $ibm->nama }}</td>
            <td>{{ $ibm->lokasi}}</td>
            <td>{{ $ibm->satuan}}</td>
            <td>{{ $ibm->harga}}</td>
            <td>
                <a class="nav-link badge bg-info" href="/dashboard/ibm/{{ $ibm->slug }}"><span data-feather="eye" ></span>
                </a>
                <a class="badge bg-warning" href="/dashboard/ibm/{{ $ibm->slug }}/edit"><span data-feather="edit" ></span>
                </a>
                <form action="/dashboard/ibm/{{ $ibm->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle" ></span></button>
                </form>
            </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
@endsection