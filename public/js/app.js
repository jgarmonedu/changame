
function defineJQueryPlugin(plugin) {
    const name = plugin.NAME;
    const JQUERY_NO_CONFLICT = $.fn[name];
    $.fn[name] = plugin.jQueryInterface;
    $.fn[name].Constructor = plugin;
    $.fn[name].noConflict = () => {
        $.fn[name] = JQUERY_NO_CONFLICT;
        return plugin.jQueryInterface;
    }
}

defineJQueryPlugin(bootstrap.Modal);
defineJQueryPlugin(bootstrap.Tooltip);
defineJQueryPlugin(bootstrap.Popover);

$( document ).ready(function (event) {
    /*swal({
        title: "Mensaje con cierre automático",
        text: "Se cerrará en 3 segundos.",
        icon: "success",
        timer: 3000,
        button: "Ok"
    });*/

    $('#noOwner').on('change', function(e){
        $('#noOwnerSearch').submit();
    })

    $('#example').DataTable({
        // Add any customization options here
    });

    console.log( "ready!" );
    $("#thumbnail").fileinput({
        browseClass: "btn text-white bg-blue-950 hover:bg-sky-900 hover:border-transparent transition ease-in-out duration-150",
        language: 'es',
        showUpload: false,
        autoReplace: true,
        showCaption: true,
        maxFileSize: 1000,
        maxFileCount: 3,
        showClose: false,
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
    });

    // ClassicEditor.create(document.querySelector('#description'), {
    //     language: 'es-es',
    //     toolbar: {
    //         items: [
    //             'heading',
    //             '|', 'bold', 'italic', 'link',
    //             '|', 'undo', 'redo',
    //             '|', 'bulletedList', 'numberedList', 'blockQuote'
    //         ],
    //         shouldNotGroupWhenFull: true,
    //     },
    //     height: 200,
    // }).then(editor => {
    //     this.editor = editor
    // }).catch(e=>{
    //     console.log(e)
    // });
});
