@extends('layouts.app')

@section('content')

<!-- LIST EVERY SCENARIO -->
<div id="scenario-manager"> 
    <h1>Liste des scénarios</h1>

    @foreach ($items as $item)
      {{$item->name}} | Card_id : {{$item->card_id}} <a href="scenarios/delete/{{$item->id}}"> Supprimer</a>
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
    @endforeach
    
</div>

<div>
  
<!-- ADD NEW SCENARIO FORM -->
<div>
    <h1>Ajouter un nouveau scénario</h1>
    -Preview section
    -Add form

    <?php
        echo Form::open(array('url' => 'scenarios/create', 'method' => 'post', 'enctype'=>"multipart/form-data"));

        echo Form::token();

        echo Form::label('name', 'Nom du scénario');
        echo Form::text('name');

        echo '<br>';

        echo Form::label('media', 'Zone1');
        echo Form::file('zone1');

        echo '<br>';

        echo Form::label('media', 'Zone2');
        echo Form::file('zone2');

        echo '<br>';

        echo Form::label('media', 'Zone3');
        echo Form::file('zone3');

        echo '<br>';

        echo Form::label('media', 'Zone4');
        echo Form::file('zone4');

        echo '<br>';
        
        echo Form::label('card_id', "Id de la carte");
        echo Form::text('card_id');

        echo Form::submit();

        echo Form::close();
    ?>
<div>
@stop