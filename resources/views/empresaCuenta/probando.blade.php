@extends('adminlte::page')

@section('title', 'Cuentas')

@section('content_header')

@php
    //SECTION TITULO PRINCIPAL
        $SECT_PRINC = "274c77";
        $SECT_PRINC_TEXT = "ffffff";

    //BOTON AGREGAR CUENTA
        $BUTTON_AGRE = "007200";
        $TEXT_BUTTON_AGRE = "ffffff";
@endphp

<section class="p-3 rounded" style="margin-bottom: 15px;margin-left: 20px;margin-right: 20px;background-color:#{{$SECT_PRINC}}; color: #{{$SECT_PRINC_TEXT}}">
    <h1>CUENTAS</h1>
</section>

@stop

@section('content')






@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop