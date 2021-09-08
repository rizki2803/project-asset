@extends('layouts/app')

@section('content')
    <div class="container" >
        <div class="col-md-pull-4 col-sm-pull-3 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>{{$p_reg}}</h2>
                </div>
                <div class="panel-body">
                    <ul>
                        @foreach($data as $d)
                            <li><b>{{$d->a_nm}}</b></li>
                            <ul>
                                <li>{{$status[$d->a_stat]}}</li>
                            </ul>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
