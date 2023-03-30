@extends('layouts.app2')
@section('content')
    <div class="container mt-5 d-flex flex-column align-items-center">
        @if(session()->has('success'))
            <div class="alert alert-success" id="alert">{{ session()->get('success') }}</div>
        @endif
        <h3>Ajout d'une nouvelle course <a href="{{ route('course.index') }}"><i class="fa fa-list"></i></a></h3>
        <form action="{{ route('course.store') }}" method="post" class="w-50">
            @csrf
            @method("post")
            <div class="form-group mb-3">
                <label>{{ __('Itinéraire') }}:</label>
                <select name="itineraire" id="" class="form-control mt-1 @error('itineraire') is-invalid @enderror" value="{{ old('itineraire') }}">
                    @foreach($itineraires as $e)
                        <option value="{{ $e->id}}">{{ $e->lieuDepart->nom}} - {{ $e->lieuArrivee->nom}} - {{ $e->tarif}} FCFA</option>
                    @endforeach
                </select>
                @error('itineraire')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mb-3">
                <label>{{ __('Chauffeur') }}:</label>
                <select name="chauffeur" id="" class="form-control mt-1 @error('chauffeur') is-invalid @enderror" value="{{ old('chauffeur') }}">
                    @foreach($chauffeurs as $e)
                        <option value="{{ $e->id}}">{{ $e->prenom}} {{ $e->nom}}</option>
                    @endforeach
                </select>
                @error('chauffeur')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mb-3">
                <label>{{ __('Passager') }}:</label>
                <select name="passager" id="" class="form-control mt-1 @error('passager') is-invalid @enderror" value="{{ old('passager') }}">
                    @foreach($passagers as $e)
                        <option value="{{ $e->id}}">{{ $e->prenom}} {{ $e->nom}}</option>
                    @endforeach
                </select>
                @error('passager')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mb-3">
                <label>{{ __('Heure de départ') }}:</label>
                <input type="time" name="heure_depart" id="heure_depart" class="form-control mt-1 @error('heure_depart') is-invalid @enderror" value="{{ old('heure_depart') }}">
                @error('heure_depart')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mb-3">
                <label>{{ __('Heure d\'arrivée') }}:</label>
                <input type="time" readonly name="heure_arrivee" id="heure_arrivee" class="form-control mt-1 @error('heure_arrivee') is-invalid @enderror" value="{{ old('heure_arrivee') }}">
                @error('heure_arrivee')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mb-3">
                <label>{{ __('Date') }}:</label>
                <input type="text" readonly name="date" id="date" class="form-control mt-1 @error('date') is-invalid @enderror" value="{{ date('Y-m-d') }}">
                @error('date')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-success">Créer</button>                               
            </div>     
        </form>
    </div>
@stop
