@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $diskusis->title }}</h1>
                <a href="/dashboard/diskusi" class="btn btn-success"><span data-feather="arrow-left"></span>Back to all my
                    Post</a>
                <a href="/dashboard/diskusi/{{ $diskusis->id }}/edit" class="btn btn-warning"><span
                        data-feather="edit"></span>Edit</a>
                <form action="/dashboard/diskusi/{{ $diskusis->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span
                            data-feather="x-circle"></span>Delete</button>
                </form>
                @if ($diskusis->image)
                    <div style="max-height: 350px; overflow:hidden">
                        <img src="{{ asset('storage/' . $diskusis->image) }}" class="card-img-top mt-3"
                            alt="{{ $diskusi->category->name }}" class="img-fluid ">
                    </div>
                @else
                    {{-- <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top mt-3"
                        alt="{{ $d->category->name }}" class="img-fluid "> --}}
                @endif
                <article class="my-3 fs-5">
                    {!! $diskusis->body !!}
                </article>
            </div>
        </div>
    </div>
    <div class="comments">
        <h3>Comments</h3>
        <form id="comment-form">
            <textarea id="comment-text" placeholder="Write a comment..."></textarea>
            <button type="submit">Komentar</button>
        </form>
        <div id="comments-list">
            <tbody>
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $komentar->body }}</td>
                    <td>
                        <a class="nav-link badge bg-info" href="/dashboard/diskusi/{{ $komentar->id }}"><span
                                data-feather="eye"></span>
                        </a>
                        <a class="badge bg-warning" href="/dashboard/diskusi/{{ $komentar->id }}/edit"><span
                                data-feather="edit"></span>
                        </a>
                        <form action="/dashboard/diskusi/{{ $komentar->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                                    data-feather="x-circle"></span></button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('form').submit(function(e) {
                e.preventDefault();
                var comment = $('#comment').val();

                $.ajax({
                    url: 'KomentarController.php',
                    type: 'post',
                    data: {
                        comment: comment
                    },
                    success: function(data) {
                        $('#all-comments').prepend(data);
                        $('#comment').val('');
                    }
                });
            });
        });
    </script>
@endsection
