@extends('layouts.app')

@section('content')
    <h1>Your Characters</h1>
    <div class="row">
        <div class="col-sm-6">
            <h3>Main Character</h3>
            @if($characters > 0)
                <h2 class="text-center">{{$name}}</h2>
                <a href="/play/1" class="btn btn-primary form-control">PLAY</a>
                <p>Gender: {{$gender}}</p>
                <p>XP: {{$xp}}</p>
                <p>Temple of Worship: {{$temple}}</p>
                <p>Summoned on: {{$created_at}}</p>
                <p>Current status: {{$status}}</p>
                <p>Health:<p>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$hp_percent}}"
                    aria-valuemin="0" aria-valuemax="{{$max_hp}}" 
                    style="width:{{$hp_percent}}%">
                        <span>{{$hp}}/{{$max_hp}}</span>
                    </div>
                </div>
                <p class="text-center">Statistics</p>
                <div class="row">
                    <div class="col-xs-6">
                        <p class="text-center">Defence</p>
                        <p class="text-center">{{$defence}}</p>
                    </div>
                    <div class="col-xs-6">
                        <p class="text-center">Speed</p>
                        <p class="text-center">{{$speed}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <p class="text-center">Stamina</p>
                        <p class="text-center">{{$stamina}}</p>
                    </div>
                    <div class="col-xs-6">
                        <p class="text-center">Strength</p>
                        <p class="text-center">{{$strength}}</p>
                    </div>
                </div>
        </div>
        <div class="col-sm-6">
            <h3>Descendant Character</h3>
        @if($d_characters > 0)
            <h2 class="text-center">{{$d_name}}</h2>
            <a href="/play/2" class="btn btn-primary form-control">PLAY</a>
                <p>Gender: {{$d_gender}}</p>
                <p>XP: {{$d_xp}}</p>
                <p>Temple of Worship: {{$d_temple}}</p>
                <p>Summoned on: {{$d_created_at}}</p>
                <p>Current status: {{$d_status}}</p>
                <p>Health:<p>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$d_hp_percent}}"
                    aria-valuemin="0" aria-valuemax="{{$d_max_hp}}" 
                    style="width:{{$d_hp_percent}}%">
                        <span>{{$d_hp}}/{{$d_max_hp}}</span>
                    </div>
                </div>
                <p class="text-center">Statistics</p>
                <div class="row">
                    <div class="col-xs-6">
                        <p class="text-center">Defence</p>
                        <p class="text-center">{{$d_defence}}</p>
                    </div>
                    <div class="col-xs-6">
                        <p class="text-center">Speed</p>
                        <p class="text-center">{{$d_speed}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <p class="text-center">Stamina</p>
                        <p class="text-center">{{$d_stamina}}</p>
                    </div>
                    <div class="col-xs-6">
                        <p class="text-center">Strength</p>
                        <p class="text-center">{{$d_strength}}</p>
                    </div>
        </div>
        @else
        <p>You have no descendant characters.</p>
        @endif
            @else
                    {!! Form::open(['action' => 'CharactersController@store', 'method'=> 'POST']) !!}
                    <div class="form-group">
                        {{Form::label('input-character-name', 'Character Name')}}
                        {{Form::text('input-character-name', '', ['class' => 'form-control','minlength' => 2, 'maxlength' => 15])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('input-temple', 'Temple of summoning')}}
                        {{Form::select('input-temple', ['1' => 'Fire', '2' => 'Water', '3' => 'Earth'], '1', ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('input-gender', 'Character Gender')}}
                        {{Form::select('input-gender', ['1' => 'Male', '2' => 'Female'], '1', ['class' => 'form-control'])}}
                    </div>
                    {{Form::submit('Summon!', ['class' => 'btn-primary form-control'])}}
                    {!! Form::close() !!}
                    </div>
                <div class="col-sm-6">
                    <h3>Descendant Character</h3>
                    <p>You have no descendant characters.</p>
                </div>
     @endif
@endsection

