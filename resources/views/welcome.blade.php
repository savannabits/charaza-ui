@extends('layouts.backend.authBase')
@section("content")
    <div class="vh-100 vw-100 bg-primary my-auto text-center justify-content-center align-items-center" style="position: fixed">
        <div>
            <i class="mdi mdi-door-closed-lock p-0 text-warning" style="font-size: 20rem; position: relative"></i>
            <h1 class="text-warning font-weight-bolder">Pick an app</h1>
        </div>
    </div>
    <div class="row mx-auto">
        <div class="col-12 text-center">
            <div class="card text-white" style="background-color: rgba(0,0,0,.3)">
                <div class="card-header">
                    <h4 class="font-weight-bold">Select Tenant</h4>
                </div>
                <div class="card-body">
                    @foreach(\App\Tenant::all() as $tenant)
                        <a class="px-4 btn btn-light" href="{{route('home', ['tenant' =>$tenant->id])}}">{{$tenant->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
