@extends('layouts.main')
@section('container')

    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
        <form action="/diskusi">
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request("search") }}">
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
<<<<<<< HEAD
            <h3><a href="/diskusi/{{ $diskusi->slug }}" class="text-decoration-none">{{ $diskusi->title }}</a></h3>
            <p>By. {{ $diskusi->user->username }}</a>
            </p>
            <p>{{ $diskusi->excerpt }}</p>
            <a href="/diskusi/{{ $diskusi->slug }}" class="text-decoration-none">Read more</a>

=======
            <h3><a href="/dashboard/diskusi/{{ $diskusi->id }}" class="text-decoration-none">{{ $diskusi->title }}</a></h3>
            <p>By. <a href="/user/{{ $diskusi->user->username }}" class="text-decoration-none">{{ $diskusi->user->name }}</a>
            </p>
            <p>{{ $diskusi->excerpt }}</p>
            <a href="/dashboard/diskusi/{{ $diskusi->id }}" class="text-decoration-none">Read more</a>
>>>>>>> 30ca5c1867dabcbc70a25fd665e9543580191794
        </article>
    @endforeach
@endsection
