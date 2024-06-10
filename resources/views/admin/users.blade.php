@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <div class="container">
        <x-application-logo alt="logo" width="250" class="m-auto"/>
    </div>
@stop

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-3">
        {{ __('Users') }}
    </h2>
    <div class="row">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <table id="users" class="table-auto w-full">
                <thead>
                <tr>
                    <th class="px-4 py-2">{{ __("Name") }}</th>
                    <th class="px-4 py-2">{{ __("Email") }}</th>
                    <th class="px-4 py-2">{{ __("Country") }}</th>
                    <th class="px-4 py-2">{{ __("Region") }}</th>
                    <th class="px-4 py-2">{{ __("City") }} </th>
                    <th class="px-4 py-2">{{ __("Postal Code") }}</th>
                    <th class="px-4 py-2">{{ __("Address") }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2">{{ $user->country }}</td>
                        <td class="border px-4 py-2">{{ $user->region }}</td>
                        <td class="border px-4 py-2">{{ $user->city }}</td>
                        <td class="border px-4 py-2">{{ $user->postal_code }}</td>
                        <td class="border px-4 py-2">{{ $user->address }}</td>
                    </tr>
                @endforeach
                <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>

    </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin.css"> --}}
    {{--  <link href="/css/admin.css" rel="stylesheet" type="text/css"> --}}
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.10/pdfmake.min.js"></script>
    <script>
        $( document ).ready(function (event) {
            $('#users').DataTable({
                layout: {
                    topStart: 'buttons',
                },
                buttons: [],
                language: {
                    "Processing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                paging: true,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: true,
                responsive:true
            });

        });
    </script>

@stop
