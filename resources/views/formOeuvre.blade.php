@extends('layouts.master')
@section('content')
{!! Form::open(['url' => 'updateOeuvre']) !!}
<div class="col-md-12 well well-sm">
    <center><h1>{{$titreVue or ''}}</h1></center>
    <div class="form-horizontal">    
        <div class="form-group">
            <input type="hidden" name="id_oeuvre" value="{{$oeuvre->id_oeuvre or 0}}"/>
            <label class="col-md-3 control-label">Titre : </label>
            <div class="col-md-3">
                <input type="text" name="titre" 
                    value="{{$oeuvre->titre or old('titre')}}" class="form-control" required autofocus>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Proprietaire : </label>
            <div class="col-md-3">
                <select class='form-control' name='cbProprietaire' required>
                    <OPTION VALUE=0>Sélectionner un proprietaire</option>
                     @foreach($props as $prop)
                     <option value="{{$prop->id_proprietaire}}"
                             @if(!empty(old('cbProprietaire')) && $prop->id_proprietaire == old('cbProprietaire'))
                             selected
                             @endif
                             @if (!empty($oeuvre) && ($prop->id_proprietaire == $oeuvre->id_proprietaire))
                             selected
                             @endif
                             >{{$prop->nom_proprietaire}} {{$prop->prenom_proprietaire}} </option>
                     @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Prix : </label>
            <div class="col-md-3">
                <input type="text" name="prix" value="{{$oeuvre->prix or old('prix')}}" class="form-control"  required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-default btn-primary">
                    <span class="glyphicon glyphicon-ok"></span> Valider
                </button>
                &nbsp;
                <button type="button" class="btn btn-default btn-primary" 
                    onclick="javascript: window.location = '{{url('/')}}';">
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
