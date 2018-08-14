@extends('layout.master')

@section ('content')
    <div class="col-sm-8 blog-main">

        <h2 class="blog-post-title">  {{ $post->title }} </h2>
        <p class="blog-post-meta">{{ $post-> created_at -> toFormattedDateString() }} </p>

        <p> {{ $post->body }} </p>

        <hr>

        <div class="comments">

            @foreach($post->comments as $comment)

                <ul class="list-group">
                    <li class="list-group-item">
                        {{ $comment->body }} -
                        {{ $comment->created_at->diffforhumans() }}


                    </li>


                </ul>

            @endforeach


        </div>

        <hr>

        <div class="addComment">

            <form method="POST" action="/posts/addComment/{{ $post->id }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="body">New Comment</label>
                    <textarea class="form-control" id="body" name="body" placeholder="Type the Comment"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                @include ('layout.errors_messages')
            </form>





        </div>

    </div>

@endsection