
@extends('layout.master')

@section ('content')
    <div class="col-sm-8 blog-main">

    <h1> Create a Post</h1>

        <form method="POST" action="/posts">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
            </div>

            <div class="form-group">
                <label for="body">New Post</label>
                <textarea class="form-control" id="body" name="body" placeholder="Type the post"></textarea>
            </div>

            @if (Auth::user()->rules != 4)
            <div class="postmember">
                <p> Post to All Members ?</p>

                <input name="allTree" type="radio" id="allTree" value="Y"   /> Yes

                <input name="allTree" type="radio" id="allTree" value="N"   > No


            </div>
            @endif


            @if (sizeof($leaderships) > 0)
                <div class="form-group" id="leaders">
                    <label for="tribes">Tribe:</label>
                    <select class="form-control" name="leadership_id[]" multiple>

                        @foreach($leaderships as $leadership)

                            <option value=" {{ $leadership['id']}}"> {{ $leadership['name'] }} </option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if (sizeof($tribes) > 0)
            <div class="form-group" id="tribes">
                <label for="tribes">Tribe:</label>
                <select class="form-control" name="tribe_id[]" multiple>

                @foreach($tribes as $tribe)

                        <option value=" {{ $tribe['id'] }}"> {{ $tribe['name'] }} </option>
                    @endforeach
                </select>
            </div>
            @endif


            <div class="form-group" id="grades">
                <label for="grades">Grade:</label>
                <select class="form-control" name="grade_id[]" multiple>

                @foreach($typeUserBefore as $typeUsr)
                        <option value=" {{ $typeUsr['id'] }}">    {{ $typeUsr['name'] }} </option>

                @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>



            @include ('layout.errors_messages')
        </form>



    </div>



@endsection