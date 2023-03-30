@extends('layouts.app2')
@section('content')
    <div class="container mt-5 d-flex flex-column align-items-center">
        @if(session()->has('success'))
            <div class="alert alert-success" id="alert">{{ session()->get('success') }}</div>
        @endif
        <h3>Ajout d'un nouvel itinéraire <a href="{{ route('itineraire.index') }}"><i class="fa fa-list"></i></a></h3>
        <form action="{{ route('itineraire.store') }}" method="post" class="w-50">
            @csrf
            @method("post")
            <div class="form-group mb-3">
                <label>{{ __('Départ') }}:</label>
                <select name="depart" id="" class="form-control mt-1 @error('depart') is-invalid @enderror" value="{{ old('depart') }}">
                    @foreach($endroits as $e)
                        <option value="{{ $e->id}}">{{ $e->nom}}</option>
                    @endforeach
                </select>
                @error('depart')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mb-3">
                <label>{{ __('Arrivée') }}:</label>
                <select name="arrivee" id="" class="form-control mt-1 @error('arrivee') is-invalid @enderror" value="{{ old('arrivee') }}">
                    @foreach($endroits as $e)
                        <option value="{{ $e->id}}">{{ $e->nom}}</option>
                    @endforeach
                </select>
                @error('arrivee')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mb-3">
                <label>{{ __('Tarif') }}:</label>
                <input type="number" name="tarif" id="tarif" class="form-control mt-1 @error('tarif') is-invalid @enderror" value="{{ old('tarif') }}">
                @error('tarif')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-success">Créer</button>                               
            </div>     
        </form>
    </div>
@stop
