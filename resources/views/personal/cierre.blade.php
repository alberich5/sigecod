@extends('layouts.app')

@section('content')
@if(Auth::user()->rol == 'admin')
  <div class="container" id="app">
    cierre folios

    ESTA A PUNTO DE REALIZAR EL CIERRE ANUAL DE FOLIOS.

    Para comenzar con el foliado del siguiente año presione el boton

    en la parte inferior a continuacion

    <<button type="">Finalizar</button>
  </div>

@endif
@endsection

@section('js')


@endsection