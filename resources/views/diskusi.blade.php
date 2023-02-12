@extends('layouts.main')

@section('container')
    <h1 class="mb-5">{{ $title }}</h1>

    @foreach ($diskusis as $diskusi)
        <article class="mb-5 border-bottom pb-3">
            <h3><a href="/dashboard/diskusi/{{ $diskusi->id }}" class="text-decoration-none">{{ $diskusi->title }}</a></h3>
            <p>By. <a href="/user/{{ $diskusi->user->username }}" class="text-decoration-none">{{ $diskusi->user->name }}</a>
            </p>
            <p>{{ $diskusi->excerpt }}</p>
            <a href="/dashboard/diskusi/{{ $diskusi->id }}" class="text-decoration-none">Read more</a>
        </article>
    @endforeach
@endsection
