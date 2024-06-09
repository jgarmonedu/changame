@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <div class="container">
        <x-application-logo alt="logo" width="250" class="m-auto"/>
    </div>
@stop

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-3">
        {{ __('Products') }}
    </h2>
    <div class="row">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <table id="products" class="table-auto w-full text-sm">
                <thead>
                <tr>
                    <th></th>
                    <th class="px-4 py-2">{{ __("Name") }}</th>
                    <th class="px-4 py-2">{{ __("Owner") }}</th>
                    <th class="px-4 py-2">{{ __("Category") }}</th>
                    <th class="px-4 py-2">{{ __("Players") }}</th>
                    <th class="px-4 py-2">{{ __("Age") }}</th>
                    <th class="px-4 py-2">{{ __("Play time") }} </th>
                    <th class="px-4 py-2">{{ __("Difficulty") }}</th>
                    <th class="px-4 py-2">{{ __("Conditions")['name'] }}</th>
                    <th class="px-4 py-2">{{ __("Year") }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td class="dt-control" data-title="{{ __("Description") }}" data-info="{{ $product->description }}"></td>
                        <td class="border px-4 py-2">{{ $product->name }}</td>
                        <td class="border px-4 py-2"><a href="/products/?owner={{ $product->owner->id }}">{{ $product->owner->name }}</a></td>
                        <td class="border px-4 py-2"><a href="/products/?category={{ $product->category->id }}">{{ $product->category->name }}</td>
                        <td class="border px-4 py-2">{{ $product->player_count_from .'-'. $product->player_count_to}}</td>
                        <td class="border px-4 py-2">{{ $product->from_age }}</td>
                        <td class="border px-4 py-2">{{ $product->play_time }}</td>
                        <td class="border px-4 py-2">{{ __('Difficulties')['types'][ucwords(\App\Enums\Difficulty::from($product->difficulty)->name)] }}</td>
                        <td class="border px-4 py-2">{{ __('Conditions')['types'][ucwords(\App\Enums\Condition::from($product->condition)->name)] }}</td>
                        <td class="border px-4 py-2">{{ $product->release_year }}</td>
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
        $( document ).ready(function () {
            const table = new DataTable ('#products', {
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
                pageLength: 8,
                lengthChange: true,
                searching: true,
                ordering: true,
                info: true,
                autoWidth: true,
                responsive: {
                    details: {
                        type: 'column'
                    }
                },
                columnDefs: [{
                    className: 'control',
                    targets: 0
                }],
                order: [1, 'asc']
            });

            table.rows('.parent').nodes().to$().find('td:first-child').trigger('click');
            // Add event listener for opening and closing detail

            // Add event listener for opening and closing details
            table.on('click', 'td.dt-control', function (e) {
                let tr = e.target.closest('tr');
                let row = table.row(tr);

                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                }
                else {
                    // Open this row
                    row.child(format($(this).data('info'))).show();
                }
            });
        });

        function format(data) {
            // `d` is the original data object for the row
            return (
                '<dl>' +
                data +
                '</dl>'
            );
        }


    </script>

@stop
