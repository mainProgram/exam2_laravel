@extends('layouts.app2')

@section('title', 'Admin')

@section('content')
    <div class="container">
        <h3 class="text-center my-5">
            Liste des itinéraires 
            <a href="{{ route("itineraire.create") }}">
                <i class="fa fa-plus"></i>
            </a>
        </h3>

        @if(session()->has('success'))
            <div class="alert alert-success mb-2" id="alert">{{ session()->get('success') }}</div>
        @endif

        @if(count($itineraires) > 0)
            <table class="table table-hover">
                <thead>
                    <th>Départ</th>
                    <th>Arrivée</th>
                    <th>Tarif</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($itineraires as $itineraire)
                    <tr>
                        <td>{{ ucwords($itineraire->lieuDepart->nom) }}</td>
                        <td>{{ ucwords($itineraire->lieuArrivee->nom) }}</td>
                        <td>{{ ($itineraire->tarif) }}</td>
                        <td colspan="2">
                            <a href="{{ route('itineraire.edit', $itineraire->id ) }}">
                                <i class="fa fa-edit mx-2"></i>
                            </a>
                            <a data-id="{{ $itineraire->id }}" class="delete" role="button">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-3 d-flex justify-content-end">{{ $itineraires->links() }}</div>
        @else
            <h3 class="text-danger my-5">Pas d'itinéraire !</h3>
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
                var itineraire_id = $(this).data('id');

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
                        const url = `<?php echo route("itineraire.destroy", false); ?>/${itineraire_id}`;
                        var data = {
                            "id": itineraire_id
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
