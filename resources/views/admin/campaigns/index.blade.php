@extends('adminlte::page')
@section('plugins.Sweetalert2', true);

@section('title', 'Dashboard')

@section('content_header')
    <div class="container">
        <x-application-logo alt="logo" width="250" class="m-auto"/>
    </div>
@stop

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-3">
        {{ __('Campaigns') }}
    </h2>
    <x-flash/>
    <div class="row bg-white shadow-md rounded">
        <div class="text-first">
            <a href="javascript:void(0)" id="create">
                <x-form.default-button class="mt-4">
                    {{ __('Add') }}  {{ __('Campaign') }} <i class="fa-solid fa-plus ps-2"></i>
                </x-form.default-button>
            </a>
        </div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 pb-8">
            <table id="campaign" class="table-auto w-full text-sm">
                <thead>
                    <tr>
                        <th class="px-4 py-2">{{ __("Id") }}</th>
                        <th class="px-4 py-2">{{ __("Name") }}</th>
                        <th class="px-4 py-2">{{ __("Slug") }}</th>
                        <th class="px-4 py-2">{{ __("Description") }}</th>
                        <th class="px-4 py-2">{{ __("from") }}</th>
                        <th class="px-4 py-2">{{ __("to") }} </th>
                        <th class="px-4 py-2">{{ __("Actions") }}</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
    <!-- boostrap employee model -->
    <div class="modal fade" id="campaign-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Create').' '.__('Campaign') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="CampaignForm" name="CampaignForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <x-form.input-label for="name" :value="__('Name').'*'"/>
                            <x-form.text-input id="name" class="block mt-1 w-full" type="text" name="name"  required autofocus autocomplete="name"/>
                        </div>
                        <div class="form-group">
                            <x-form.input-label for="slug" :value="__('Slug').'*'"/>
                            <x-form.text-input id="slug" class="block mt-1 w-full" type="text" name="slug"  required autofocus autocomplete="slug"/>
                        </div>
                        <div class="form-group">
                            <x-form.input-label for="description" :value="__('Description').'*'"/>
                            <x-form.text-textarea id="description" class="block mt-1 w-full" name="description"
                                                  required autocomplete="description">
                            </x-form.text-textarea>
                        </div>
                        <div class="row">
                            <div class="col-1 col-sm-6 form-group">
                                <x-form.input-label for="date_from" :value="__('from').'*'"/>
                                <x-form.text-input id="date_from" class="block mt-1 w-full" type="date" name="date_from"  required autofocus autocomplete="date_from" />
                            </div>
                            <div class="col-1 col-sm-6 form-group">
                                <x-form.input-label for="date_to" :value="__('to').'*'"/>
                                <x-form.text-input id="date_to" class="block mt-1 w-full" type="date" name="date_to"  required autofocus autocomplete="date_to"/>
                            </div>
                        </div>
                        <x-form.default-button class="ms-4">
                            {{ __('Save') }}
                        </x-form.default-button>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- end bootstrap model -->
@stop

@section('css')
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js']);
    <!-- include summernote js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@stop

@section('js')
    <!-- include summernote js -->
    <script type="module" src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>


        $( document ).ready(function (event) {
            (function ($) {
                $.extend($.summernote.lang, {
                    'es-ES': {
                        font: {
                            bold: 'Negrita',
                            italic: 'Itálica',
                            underline: 'Subrayado',
                            strike: 'Tachado',
                            clear: 'Quitar estilo de fuente',
                            height: 'Altura de la línea',
                            size: 'Tamaño de la fuente'
                        },
                        image: {
                            image: 'Imagen',
                            insert: 'Insertar imagen',
                            resizeFull: 'Redimensionar a tamaño completo',
                            resizeHalf: 'Redimensionar a la mitad',
                            resizeQuarter: 'Redimensionar a un cuarto',
                            floatLeft: 'Flotar a la izquierda',
                            floatRight: 'Flotar a la derecha',
                            floatNone: 'No flotar',
                            dragImageHere: 'Arrastre una imagen aquó',
                            selectFromFiles: 'Seleccionar a partir de un archivo',
                            url: 'URL de la imagen'
                        },
                        link: {
                            link: 'Link',
                            insert: 'Insertar link',
                            unlink: 'Quitar link',
                            edit: 'Editar',
                            textToDisplay: 'Texto para mostrar',
                            url: 'Hacia que URL lleva el link?'
                        },
                        video: {
                            video: 'Video',
                            videoLink: 'Link para el video',
                            insert: 'Insertar video',
                            url: 'URL del video?',
                            providers: '(YouTube, Vimeo, Vine, Instagram, o DailyMotion)'
                        },
                        table: {
                            table: 'Tabla'
                        },
                        hr: {
                            insert: 'Insertar línea horizontal'
                        },
                        style: {
                            style: 'Estilo',
                            normal: 'Normal',
                            blockquote: 'Cita',
                            pre: 'Código',
                            h1: 'Título 1',
                            h2: 'Título 2',
                            h3: 'Título 3',
                            h4: 'Título 4',
                            h5: 'Título 5',
                            h6: 'Título 6'
                        },
                        lists: {
                            unordered: 'Lista con marcadores',
                            ordered: 'Lista numerada'
                        },
                        options: {
                            help: 'Ayuda',
                            fullscreen: 'Pantalla completa',
                            codeview: 'Ver código fuente'
                        },
                        paragraph: {
                            paragraph: 'Párrafo',
                            outdent: 'Menos tabulación',
                            indent: 'Más tabulación',
                            left: 'Alinear a la izquierda',
                            center: 'Alinear al centro',
                            right: 'Alinear a la derecha',
                            justify: 'Justificar'
                        },
                        color: {
                            recent: 'Color de fondo',
                            more: 'Más colores',
                            background: 'Fondo',
                            foreground: 'Fuente',
                            transparent: 'Transparente',
                            setTransparent: 'Fondo transparente',
                            reset: 'Restaurar',
                            resetToDefault: 'Restaurar por defecto'
                        },
                        shortcut: {
                            shortcuts: 'Atajos de teclado',
                            close: 'Cerrar',
                            textFormatting: 'Formato de texto',
                            action: 'Acción',
                            paragraphFormatting: 'Formatao de párrafo',
                            documentStyle: 'Estilo de documento'
                        },
                        history: {
                            undo: 'Deshacer',
                            redo: 'Rehacer'
                        }
                    }
                });
            })(jQuery);

            $('#description').summernote({
                lang: 'es-ES',
                tabsize: 2,
                height: 100
            });
            $('#create').on('click',function () {
                $('#CampaignForm').trigger("reset");
                $('#CampaignModal').html(" {{__('Add')}} .' '. {{ __('Campaign') }} ");
                $('#campaign-modal').modal('show');
                $('#id').val('');
                $('#description').summernote('code','');
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#campaign').DataTable({
                layout: {
                    topStart: 'buttons'
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
                responsive:true,
                processing: true,
                serverSide: true,
                ajax: "{{ url('admin/campaigns') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'slug', name: 'slug' },
                    { data: 'description' , name: 'description' },
                    { data: 'date_from', name: 'date_from' },
                    { data: 'date_to', name: 'date_to' },
                    { data: 'action', name: 'action', orderable: false},
                ],
                order: [[0, 'desc']]
            });

            $('#CampaignForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type:'POST',
                    url: "{{ url('admin/campaigns/store')}}",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $("#campaign-modal").modal('hide');
                        const oTable = $('#campaign').dataTable();
                        oTable.fnDraw(false);
                        $("#btn-save").html('Submit');
                        $("#btn-save"). attr("disabled", false);
                    },
                    error: function(xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });
            });

        });

        function editCampaign(id){

            $.ajax({
                type:"POST",
                url: "{{ url('admin/campaigns/edit') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    console.log(res);
                    $('#CampaignModal').html("{{ __('Edit') .' '. __('Campaign') }}");
                    $('#campaign-modal').modal('show');
                    $('#id').val(res.id);
                    $('#name').val(res.name);
                    $('#slug').val(res.slug);
                    $('#description').summernote('code',res.description);
                    $('#date_from').val(res.date_from);
                    $('#date_to').val(res.date_to);
                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }
            });
        }

        function deleteCampaign(id){
            if (confirm("Delete Record?") == true) {
                // ajax
                $.ajax({
                    type:"POST",
                    url: "{{ url('admin/campaigns/delete') }}",
                    data: { id: id  },
                    dataType: 'json',
                    success: function(res){
                        if (res['error']) {
                            Swal.fire({
                                type: 'error',
                                title: "Oops...",
                                text: res['error'],
                            });
                        }
                        const oTable = $('#campaign').dataTable();
                        oTable.fnDraw(false);
                    }
                });
            }
        }
    </script>


@endsection

