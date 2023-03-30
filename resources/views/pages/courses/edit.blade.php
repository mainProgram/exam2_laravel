@extends('layouts.app2')
@section('content')
    <h3 class="text-center my-5">
        Modification de l'itinéraire
        <a href="{{ route("course.index") }}">
            <i class="fa fa-list"></i>
        </a>
    </h3>
    <div class="container mt-5 d-flex flex-column align-items-center">
        @if(session()->has('success'))
            <div class="alert alert-success" id="alert">{{ session()->get('success') }}</div>
        @endif
        <form action="{{ route('course.update', $course->id) }}" method="post" class="w-50">
            @csrf
            @method("put")
            <div class="form-group mb-3">
                <label>{{ __('Départ') }}:</label>
                <input type="text" name="depart" id="depart" class="form-control mt-1 @error('depart') is-invalid @enderror" value="{{ old('depart') }}">
                @error('depart')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mb-3">
                <label>{{ __('Arrivée') }}:</label>
                <input type="text" name="arrivee" id="arrivee" class="form-control mt-1 @error('arrivee') is-invalid @enderror" value="{{ old('arrivee') }}">
                @error('arrivee')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="form-group mb-3">
                <label>{{ __('Tarif') }}:</label>
                <input type="number" name="tarif" id="tarif" class="form-control mt-1 @error('tarif') is-invalid @enderror" value="{{ old('tarif') }}">
                @error('tarif')<span class="text-danger">{{ $message }}</span>@enderror
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-success">Modifier</button>                               
            </div>     
        </form>
    </div>
@stop
