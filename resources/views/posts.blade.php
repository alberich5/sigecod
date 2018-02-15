@extends('layouts.app')
@section('css')
  <link href="{{ asset('css/slider.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
      <div id="slider">
        <div class="slides">
          <div class="slider">
            <div class="legend"></div>
            <div class="content">
              <div class="content-txt">
                <h1>Papeleria</h1>
                <h2 id="color">Todo lo relacionado con lo que utilizan las Areas de la Policia Auxiliar, Bancaria y Comercial.</h2>
              </div>
            </div>
            <div class="image">
              <img src="http://img11.hostingpics.net/pics/412998972.jpg">
            </div>
          </div>
          <div class="slider">
            <div class="legend"></div>
            <div class="content">
              <div class="content-txt">
                <h1>Equipos</h1>
                <h2 id="color">Todo lo relacionado con lo que utilizan las Areas de la Policia Auxiliar, Bancaria y Comercial.</h2>
              </div>
            </div>
            <div class="image">
              <img src="http://img11.hostingpics.net/pics/767361311.jpg">
            </div>
          </div>
          <div class="slider">
            <div class="legend"></div>
            <div class="content">
              <div class="content-txt">
                <h1>Otros</h1>
                <h2 id="color">Todo lo relacionado con lo que utilizan las Areas de la Policia Auxiliar, Bancaria y Comercial.</h2>
              </div>
            </div>
            <div class="image">
              <img src="http://img11.hostingpics.net/pics/990696943.jpg">
            </div>
          </div>
          <div class="slider">
            <div class="legend"></div>
            <div class="content">
              <div class="content-txt">
                <h1>Otros</h1>
                <h2 id="color">Todo lo relacionado con lo que utilizan las Areas de la Policia Auxiliar, Bancaria y Comercial.</h2>
              </div>
            </div>
            <div class="image">
              <img src="http://img11.hostingpics.net/pics/601549194.jpg">
            </div>
          </div>
        </div>

      </div>
    </div>
@endsection

@section('js')

@endsection
