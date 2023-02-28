@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    

@stop

@section('content')



    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        
        <div class="carousel-inner">

            
            
            <div class="carousel-item active">
                <img class="d-block w-100" src="../storage/Img_Inicio/aplicacionweb.jpg" alt="First slide" style="height: 45vh;width: 100%;object-fit: cover;">
                

                <div class="carousel-caption d-none d-md-block">
                    <h1>Administración integral de instalaciones</h1>
                    <h4>Genere ahorros profesionalizando su servicio</h4>
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block w-100" src="../storage/Img_Inicio/metodologias-agiles.jpg" alt="First slide" style="height: 45vh;width: 100%;object-fit: cover;">
                

                <div class="carousel-caption d-none d-md-block">
                    <h1>Seguridad y salud ocupacional</h1>
                    <h4>Control de las actividades de los proveedores e implementación de las OHSAS 18001</h4>
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block w-100" src="../storage/Img_Inicio/fullstack.png" alt="First slide" style="height: 45vh;width: 100%;object-fit: cover;">
                

                <div class="carousel-caption d-none d-md-block">
                    <h1>Mantenimiento integral</h1>
                    <h4>Mantenimiento preventivo y mantenimiento correctivo</h4>
                </div>
            </div>


        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="form-row" style="margin-top: 50px;">

        <div class="form-group col-md-6" style="display:flex;justify-content:center;align-items:center">

        </div>

        <div class="form-group col-md-6" style="display:flex;justify-content:center;align-items:center">

            <div class="form-row">
                <div class="col-md-6" style="display:flex;justify-content:center;align-items:center">
                    <img src="../storage/Img_Inicio/soporteLogo.png" alt="Card image cap" style="width: 35vh;">
                </div>

                <div class="col-md-6" style="display:flex;justify-content:center;align-items:center;">
                     <p style="color: rgb(17, 69, 167);margin-left: 7vh;margin-right: 7vh;font-size: 2vh;">De tener algun problema con el sistema por favor comunicate al siguiente contacto: <br><br>
                        <strong>SOPORTE</strong><br>

                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                        </svg>
                        Christian Jara<br>

                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                            <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        </svg>
                        984754120<br>
                        
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                            <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z"/>
                            <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z"/>
                        </svg>
                        <a href="mailto:cjara@binswanger.com.pe">cjara@binswanger.com.pe</a><br>
                    </p>
                </div>
            </div>
        </div>


    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop