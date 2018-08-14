@extends('layout.master')

@section ('content')
    <div class="col-sm-8 blog-main">


        <div class="addComment">

            <form method="POST" action="/post/edit/{{ $post->id }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                </div>

                {{--<input type="text" class="title" value="{{ $post->title }}  " >--}}
                {{--<p class="blog-post-meta">{{ $post-> created_at -> toFormattedDateString() }} </p>--}}

                <div class="form-group">
                    <label for="Text">Text Post</label>
                    <textarea class="form-control" id="body" name="body"> {{ $post->body }} </textarea>

                </div>

                {{--<textarea> {{ $post->body }} </textarea>--}}

                <hr>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                @include ('layout.errors_messages')
            </form>





        </div>

    </div>

@endsection