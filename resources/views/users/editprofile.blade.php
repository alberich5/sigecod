@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Editing Profile</div>
                    <div class="panel-body">
                        <form action="" class="form-horizontal" method="post">
                            @if(count($errors) > 0)
                                <div class="errors">
                                    <ul class="alert-danger">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <label>Picture:</label>
                                <img class="img-thumbnail" src="/img/moustache.png" width="80" height="80">
                                <br>
                            <label>Name:</label>
                            <input type="hidden" class="form-control" name="id" value="{{ $user->id }}">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                <label>Email:</label>
                                <input type="text" class="form-control" name="email" readonly="readonly" value="{{ $user->email }}">
                                <label>Password:</label>
                                <input type="password" class="form-control" name="password">
                                @if(Auth::user()->rol == 'admin')
                                    <label>Rol:</label>
                                    <select class="form-control" name="rol" id="rol">
                                        <option>Admin</option>
                                        <option>User</option>
                                    </select>
                                @endif
                            <br>
                            <input type="submit" class="btn btn-primary" value="Edit">
                        </form>
                        @if(Auth::user()->rol == 'user')
                            <a href="/users/deleteaccount/{{$user->id}}"><button class="btn btn-danger">Delete account</button> </a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
