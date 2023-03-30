@extends('layouts.app2')
@section('content')
    <h3 class="text-center my-5">
        Modification de l'endroit
        <a href="{{ route("endroit.index") }}">
            <i class="fa fa-list"></i>
        </a>
    </h3>
    <div class="container mt-5 d-flex flex-column align-items-center">
        @if(session()->has('success'))
            <div class="alert alert-success" id="alert">{{ session()->get('success') }}</div>
        @endif
        <form action="{{ route('endroit.update', $endroit->id) }}" method="post" class="w-50">
            @csrf
            @method("put")
            <div class="form-group mb-3">
                <label>{{ __('Nom') }}:</label>
                <input type="text" name="nom" id="nom" class="form-control mt-1 @error('nom') is-invalid @enderror" value="{{ $endroit->nom }}">
                @error('nom')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-success">Modifier</button>                               
            </div>     
        </form>
    </div>
@stop
