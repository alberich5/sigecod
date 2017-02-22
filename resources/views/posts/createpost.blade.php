@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">New Post</div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="author">Author:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="autor">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="author">Content:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="titulo">
                                    <input type="text" class="form-control" id="contenido">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="author">Private:</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker" id="privado">
                                        <option>0</option>
                                        <option>1</option>
                                    </select>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-default" value="GoldFinch It" >
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection