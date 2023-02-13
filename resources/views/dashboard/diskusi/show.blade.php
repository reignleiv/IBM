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
    
    <div class="comments">
        <h3>Comments</h3>
        <div class="mb-3">
        <form id="comment-form">
            <input type="text" class="form-control" placeholder="..." id="comment-text" name="comment-text">
            <button class="btn btn-outline-success d-print-none" type="submit" hidden>
                Search
            </button>
        </form>
        </div>
        
        <div id="comment-wrapper">
            @foreach ($komentars as $komentar)
                <div id="comments-list" style="margin-bottom: 5px;">
                <table>
                    <tr>
                        <td>   
                                <b>
                                    {{$komentar->user->name}}
                                </b>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{$komentar->body}}
                        </td>
                    </tr>
                </table>
                </div>
                @endforeach
            </div>
        </div>
    </div>    
    <script>
        $(document).ready(function() {
            $('form').submit(function(e) {
                e.preventDefault();
                var comment = $('#comment-text').val();
                var currentDiskusId = "{{$diskusis->id}}"
                
                

                $.ajax({
                    url: '{{url("/dashboard/komentar")}}',
                    type: 'POST',
                    headers: ({
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }),
                    data: {
                        user_id : {{Auth::user()->id }} , // get user id
                        title : "hai",
                        body: comment , // get user comen
                        diskusi_id : currentDiskusId, //get current diskusi_id
                    },
                    success: function(data) {
                        $('#comment-wrapper').append(`
                        <div id="comments-list" style="margin-bottom: 5px;">
           <table>
               <tr>
                   <td>   
                        <b>
                            {{Auth::user()->name}}
                        </b>
                   </td>
               </tr>
               <tr>
                   <td>
                    `+data.data["body"]+`
                   </td>
               </tr>
           </table>
        </div>
                        
                        
                        `);
                        $('#comment-text').val('');
                        console.log(data)
                    },
                    error: function(err){
                        console.log(err)
                    }
                });
            });
        });
    </script>
@endsection
