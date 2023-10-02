<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog | Judul: {{ $post->title }}</title>
    {{--  CSS  --}}
    <link href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('css/blog.css') }}" crossorigin="anonymous">
    
    {{--  JS  --}}
    <script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js') }}" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    </head>
    <body>
        <div class="container">
        <article class="blog-post">
            <h1 class="display-5 link-body-emphasis mb-1">{{ $post->title}}</h1>
            <p class="blog-post-meta">{{ date ("d M Y H:i", strtotime ( $post->created_at)) }} </p>

            <p>{{ $post->content }}</p>
        
            @foreach($comments as $comment)
                <div class="card mb-3">
                    <div class="card-body">
                        <p style="font-size:8pt">{{ $comment->comment }}</p>
                    </div>
                </div>
            @endforeach
        </article>

        <a href="{{url("posts")}}" class="btn btn-danger"> Kembali </a>
        </div>
    </body>
</html>