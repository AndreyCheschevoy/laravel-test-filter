<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" value="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

<div class="container">
    <noscript>
        <div class="row">
            <div class="col-sm-4 col-lg-2">
                <div class="card m-1 p-1">
                    Filters
                    <div class="card-body">
                        <form id="filter">
                            <div class="form-group">
                                <label for="search">Search</label>
                                <input type="text" class="form-control" id="search" name="name" value="{{old('name')}}">
                            </div>
                            <div class="form-group form-check">
                                <h6>Age</h6>
                                @foreach($filters_age as $key => $age)
                                    <div>
                                        <input type="checkbox" class="form-check-input" id="age_{{$key}}" name="age[]"
                                               value="{{$age}}"
                                               @if(is_array(old('age')) && in_array($age, old('age'))) checked @endif>
                                        <label class="form-check-label" for="age_{{$key}}">{{$age}}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group form-check">
                                <h6>Hobby</h6>
                                @foreach($filters_hobby as $key => $hobby)
                                    <div>
                                        <input type="checkbox" class="form-check-input" id="age_{{$key}}" name="hobby[]"
                                               value="{{$hobby}}"
                                               @if(is_array(old('hobby')) && in_array($hobby, old('hobby'))) checked @endif>
                                        <label class="form-check-label" for="age_{{$key}}">{{$hobby}}</label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="s-on" value="1"
                                           @if(old('status') && old('status') == 1) checked @endif>

                                    <label class="form-check-label" for="s-on">
                                        Online
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="s-off" value="2"
                                           @if(old('status') && old('status') == 2) checked @endif>

                                    <label class="form-check-label" for="s-off">
                                        Offline
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="g-male" value="1"
                                           @if(old('gender') && old('gender') == 1) checked @endif>

                                    <label class="form-check-label" for="g-male">
                                        male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="g-female" value="2"
                                           @if(old('gender') && old('gender') == 2) checked @endif>

                                    <label class="form-check-label" for="g-female">
                                        female
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{route('home')}}">Clean</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-lg-10">
                <div class="row d-flex justify-content-center">
                    @foreach($users as $user)
                        <div class="col-sm-6 col-lg-3 col-xl-2 card m-1 p-1">
                            <p>name: {{$user->name}}</p>
                            <p>age: {{$user->age}}</p>
                            <p>gender: {{$user->gender === 1 ? 'male' : 'female'}}</p>
                            <p>status: {{$user->status === 1 ? 'online' : 'offline'}}</p>
                            <p>hobby: {{$user->hobby}}</p>
                        </div>
                    @endforeach
                </div>
                {{--<div class="mt-5 d-flex justify-content-center">--}}
                {{--{{ $users->links() }}--}}
                {{--</div>--}}
            </div>
        </div>
    </noscript>
    <div id="app">
        <example-component/>
    </div>
</div>
{{-- Scripts --}}
<script src="js\app.js"></script>
{{-- Scripts --}}
</body>
</html>
