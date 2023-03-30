@extends('layouts.app2')

@section('title', 'Admin')

@section('content')
    <div class="container">
        <h3 class="text-center my-5">
            Liste des passagers 
            <a href="{{ route("passagers.create") }}">
                <i class="fa fa-plus"></i>
            </a>
        </h3>

        @if(session()->has('success'))
            <div class="alert alert-success mb-2" id="alert">{{ session()->get('success') }}</div>
        @endif

        @if(count($passagers) > 0)
            <table class="table table-hover">
                <thead>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Adresse mail</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($passagers as $passager)
                    <tr>
                        <td>{{ ucwords($passager->prenom) }}</td>
                        <td>{{ ucwords($passager->nom) }}</td>
                        <td>{{ ucwords($passager->telephone) }}</td>
                        <td>{{ ($passager->email) }}</td>
                        <td>
                            <a data-id="{{ $passager->id }}" class="delete" role="button">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3 d-flex justify-content-end">{{ $passagers->links() }}</div>
        @else
            <h3 class="text-danger my-5">Pas de passager !</h3>
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
                var passager_id = $(this).data('id');

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
                        const url = `<?php echo route("passagers.destroy", false); ?>/${passager_id}`;
                        var data = {
                            "id": passager_id
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
