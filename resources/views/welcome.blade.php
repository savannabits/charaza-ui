@extends('layouts.backend.authBase')
@section("content")
    <div class="row mx-auto">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Select Tenant</h4>
                </div>
                <div class="card-body">
                    @foreach(\App\Tenant::all() as $tenant)
                        <a class="px-4 btn btn-primary" href="{{route('home', ['tenant' =>$tenant->id])}}">{{$tenant->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
