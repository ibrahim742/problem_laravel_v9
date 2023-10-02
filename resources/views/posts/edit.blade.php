<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Blog | Ubah Postingan</title>
       
        {{--  CSS  --}}
        <link href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
        {{--  JS  --}}
        <script src="{{ asset('bootstrap-5/js/bootstrap.bundle.min.js') }}" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    </head>
    <body>

    <div class="container">
        <h1>Edit Postingan</h1>

        <form method="POST" action="{{ url("posts/{$post->id}") }}">
            @method('PATCH')
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="title" class="form-control" id="title" name="title" velue="{{ $post->title }}"></input>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Konten</label>
                <textarea class="form-control" id="content" name="content" rows="3">{{ $post->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>

        {{--  <form method="POST" action="{{ url("posts/$post->id") }}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>  --}}
    </div>
    </body>
</html>