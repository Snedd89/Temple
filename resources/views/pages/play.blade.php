@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-6">
            <h3>{{$data['name']}}</h3>
        </div>
        <div class="col-xs-6">
            <div class="play-progress progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{$data['hp_percent']}}"
                    aria-valuemin="0" aria-valuemax="{{$data['max_hp']}}" 
                    style="width:{{$data['hp_percent']}}%">
                    <span>{{$data['hp']}}/{{$data['max_hp']}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="console" style="overflow-y: scroll;">
        <p class="console-text">
        @foreach($data as $value)
        @endforeach 
        </p>
    </div>
    <div class="play-buttons">
        <a href="#" class="btn btn-primary">Button</a>
        <a href="#" class="btn btn-primary">Button</a>
        <a href="#" class="btn btn-primary">Button</a>
    </div>
    <div class="play-ui text-center">
        <div class="row">
            <div class="col-xs-3">
                <a href="#" id="btn-NW" onClick="travel(event)" class="btn btn-primary ui-btn">NW</a>
            </div>
            <div class="col-xs-6">
                <a href="#" id="btn-N" onClick="travel(event)" class="btn btn-primary ui-btn">&nbsp;N&nbsp;</a>
            </div>
            <div class="col-xs-3">
                <a href="#" id="btn-NE" onClick="travel(event)" class="btn btn-primary ui-btn">NE</a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3">
                <a href="#" id="btn-W" onClick="travel(event)" class="btn btn-primary ui-btn">&nbsp;W&nbsp;</a>
            </div>
                <div class="col-xs-6">
                    <div class="mini-map">
                        <div class="sector"></div>
                        <div class="sector"></div>
                        <div class="sector"></div>
                        <div class="sector"></div>
                        <div class="sector"></div>
                        <div class="sector"></div>
                        <div class="sector"></div>
                        <div class="sector"></div>
                        <div class="sector"></div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <a href="#" id="btn-E" onClick="travel(event)" class="btn btn-primary ui-btn">&nbsp;E&nbsp;</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                <a href="#" id="btn-SW" onClick="travel(event)" class="btn btn-primary ui-btn">SW</a>
                </div>
                <div class="col-xs-6">
                    <a href="#" id="btn-S" onClick="travel(event)" class="btn btn-primary ui-btn">&nbsp;S&nbsp;</a>
                </div>
                <div class="col-xs-3">
                    <a href="#" id="btn-SE" onClick="travel(event)" class="btn btn-primary ui-btn">SE</a>
                </div>
            </div>
        </div>
    </div>
@endsection

