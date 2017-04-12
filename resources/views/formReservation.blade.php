@extends('layouts.master')
@section('content') 
<div class="col-md-12 well well-sm">
    <center><h1>Réservation d'une oeuvre</h1></center>
    {!! Form::open(['url' => 'reserverOeuvre']) !!}
    <div class="form-horizontal">    
        <div class="form-group">
            <input type="hidden" name="id_oeuvre" value="{{ $id_oeuvre }}"/>
            <label class="col-md-3 control-label">Titre : </label>
            <label class="col-md-6 form-control-static"> {{ $titre_oeuvre }} </label>            
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Date réservation : </label>
            <div class="col-md-3">
                    <input data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-language="fr" type="text" name="date_reservation" id="date_reservation" value="{{old('date_reservation')}}" class="form-control" placeholder="JJ/MM/AAAA" required/>
            </div>
        </div>        
        <div class="form-group">
            <label class="col-md-3 control-label">Adhérent : </label>
            <div class="col-md-3">
                <select class='form-control' name='cbAdherent' required>
                    <OPTION VALUE=0>Sélectionner un adhérent</option>
                    @foreach ($adherents as $adherent)
                        <OPTION VALUE="{{ $adherent->id_adherent }}" 
                                @if(old('cbAdherent') == $adherent->id_adherent) 
                                    {{ "selected" }} 
                                @endif
                                > {{ $adherent->nom_adherent }} {{ $adherent->prenom_adherent }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary">
                    <span class="glyphicon glyphicon-ok"></span> Valider
                </button>
                &nbsp;
                <button type="button" class="btn btn-default btn-primary" 
                    onclick="javascript: window.location = '{{ url('/listerOeuvres') }}';">
                    <span class="glyphicon glyphicon-remove"></span> Annuler
                </button>
            </div>           
        </div>
        <div class="col-md-6 col-md-offset-3">
             @include('error')
        </div>        
    </div>
</div>
{!! Form::close() !!}
@stop