@extends('layouts.app')

@section('content')
  <div class="container">
    <form action="posts" class="form-horizontal" method="post">
        @if(count($errors) > 0)
            <div class="errors">
                <ul class="alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <div class="col-sm-10">
                <input type="hidden" class="form-control" name="id_usuario" value="{{ Auth::user()->id }}">
                <input type="hidden" class="form-control" name="nombre_usuario" value="{{ Auth::user()->name }}">
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-10">
              <label for="buscar">Buscar:</label>
                <input type="search" class="form-control" name="buscar" >
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
              <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
            </div>
        </div>



        <input type="submit" class="btn btn-primary" value="Guardar" v-on:click="mostrarAlert">
    </form>
  </div>
@endsection

@section('js')

@endsection
