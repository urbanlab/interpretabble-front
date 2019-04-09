@extends('layouts.app')

@section('content')

<div>
    <h1>Liste des scénarios</h1>
    -Edition
    -Supression

    <ul>
    @foreach ($items as $item)
        <li>{{$item->name}} <a href="/scenarios/delete/{{$item->id}}"> Delete</a>
        {{$item->name}}
        @foreach ($item->medias as $media)
          <img src="{{$media}}" width="5%">
        @endforeach
        </li>
    @endforeach
    </ul>
</div>

<div>
  
  <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
</div>

<div>
    <h1>Ajouter un nouveau scénario</h1>
    -Preview section
    -Add form

    <?php
        echo Form::open(array('url' => 'scenarios/create', 'method' => 'post'));

        echo Form::label('name', 'Nom du scénario');
        echo Form::text('name');

        echo '<br>';

        echo Form::label('media', 'Chargez les médias ici');
        echo Form::text('medias');

        echo '<br>';
        
        echo Form::label('children', "Enfants ratachés à l'item");
        echo Form::text('children');

        echo Form::submit();

        echo Form::close();
    ?>
<div>
@stop