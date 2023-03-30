@extends('layouts.app2')

@section('title', 'Admin')

@section('content')
    <div class="container">
        <h3 class="text-center my-5">
            Liste des courses 
            <a href="{{ route("course.create") }}">
                <i class="fa fa-plus"></i>
            </a>
        </h3>

        @if(session()->has('success'))
            <div class="alert alert-success mb-2" id="alert">{{ session()->get('success') }}</div>
        @endif

        @if(count($courses) > 0)
            <table class="table table-hover">
                <thead>
                    <th>Date</th>
                    <th>Heure de départ</th>
                    <th>Heure d'arrivée</th>
                    <th>Itinéraire</th>
                    <th>Chauffeur</th>
                    <th>Passager</th>
                    <th>État</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <tr>
                        <td>{{ ($course->date) }}</td>
                        <td>{{ ($course->heure_depart) }}</td>
                        <td>{{ ($course->heure_arrivee) }}</td>
                        <td>{{ ucwords($course->litineraire->lieuDepart->nom) }} - {{ ucwords($course->litineraire->lieuArrivee->nom) }} - {{ ucwords($course->litineraire->tarif)}}</td>
                        <td>{{ ucwords($course->lechauffeur->prenom) }} {{ ucwords($course->lechauffeur->nom) }}</td>
                        <td>{{ ucwords($course->lepassager->prenom) }} {{ ucwords($course->lepassager->nom) }}</td>
                        <td>{{ ucwords($course->etat) }}</td>
                        <td colspan="2">
                            <a href="{{ route('course.edit', $course->id ) }}">
                                <i class="fa fa-edit mx-2"></i>
                            </a>
                            <a data-id="{{ $course->id }}" class="delete" role="button">
                                <i class="fas fa-trash"></i>
                            </a>
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
