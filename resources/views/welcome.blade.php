@extends('layouts.app')

@section('page_css_libraries')
<link type="text/css" rel="stylesheet" media="screen" href="{{ asset('assets/css/webcam/main.css') }}" />
@stop

@section('content')
<div class="container">
    <div class="row">
        {!! Form::open(array('route' => 'appointment.store', 'id' => 'scheme_store', 'class' => 'form-horizontal row-border', 'files' => true)) !!}
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Book an appointment</div>
                <div class="panel-body">
                        @include('appointments._form')
                        <div class="form-actions" style="margin-left:180px;">
                            {!! Form:: submit('Save', ['class' => 'disabled btn btn-success apptBook',]) !!}
                            {!! Form:: submit('Print', ['class' => 'disabled btn btn-success apptBook', ]) !!}
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="camera">
                <video id="video">Video stream not available.</video>
                <button id="startbutton">Click</button> 
            </div>
            <canvas id="canvas">
            </canvas>
            <div class="output">
                <img name="web_img" src="" id="photo" alt="The screen capture will appear in this box.">
            </div>
        </div>
        
        {!!form::close()!!}
    </div>
</div>
@endsection

@section('page_js_libraries')
<script src="{{ asset('assets/js/webcam/capture.js') }}"></script>
<script>
 document.getElementById("startbutton").addEventListener("click", function() {
   document.getElementById("photo").onload = function() {
       $('#photoImg').val(this.src);
       $('.apptBook').removeClass('disabled');
   };          
 })
</script>
@stop
