

    <div class="blog-post">

        <h2 class="blog-post-title">

            <a href="/posts/{{ $post->id }}">
                {{ $post->title }}
            </a>
        </h2>

        <p class="blog-post-meta">{{ $post-> created_at -> toFormattedDateString() }} <a href="#">{{ $post->user->name }}</a></p>



        <p> {{ $post -> body }} </p>




        @if(Auth::user()->rules <= $post->user->rules )
        <div id="editButton">
            <a href="{{ url('/post/edit/' . $post->id) }}" class="btn btn-xs btn-info pull-right">Edit</a>
            {{--<button type="submit" class="btn btn-primary">Edit</button>--}}
        </div>
        @endif
    </div><!-- /.blog-post -->
