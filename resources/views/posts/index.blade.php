<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
    {{--  CSS  --}}
    <link href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    {{--  JS  --}}
    <script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js') }}" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
        .blog{
            padding: 5px;
            border-bottom: 1px solid lightgrey;
        }

        small{
            color: grey;
        }
    </style>
</head>
<body>
    <div class="container">  
    <h1>Blog Ibrahim Setiawan
        <a class="btn btn-success" href="{{ url('posts/create')}}">Buat Postingan</a>
    </h1>
    {{--  {{$posts}}  --}}

        @foreach ($posts as $post)
                <div class="card mb-3">
                    <div class="card-body ">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <p class="card-text"><small class="text-body-secondary">Last updated {{ date ("d M Y H:i", strtotime ( $post->created_at)) }}</small></p>
                        
                        <div class="d-flex gap-2">
                            <a href ="{{ url("posts/$post->id")}}" class="btn btn-primary">Selengkapnya</a>
                                
                                <a href ="{{ url("posts/$post->id/edit")}}" class="btn btn-warning">Edit</a>
                                <form method="POST" action="{{ url("posts/$post->id") }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>\
</body>

</html>