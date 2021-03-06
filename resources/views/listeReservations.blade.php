@extends('layouts.master')
@section('content')
<div class="container">
    <div class="blanc">
        <h1>Liste des réservations</h1>
    </div>
    @if(!empty($reservations))
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Date</th>
                <th>Statut</th>                
                <th>Prénom adhérent</th>
                <th>Nom adhérent</th>
                <th>Confirmer</th>
                <th>Supprimer</th>
            </tr>
        </thead>
            @foreach($reservations as $reservation)
            <tr>   
                <td>  {{ $reservation->titre }} </td>
                <td>  {{ $reservation->date_reservation }} </td>       
                <td>  {{ $reservation->statut }} </td>                 
                <td>  {{ $reservation->prenom_adherent }} </td>
                <td>  {{ $reservation->nom_adherent }} </td>
                
                <td style="text-align:center;">
                    @if ($reservation->statut == "Attente")
                        <a href="{{ url('/confirmerReservationOeuvre') }}/{{$reservation->id_oeuvre}}/{{$reservation->date_reservation}}">
                        <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Confirmer"></span></a>
                    @endif
                </td>    
                <td style="text-align:center;">
                    <a class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="top" title="Supprimer" href="#"
                        onclick="javascript:if (confirm('Suppression confirmée ?'))
                            { window.location='{{ url('/supprimerReservation') }}/{{ $reservation->date_reservation }}/{{ $reservation->id_oeuvre }}';}">
                    </a>
                </td>                    
            </tr>
            @endforeach
            <BR> <BR>
    </table>
    @else
    <p> Aucune réservation effectuée pour l'instant !</p>
    @endif
    <div class="col-md-6 col-md-offset-3">
         @include('error')
    </div> 
</div>
@stop