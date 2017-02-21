@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Auth::check())
            <form >
                <input type="submit" class="btn btn-default" value="Nuevo Post">
            </form>
       @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">News</div>

                    <div class="panel-body">
                        Listado de posts
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
