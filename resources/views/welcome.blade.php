<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-4 col-lg-2">
            <div class="card m-1 p-1">
                Filters
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="search">Search</label>
                            <input type="text" class="form-control" id="search" name="search">
                        </div>
                        <div class="form-group form-check">
                            <h6>Age</h6>
                            @foreach($filters as $filter)
                                <div>
                                    <input type="checkbox" class="form-check-input" id="age" name="age">
                                    <label class="form-check-label" for="age">{{$filter}}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="online" name="online">
                            <label class="form-check-label" for="online">Online?</label>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gander" id="g-male" value="0"
                                       checked>
                                <label class="form-check-label" for="g-male">
                                    male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gander" id="g-female" value="1">
                                <label class="form-check-label" for="g-female">
                                    female
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
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
                        <p>gander: {{$user->gander === 0 ? 'male' : 'female'}}</p>
                        <p>status: {{$user->status === 1 ? 'online' : 'offline'}}</p>
                        <p>email: {{$user->email}}</p>
                    </div>
                @endforeach
            </div>
            {{--<div class="mt-5 d-flex justify-content-center">--}}
            {{--{{ $users->links() }}--}}
            {{--</div>--}}
        </div>
    </div>
    {{--<div id="app">--}}
    {{--<example-component />--}}
    {{--</div>--}}
</div>
{{-- Scripts --}}
<script src="js\app.js"></script>
{{-- Scripts --}}
</body>
</html>
