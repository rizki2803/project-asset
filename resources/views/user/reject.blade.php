@extends('layouts/app')

@section('content')
<div class="container" >
    <div class="row clearfix">
        <div class="col-md-pull-4 col-sm-pull-3 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                   HARAP MENGISI ALASAN
                    </h2>
                </div>
                <div class="body">
                    <form action="{{route('user.pengajuanBarang.atasan.storeReject',[$kd_reg,$token])}}" method="post">
                        @csrf
                        <textarea name="alasan" rows="4" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
