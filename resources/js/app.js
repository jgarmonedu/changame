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



