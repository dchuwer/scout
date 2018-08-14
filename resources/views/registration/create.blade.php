@extends('layout.master')

@section('content')
    <div class="col-sm-8 blog-main">

        <h1> Register a new User</h1>

        <form method="POST" action="/register">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>

            <div class="form-group">
                <label for="body">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>

            <div class="form-group">
                <label for="body">Password Confirmation</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password Confrimation">
            </div>

            <div class="form-group">
                <p>User's Group</p>
            <select class="selectpicker" id="type" name="type">
                <optgroup label="Moviment">
                    @foreach($moviments as $moviment)
                        <option value="moviment,{{ $moviment->id }}"> {{ $moviment->name  }}</option>
                    @endforeach
                </optgroup>
                <optgroup label="Leadership">
                    @foreach($leaderships as $leadership)
                    <option value="leadership,{{ $leadership->id }}"> {{ $leadership->name  }}</option>
                    @endforeach
                </optgroup>
                <optgroup label="Tribe">
                    @foreach($tribes as $tribe)
                        <option value="tribe,{{ $tribe->id }}"> {{ $tribe->name  }}</option>
                    @endforeach
                </optgroup>
                <optgroup label="Grade">
                    @foreach($grades as $grade)
                        <option value="grade,{{ $grade->id }}"> {{ $grade->name  }}</option>
                    @endforeach
                </optgroup>
            </select>
            </div>

            {{--<div class="form-group">--}}
                {{--<label for="body">Type User</label>--}}
                    {{--<option>Moviment</option>--}}
                   {{--<option>--}}

                    {{--<label for="Leadership">Leadership:</label>--}}
                    {{--<select class="dropdown-submenu" id="leadership_id">--}}

                        {{--@foreach($leaderships as $leadership)--}}
                            {{--<option value=" {{ $leadership->id }}"> {{ $leadership->name  }}</option>--}}
                        {{--@endforeach--}}

                    {{--</select>--}}

                  {{--</option>--}}

                    {{--<option>Tribe</option>--}}
                    {{--<option>Grade</option>--}}
                    {{--<option>Parent</option>--}}
                {{--</select>--}}
            {{--</div>--}}

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Sign In</button>
            </div>

            @include('layout.errors_messages')
        </form>

    </div>
@endsection