@extends('layouts.app2')

@section('title', 'Admin')

@section('content')
    <div class="container">
        <h3 class="text-center my-5">
            Liste des courses 
            @if(!Auth::user()->hasRole("chauffeur"))
                <a href="{{ route("course.create") }}">
                    <i class="fa fa-plus"></i>
                </a>
            @endif
        </h3>

        @if(session()->has('success'))
            <div class="alert alert-success mb-2" id="alert">{{ session()->get('success') }}</div>
        @endif
        @if(session()->has('danger'))
            <div class="alert alert-danger mb-2" id="alert">{{ session()->get('danger') }}</div>
        @endif

        @if(count($courses) > 0)
            <table class="table table-hover">
                <thead>
                    <th>Date</th>
                    <th>Heure de départ</th>
                    <th>Heure d'arrivée</th>
                    <th>Itinéraire</th>
                    @if(!Auth::user()->hasRole("chauffeur"))
                        <th>Chauffeur</th>
                    @endif
                    @if(!Auth::user()->hasRole("passager"))
                        <th>Passager</th>
                    @endif
                    <th>État</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <tr>
                        <td>{{ ($course->date) }}</td>
                        <td>{{ ($course->heure_depart) }}</td>
                        <td>@if($course->heure_arrivee == "")  --- @else{{$course->heure_arrivee}} @endif</td>
                        <td>{{ ucwords($course->litineraire->lieuDepart->nom) }} - {{ ucwords($course->litineraire->lieuArrivee->nom) }} - {{ ucwords($course->litineraire->tarif)}}</td>
                        @if(!Auth::user()->hasRole("chauffeur"))
                            <td>{{ ucwords($course->lechauffeur->prenom) }} {{ ucwords($course->lechauffeur->nom) }}</td>
                        @endif
                        @if(!Auth::user()->hasRole("passager"))    
                            <td>{{ ucwords($course->lepassager->prenom) }} {{ ucwords($course->lepassager->nom) }}</td>
                        @endif
                        <td class="text-info">@if ($course->etat == "valide") --- 
                            @elseif($course->etat =="termine") Terminée
                            @elseif($course->etat =="annule") Annulée
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('course.change', [$course->id, 'termine']) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-success p-1">
                                    Terminer
                                </button>
                            </form>
                            <form action="{{ route('course.change', [$course->id, 'annule']) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger p-1">
                                    Annuler
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3 d-flex justify-content-end">{{ $courses->links() }}</div>
        @else
            <h3 class="text-danger my-5">Pas de course !</h3>
        @endif
    </div>
@stop

@section('scripts')
   <script>      
        $(function () {
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("body").on("click", ".delete", function(e)
            {
                e.preventDefault();
                var course_id = $(this).data('id');

                Swal.fire({
                    title: 'Êtes-vous sûr ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ff9f43',
                    cancelButtonColor: '#ef4d56',
                    confirmButtonText: 'Oui, supprimer !',
                    cancelButtonText: 'Retour'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        const url = `<?php echo route("course.destroy", false); ?>/${course_id}`;
                        var data = {
                            "id": course_id
                        }
                        $.ajax({
                            type: "DELETE",
                            url: url,
                            data: data,
                            success: function(response) {
                            Swal.fire(
                                'Supprimé!',
                                response.status ,
                                'success'
                            ).then((result) => {
                                window.location.reload();
                            });
                            }
                        })
                    }
                })
            });
      });
      
   </script>
@stop
