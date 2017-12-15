@extends('layouts.app')

@section('content')
    <h1>Your Characters</h1>
    <div class="row">
        <div class="col-sm-6">
            <h3>Main Character</h3>
            @if($data['characters'] > 0)
                <h2 class="text-center">{{$data['name']}}</h2>
                <a href="/play/1" class="btn btn-primary form-control">PLAY</a>
                <p>Gender: {{$data['gender']}}</p>
                <p>XP: {{$data['xp']}}</p>
                <p>Temple of Worship: {{$data['temple']}}</p>
                <p>Summoned on: {{$data['created_at']}}</p>
                <p>Current status: {{$data['status']}}</p>
                <p>Health:<p>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$data['hp_percent']}}"
                    aria-valuemin="0" aria-valuemax="{{$data['max_hp']}}" 
                    style="width:{{$data['hp_percent']}}%">
                        <span>{{$data['hp']}}/{{$data['max_hp']}}</span>
                    </div>
                </div>
                <p class="text-center">Statistics</p>
                <div class="row">
                    <div class="col-xs-6">
                        <p class="text-center">Defence</p>
                        <p class="text-center">{{$data['defence']}}</p>
                    </div>
                    <div class="col-xs-6">
                        <p class="text-center">Speed</p>
                        <p class="text-center">{{$data['speed']}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <p class="text-center">Stamina</p>
                        <p class="text-center">{{$data['stamina']}}</p>
                    </div>
                    <div class="col-xs-6">
                        <p class="text-center">Strength</p>
                        <p class="text-center">{{$data['strength']}}</p>
                    </div>
                </div>
        </div>
        <div class="col-sm-6">
            <h3>Descendant Character</h3>
        @if($data['d_characters'] > 0)
            <h2 class="text-center">{{$data['d_name']}}</h2>
            <a href="/play/2" class="btn btn-primary form-control">PLAY</a>
                <p>Gender: {{$data['d_gender']}}</p>
                <p>XP: {{$data['d_xp']}}</p>
                <p>Temple of Worship: {{$data['d_temple']}}</p>
                <p>Summoned on: {{$data['d_created_at']}}</p>
                <p>Current status: {{$data['d_status']}}</p>
                <p>Health:<p>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$data['d_hp_percent']}}"
                    aria-valuemin="0" aria-valuemax="{{$data['d_max_hp']}}" 
                    style="width:{{$data['d_hp_percent']}}%">
                        <span>{{$data['d_hp']}}/{{$data['d_max_hp']}}</span>
                    </div>
                </div>
                <p class="text-center">Statistics</p>
                <div class="row">
                    <div class="col-xs-6">
                        <p class="text-center">Defence</p>
                        <p class="text-center">{{$data['d_defence']}}</p>
                    </div>
                    <div class="col-xs-6">
                        <p class="text-center">Speed</p>
                        <p class="text-center">{{$data['d_speed']}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <p class="text-center">Stamina</p>
                        <p class="text-center">{{$data['d_stamina']}}</p>
                    </div>
                    <div class="col-xs-6">
                        <p class="text-center">Strength</p>
                        <p class="text-center">{{$data['d_strength']}}</p>
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
     </div>
     </div>
@endsection

