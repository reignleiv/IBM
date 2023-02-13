@extends('dashboard.layouts.main');

 <!-- include libraries(jQuery, bootstrap) -->
 <script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
 <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
 <script type="text/javascript" src="cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

 <!-- include summernote css/js-->
 <link href="summernote-bs5.css" rel="stylesheet">
 <script src="summernote-bs5.js"></script>
 
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
</div>

   

    <div id="summernote"></div>
    <script>
      $('#summernote').summernote({
        placeholder: 'Hello Bootstrap 5',
        tabsize: 2,
        height: 100
      });
    </script>
  </body>
</html>
@endsection