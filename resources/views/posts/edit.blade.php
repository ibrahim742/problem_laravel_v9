    @extends('layouts.app')

    @section('title', 'Edit Postingan')

    @section('content')
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
    @endsection