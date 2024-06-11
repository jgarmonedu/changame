@extends('adminlte::page')
@section('plugins.Sweetalert2', true);
@section('title', 'Dashboard')

@section('content_header')
    <div class="container">
        <x-application-logo alt="logo" width="250" class="m-auto"/>
    </div>
    @include('sweetalert::alert')
@stop

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-3">
        {{ __('Categories') }}
    </h2>
    <x-flash/>
    <div class="row bg-white shadow-md rounded">
        <div class="text-first">
            <a href="javascript:void(0)" id="create">
                <x-form.default-button class="mt-4">
                    {{ __('Add') }}  {{ __('Category') }} <i class="fa-solid fa-plus ps-2"></i>
                </x-form.default-button>
            </a>
        </div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 pb-8 w-4/6">
            <table id="category" class="table-auto w-full text-sm display compact">
                <thead>
                    <tr>
                        <th class="px-4 py-2">{{ __("Id") }}</th>
                        <th class="px-4 py-2">{{ __("Name") }}</th>
                        <th class="px-4 py-2">{{ __("Slug") }}</th>
                        <th class="px-4 py-2">{{ __("Actions") }}</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
    <!-- boostrap employee model -->
    <div class="modal fade" id="category-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="categoryForm" name="categoryForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <x-form.input-label for="name" :value="__('Name').'*'"/>
                            <x-form.text-input id="name" class="block mt-1 w-full" type="text" name="name"  required autofocus autocomplete="name"/>
                        </div>
                        <div class="form-group">
                            <x-form.input-label for="slug" :value="__('Slug').'*'"/>
                            <x-form.text-input id="slug" class="block mt-1 w-full" type="text" name="slug"  required autofocus autocomplete="slug"/>
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
@stop

@section('js')
    <!-- include summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        $( document ).ready(function () {

            $('#create').on('click',function () {
                $('#categoryForm').trigger("reset");
                $('#categoryModal').html(" {{__('Add')}} .' '. {{ __('category') }} ");
                $('#modal-title').html("{{ __('Add').' '.__('Category') }}");
                $('#category-modal').modal('show');
                $('#id').val('');
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#category').DataTable({
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
                pageLength: 5,
                ajax: "{{ url('admin/categories') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'slug', name: 'slug' },
                    { data: 'action', name: 'action', orderable: false},
                ],
                order: [[0, 'asc']]
            });

            $('#categoryForm').submit(function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                $.ajax({
                    type:'POST',
                    url: "{{ url('admin/categories/store')}}",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: () => {
                        $("#category-modal").modal('hide');
                        const oTable = $('#category').dataTable();
                        oTable.fnDraw(false);
                        $("#btn-save").html('Submit').attr("disabled", false);
                    },
                    error: function(xhr) {
                        alert(xhr.responseText);
                    }
                });
            });

        });

        function editCategory(id){

            $.ajax({
                type:"POST",
                url: "{{ url('admin/categories/edit') }}",
                data: { id: id },
                dataType: 'json',
                success: function(res){
                    console.log(res);
                    $('#categoryModal').html("{{ __('Edit') .' '. __('category') }}");
                    $('#modal-title').html("{{ __('Edit').' '.__('Category') }}");
                    $('#category-modal').modal('show');
                    $('#id').val(res.id);
                    $('#name').val(res.name);
                    $('#slug').val(res.slug);
                },
                error: function(xhr) {
                    alert(xhr.responseText);
                }
            });
        }

        function deleteCategory(id){
            if (confirm("Delete Record?") == true) {
                // ajax
                $.ajax({
                    type:"POST",
                    url: "{{ url('admin/categories/delete') }}",
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
                        const oTable = $('#category').dataTable();
                        oTable.fnDraw(false);
                    }
                });
            }
        }
    </script>


@endsection

