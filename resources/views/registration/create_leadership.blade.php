@extends('layout.master')

@section('content')
    <div class="col-sm-8 blog-main">

        <h1> Register a new Leadership</h1>

        <form method="POST" action="/register/leadership">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>

            <div class="form-group">
                <label for="moviment">Moviment:</label>
                <select class="form-control" id="moviment_id">

                    @foreach($moviments as $moviment)
                       <option value=" {{ $moviment->id }}"> {{ $moviment->name  }}</option>
                    @endforeach

                </select>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>

            @include('layout.errors_messages')
        </form>

    </div>
@endsection