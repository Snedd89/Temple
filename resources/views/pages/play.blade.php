@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-6">
            <h3>{{$name}}</h3>
        </div>
        <div class="col-xs-6">
            <div class="play-progress progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="{{$hp_percent}}"
                    aria-valuemin="0" aria-valuemax="{{$max_hp}}" 
                    style="width:{{$hp_percent}}%">
                    <span>{{$hp}}/{{$max_hp}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="console" style="overflow-y: scroll;">
        <p class="console-text">
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pharetra lacus nisl. Morbi dictum purus nibh, at eleifend erat sollicitudin non. Vivamus tincidunt odio massa, nec pharetra mi fermentum sed. Praesent dui felis, molestie et pretium eu, malesuada vel risus. Nunc ac diam nulla. Duis non massa libero. Nam a pretium sapien, eu mattis odio.

Cras elementum gravida arcu id viverra. Vestibulum fermentum sapien id urna convallis, viverra rhoncus felis mattis. Pellentesque pellentesque elit quis quam hendrerit maximus. Proin tincidunt finibus eros, quis aliquam libero. Pellentesque posuere metus ut lobortis cursus. Fusce vel tellus nisi. Nunc lacus lorem, egestas vel ante ac, egestas porttitor lectus. Curabitur fringilla est et mauris tempus dignissim. Suspendisse feugiat tellus elit, vitae sollicitudin enim faucibus quis. Suspendisse porttitor quam vitae dui sollicitudin malesuada nec non est. Nullam eros ante, commodo a rhoncus et, interdum vitae orci. Proin semper auctor finibus. Ut commodo sed tortor quis congue. Maecenas vulputate vulputate pellentesque. Curabitur mi enim, eleifend id lobortis non, ultricies vel tellus.

Suspendisse feugiat sem quis gravida imperdiet. Aliquam ligula lectus, ultricies eu euismod sed, vehicula vel lectus. Suspendisse interdum sed felis eget ultrices. Sed eget quam vel mi hendrerit porttitor. Praesent ut iaculis elit. Phasellus accumsan erat ex, ut ullamcorper quam pharetra at. Vestibulum efficitur turpis sed arcu molestie, a sagittis tortor mattis. Vivamus consequat neque turpis, ac facilisis purus convallis nec. Etiam quis dictum mauris.

Morbi rhoncus justo varius, interdum dolor sed, eleifend erat. Suspendisse potenti. Donec varius elit ut imperdiet consectetur. Nunc eu tristique massa. Maecenas felis sem, cursus ut augue non, eleifend congue tortor. Vivamus rutrum velit eu orci fringilla congue quis ut nisi. Nullam lorem purus, ullamcorper ut semper ac, rutrum non enim. Nunc vitae elit sed nisl consequat tempor.

Duis maximus justo ac lobortis auctor. Sed porttitor, lacus vitae porttitor egestas, metus risus consectetur ante, eget convallis augue ex in ante. Mauris nisi sapien, placerat vel ullamcorper at, condimentum eget metus. Proin vulputate pellentesque mi nec elementum. Nulla elementum imperdiet mauris a bibendum. Morbi enim massa, vehicula non enim ac, commodo vulputate tortor. Nunc euismod vitae ante id blandit. Proin venenatis lorem lorem, vel vehicula erat luctus vitae. In a risus sollicitudin, rhoncus sapien ullamcorper, vestibulum odio. Nullam facilisis ultricies ligula, in elementum mauris consectetur in. Maecenas mollis felis enim, ac placerat lorem suscipit eget. Mauris a nisi augue. Aenean condimentum lorem eu turpis aliquet, non tempus ex cursus. Quisque viverra arcu ac elementum viverra. Nullam efficitur euismod justo, id aliquam augue egestas ac. Sed pretium turpis orci, eu malesuada elit viverra non. 
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
                <a href="#" class="btn btn-primary ui-btn">NW</a>
            </div>
            <div class="col-xs-6">
                <a href="#" class="btn btn-primary ui-btn">&nbsp;N&nbsp;</a>
            </div>
            <div class="col-xs-3">
                <a href="#" class="btn btn-primary ui-btn">NE</a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3">
                <a href="#" class="btn btn-primary ui-mid-btn">&nbsp;W&nbsp;</a>
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
                    <a href="#" class="btn btn-primary ui-mid-btn">&nbsp;E&nbsp;</a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                <a href="#" class="btn btn-primary ui-btn">SW</a>
                </div>
                <div class="col-xs-6">
                    <a href="#" class="btn btn-primary ui-btn">&nbsp;S&nbsp;</a>
                </div>
                <div class="col-xs-3">
                    <a href="#" class="btn btn-primary ui-btn">SE</a>
                </div>
            </div>
        </div>
    </div>
@endsection

