@extends('layouts.app2')

@section('title', 'Admin')

@section('content')
    <div class="container">
        <h3 class="text-center my-5">
            Liste des comptes business 
            <a href="{{ route("business.create") }}">
                <i class="fa fa-plus"></i>
            </a>
        </h3>

        @if(session()->has('success'))
            <div class="alert alert-success mb-2" id="alert">{{ session()->get('success') }}</div>
        @endif

        @if(count($business) > 0)
            <table class="table table-hover">
                <thead>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Adresse mail</th>
                    <th>Entreprise</th>
                    <th>Secteur</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($business as $b)
                    <tr>
                        <td>{{ ucwords($b->prenom) }}</td>
                        <td>{{ ucwords($b->nom) }}</td>
                        <td>{{ ucwords($b->telephone) }}</td>
                        <td>{{ ($b->email) }}</td>
                        <td>{{ ucwords($b->nom_entreprise) }}</td>
                        <td>{{ ucwords($b->secteur) }}</td>
                        <td>
                            <a data-id="{{ $b->id }}" class="delete" role="button">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3 d-flex justify-content-end">{{ $business->links() }}</div>
        @else
            <h3 class="text-danger my-5">Pas de compte business !</h3>
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
                var business_id = $(this).data('id');

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
                        const url = `<?php echo route("business.destroy", false); ?>/${business_id}`;
                        var data = {
                            "id": business_id
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
