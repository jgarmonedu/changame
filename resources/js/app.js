import jQuery from 'jquery';
window.jQuery = window.$ = jQuery;

import './bootstrap';
import * as bootstrap from 'bootstrap';

import 'laravel-datatables-vite';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import Chart from 'chart.js/auto';
import 'chartjs-adapter-moment';
window.Chart = Chart;


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

    $('#noOwner').on('change', function(e){
        $('#noOwnerSearch').submit();
    })

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

    $('#country').val(''); // por defecto al cargar página
    $.getJSON("/data/countries.json", function (data) {
        $.each(data['countries'], function () {
            $('#country').append('<option value="' + this.es_name + '">' + this.es_name + '</option>');
        });
    });

});
