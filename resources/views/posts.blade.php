@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Auth::check())
            <a href="{{ url('/createpost') }}"><button class="btn btn-default">Create Post</button></a>
       @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">News</div>

                    <div class="panel-body">

                        <table class="table table-striped">
                            <thead>
                            <?php foreach ($posts as $post): ?>
                            <tr>
                                <th>@<?= $post['nombre_usuario']?>
                                    <br>
                                    <?= $post['contenido']?>
                                </th>
                            </tr>
                            <?php endforeach ?>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
