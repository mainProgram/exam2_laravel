@extends('layouts.app2')

@section('title', 'Admin')

@section('content')
    <div class="container">
        <h3 class="text-center my-5">
            Liste des chauffeurs 
            <a href="{{ route("chauffeurs.create") }}">
                <i class="fa fa-plus"></i>
            </a>
        </h3>

        @if(session()->has('success'))
            <div class="alert alert-success mb-2" id="alert">{{ session()->get('success') }}</div>
        @endif

        @if(count($chauffeurs) > 0)
            <table class="table table-hover">
                <thead>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Adresse mail</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($chauffeurs as $chauffeur)
                    <tr>
                        <td>{{ ucwords($chauffeur->prenom) }}</td>
                        <td>{{ ucwords($chauffeur->nom) }}</td>
                        <td>{{ ucwords($chauffeur->telephone) }}</td>
                        <td>{{ ($chauffeur->email) }}</td>
                        <td>
                            <a data-id="{{ $chauffeur->id }}" class="delete" role="button">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3 d-flex justify-content-end">{{ $chauffeurs->links() }}</div>
        @else
            <h3 class="text-danger my-5">Pas de chauffeur !</h3>
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
                var chauffeur_id = $(this).data('id');

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
                        const url = `<?php echo route("chauffeurs.destroy", false); ?>/${chauffeur_id}`;
                        var data = {
                            "id": chauffeur_id
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
