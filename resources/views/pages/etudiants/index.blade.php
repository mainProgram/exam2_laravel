@extends('layouts.app')
@section('content')
    <h3 class="text-center my-5">
        Liste des étudiants 
        <a href="{{ route("etudiants.create") }}">
            <i class="fa fa-plus"></i>
        </a>
    </h3>

    @if(session()->has('success'))
        <div class="alert alert-success mb-2" id="alert">{{ session()->get('success') }}</div>
    @endif

    @if(count($etudiants) > 0)
        <table id="myTable" class="table table-hover">
            <thead>
                <tr>
                    <th>Prénom (s)</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($etudiants as $etudiant)
                <tr>
                    <td>{{ ucwords($etudiant->prenom) }}</td>
                    <td>{{ ucwords($etudiant->nom) }}</td>
                    <td colspan="2">
                        <a href="{{ route('etudiants.edit', $etudiant->id ) }}">
                            <i class="fa fa-edit mx-2"></i>
                        </a>
                        <a data-id="{{ $etudiant->id }}" class="delete" role="button">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3 d-flex justify-content-end">{{ $etudiants->links() }}</div>
    @else
        <h3 class="text-danger my-5">Pas d'étudiant !</h3>
    @endif
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
                var etudiant_id = $(this).data('id');

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
                        const url = `<?php echo route("etudiants.destroy", false); ?>/${etudiant_id}`;
                        var data = {
                            "id": etudiant_id
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
