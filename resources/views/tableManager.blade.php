@extends('layouts.app')

@section('content')


<!-- DISPLAYS THE TABLE STATE-->
<h1>Scénario en cours</h1>

      {{$item->name}} <a href="/scenarios/delete/{{$item->id}}"> Supprimer</a>
      <div class="table-preview">
        <div class="persistant-media">
        </div>
        <div class="zones-container">
          @foreach ($item->medias as $media)
            <div class="zone">
              <img src="{{$media}}" >
            </div>
            @endforeach
        </div>
      </div>
      <div>
          <h1>Scénarios disponibles</h1>
          
      </div>

    @stop