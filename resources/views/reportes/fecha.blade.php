@extends('adminlte::page')

@section('scripts_head')
@include('includes.head')
@stop

@section('title', 'Reportes por fecha')

@section('content_header')

<div class="row float-right mr-1">

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Reportes</li>
            <li class="breadcrumb-item active" aria-current="page">Reporte por fecha</li>
        </ol>
    </nav>
</div>
<br>
@stop

@section('content')


@livewire('reporte.reporte-fecha')




@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
<script>

    window.addEventListener("alert-error-imprimir", (event) => {

        Swal.fire({
            icon: "error",
            title: "Oops... ocurrió un error",
            text:"Verifica la conexión de la impresora o comunícate con soporte técnico!",
        });
    });
        </script>

@stop
