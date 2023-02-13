@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-3">{{ $diskusis->title }}</h1>
                <article class="my-3 fs-5">
                    {!! $diskusis->body !!}
                </article>
            </div>
        </div>

        <h3> <b> Comments </b> </h3>
        @auth
        <div class="comments">
            
            <div class="mb-3">
            <form id="comment-form">
                <input type="text" class="form-control" placeholder="..." id="comment-text" name="comment-text">
                <button class="btn btn-outline-success d-print-none" type="submit" hidden>
                    Search
                </button>
            </form>
            </div>
        @endauth
                   
            <div id="comment-wrapper">
                @foreach ($komentars as $komentar)
                    <div id="comments-list" style="margin-bottom: 5px;">
                    <table class="table-borderless">
                        <tr>
                            <td>
                                @if (Auth::user())
                                    @if ($komentar->user->id === Auth::user()->id)
                                        <b>
                                            <button class="deleteRecord" data-id="{{ $komentar->id }}" >Hapus Komentar </button> {{$komentar->user->name}}
                                        </b>
                                    @elseif (Auth::user()->is_admin)
                                        <b>
                                            <button class="deleteRecord" data-id="{{ $komentar->id }}" >Hapus Komentar </button> {{$komentar->user->name}}
                                        </b>
                                    @else
                                        <b>
                                            {{$komentar->user->name}}
                                        </b>    
                                    @endif                                
                                @else
                                    <b>
                                        {{$komentar->user->name}}
                                    </b>
                                @endif                              
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{$komentar->body}}
                            </td>                           
                        </tr>
                    </table>
                    <hr>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>    

        @auth
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
                            location.reload();
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

<script>
    $(document).ready(function() {

    $(".deleteRecord").click(function(){
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
   
    $.ajax(
    {
        url: "/dashboard/komentar/"+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
            location.reload();
        }
    }); 
    });
});
  </script>
        @endauth
@endsection
