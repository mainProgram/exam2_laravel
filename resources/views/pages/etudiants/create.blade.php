@extends('layouts.app')
@section('content')
    <div class="container mt-5 d-flex flex-column align-items-center">
        @if(session()->has('success'))
            <div class="alert alert-success" id="alert">{{ session()->get('success') }}</div>
        @endif
        <h3>Ajout d'un nouveau étudiant <a href="{{ route('etudiants.index') }}"><i class="fa fa-list"></i></a></h3>
        <form action="{{ route('etudiants.store') }}" method="post" class="w-50">
            @csrf
            @method("post")
            <div class="form-group mb-3">
                <label>{{ __('Prénom (s)') }}:</label>
                <input type="text" name="prenom" id="prenom" class="form-control mt-1 @error('prenom') is-invalid @enderror" value="{{ old('prenom') }}">
                @error('prenom')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mb-3">
                <label>{{ __('Nom') }}:</label>
                <input type="text" name="nom" id="nom" class="form-control mt-1 @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
                @error('nom')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-success">Créer</button>                               
            </div>     
        </form>
    </div>
@stop
