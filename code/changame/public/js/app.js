
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
    console.log( "ready!" );
    $("#thumbnail").fileinput({
        browseClass: "btn text-white bg-blue-950 hover:bg-sky-900 hover:border-transparent transition ease-in-out duration-150",
        showUpload: false,
        autoReplace: true,
        showCaption: true,
        maxFileSize: 1000,
        showClose: false,
        overwriteInitial: true,
        initialPreview: ($('#inputLogoActual').val()!='')?[$('#inputLogoActual').val()]:false,
        initialPreviewAsData: true,
        initialPreviewShowDelete: false,
        allowedFileExtensions: ["jpg", "jpeg", "png", "gif"]
    });
    $('#thumbnail').on('change', function(e) { $('#inputLogoActual').val(""); });
    $('#thumbnail').on('fileclear', function(e) { $('#inputLogoActual').val(""); });
});
