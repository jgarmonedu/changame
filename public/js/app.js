$( document ).ready(function (event) {

    $('#noOwner').on('change', function(e){
        $('#noOwnerSearch').submit();
    })

    console.log( "ready!" );
    $("#thumbnail").fileinput({
        browseClass: "btn text-white bg-blue-950 hover:bg-sky-900 hover:border-transparent transition ease-in-out duration-150",
        language: 'es',
        showUpload: false,
        validateInitialCount: true,
        autoReplace: true,
        showCaption: true,
        maxFileSize: 1000,
        maxFileCount: 3,
        overwriteInitial: true,
        initialPreview: ($('#inputLogoActual').val()!='')?[$('#inputLogoActual').val()]:false,
        initialPreviewAsData: true,
        initialPreviewShowDelete: false,
        allowedFileExtensions: ["jpg", "jpeg", "png", "gif"]
    });
    $('#thumbnail').on('change', function(e) { $('#inputLogoActual').val(""); });
    $('#thumbnail').on('fileclear', function(e) { $('#inputLogoActual').val(""); });

    // Gestor de imagenes de producto.
    $('.thumbnail').click(function(){
        let newSrc = $(this).attr('src');   // Obtener la fuente de la imagen pequeña
        $('#mainImage').attr('src', newSrc);     // Cambiar la fuente de la imagen principal
        $('#mainModalImage').attr('src', newSrc);  // Cambiar la fuente de la imagen modal
    });

    $('#country').val(''); // por defecto al cargar página
    $.getJSON("/data/countries.json", function (data) {
        $.each(data['countries'], function () {
            $('#country').append('<option value="' + this.es_name + '">' + this.es_name + '</option>');
        });
    });

});



