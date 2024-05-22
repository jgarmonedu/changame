# Conclusiones

Cosas que hemos aprendido nuevas, cosas que haríamos de otra manera con lo que sabemos, qué haremos después...

# Dificultades encontradas

Planteamos dificultades que nos hemos ido encontrando durante el desarrollo del aplicativo. 

## Instalación de librería JQuery

La instalación y configuración de Jquery se ha realizado conjuntamente con la bootstrap. Teniendo en cuenta que Laravel se ha instalando sobre la [agrupación de códifo de Vite](https://laravel.com/docs/11.x/vite), esta configuración conlleva realizar los siguientes pasos.

```javascript
// Configutación de resources\js\app.js 

import jQuery from 'jquery';
window.jQuery = window.$ = jQuery;

import './bootstrap';
import * as bootstrap from 'bootstrap';
```


```javascript
// Configutación de resources\sass\app.scss

@import "bootstrap/scss/bootstrap";
```

la llamada a la configuración se realiza a través de la sentencia 

```javascript
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

El problema radica en que cuando se hace una llamada en una archivo público de javascript, el sistema no reconoce la llamada a la función 

```javascript
$(document).ready(function (event) {
    // código javascript jquery
});
```

Para solucionar el problema se requiere que la llamada a script propio dentro del código se debe hacer como un módulo, de forma que el render de vite lo interprete en el orden correcto.

```javascript
 <script type="module" src="/js/app.js"></script>
```

## Modales de Bootstrap en paquetes instalados


## Filtrado en las búsqueda de productos 

Multitud de campos para filtrar campos.


