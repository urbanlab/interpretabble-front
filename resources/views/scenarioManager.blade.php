@extends('layouts.app')

@section('content')

<!-- LIST EVERY ITEM -->
<div id="scenario-manager">
    <h3>Liste des cartes</h3>
    <div class="row">
        @foreach ($items as $item)
        <div class="col s6 m2">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">{{$item->name}}</span>
                    <p>Card_Id : {{$item->card_id}}</p>
                </div>
                <div class="card-action center-align">
                    <a class="btn-floating btn-large waves-effect waves-light red"><i
                            class="material-icons">edit</i></a>
                    <a class="btn-floating btn-large waves-effect waves-light red"
                        href="scenarios/delete/{{$item->id}}"><i class="material-icons">delete</i></a>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col s6 m2">
            <div class="card blue darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Ajouter une carte</span>
                    <div class="card-action center-align">
                        <a class="btn-floating btn-large waves-effect waves-light red"><i
                                class="material-icons modal-trigger" href="#add_item">add</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



  <!-- ADD Item -->
  <div id="add_item" class="modal">
    <div class="modal-content">
    <h4>Ajouter une carte</h4>

        <?php
        echo Form::open(array('url' => 'scenarios/create', 'method' => 'post', 'enctype'=>"multipart/form-data"));

        echo Form::token();

        echo '<div class="row">';
        echo '<div class="input-field col s6">';
        echo Form::label('name', 'Nom de la carte');
        echo Form::text('name');
        echo '</div>';

        echo '<div class="input-field col s6">';
        echo Form::label('card_id', "Id de la carte");
        echo Form::text('card_id');
        echo '</div>';

        echo Form::label('parent_id', 'Thématique associée');
        echo '<div class="input-field col s12"><select id="parent_id" name="parent_id">';
    
        foreach ($thematics as $thematic) {
            echo '<option value="'.$thematic->id.'">'.$thematic->name.'</option>';
        }
        echo '</select></div>';

        echo '</div class="row">';

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

        echo Form::submit();

        echo Form::close();
    ?>
    </div>
  </div>


<div>
@stop

