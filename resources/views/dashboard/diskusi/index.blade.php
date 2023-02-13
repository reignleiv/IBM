@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Diskusi</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="row justify-start-center mb-3">
        <div class="col-md-6">
        <form action="/dashboard/diskusi">
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request("search") }}">
            <button class="btn btn-outline-success" type="submit">
                Search
            </button>
            </div>
        </form>
        </div>
    </div>

    <div class="table-responsive col-lg-8">
        <a href="/dashboard/diskusi/create" class="btn btn-primary mb-3">Buat Diskusi Baru</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($diskusis as $diskusi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $diskusi->title }}</td>
                        <td>{{ $diskusi->user->name }}</td>
                        <td>
                            <a class="nav-link badge bg-info" href="/dashboard/diskusi/{{ $diskusi->slug }}"><span
                                    data-feather="eye"></span>
                            </a>
                            <a class="badge bg-warning" href="/dashboard/diskusi/{{ $diskusi->slug }}/edit"><span
                                    data-feather="edit"></span>
                            </a>
                            <form action="/dashboard/diskusi/{{ $diskusi->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                                        data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
