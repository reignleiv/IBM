@extends('layouts.main')
@section('container')
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/diskusi">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search"
                        value="{{ request('search') }}">
                    <select name="" id="">
                        <option value="">Cari Kecamatan</option>
                    </select>
                    <select name="" id="">
                        <option value="">Cari Desa</option>
                    </select>
                    <button class="btn btn-outline-success" type="submit">
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>

    <h1 class="mb-5">{{ $title }}</h1>
    @foreach ($diskusis as $diskusi)
        <article class="mb-5 border-bottom pb-3">
            <h3><a href="/diskusi/{{ $diskusi->slug }}" class="text-decoration-none">{{ $diskusi->title }}</a></h3>
            <p>By. {{ $diskusi->user->username }}</a>
            </p>
            <p>{{ $diskusi->excerpt }}</p>
            <a href="/diskusi/{{ $diskusi->slug }}" class="text-decoration-none">Read more</a>

        </article>
    @endforeach
@endsection
