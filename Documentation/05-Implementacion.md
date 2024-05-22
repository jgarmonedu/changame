# Implementación

## Definición de filtrados

Uno de los problemas que nos hemos encontrado es determinar los campos por los que se quiere establece una consulta de productos. Esta dificultad se acentúa en el hecho de optar por un búsqueda de datos a medida que se introducen valores en los campos. Se podría haber hecho con alternativas (javascript, jquery,..) Sin embargo, se opta por establecer un formulario individual para cada campo, de forma si se ha realizado alguna búsqueda por algún otro campo previamente, este se introduce com campo oculta para volver a ser en viado via _request_. Se ha definido, por tanto, un componente visual denominado _<x-form.input-search>_ al que se le pasa el nombre campo, el tipo, la doniminación y el array de campos a filtar (viene desde el **contolador ProductController**)

```php
$filters = ['search', 'category', 'owner', 'from_age', 'play_time', 'release_year'];
        return view( 'products.index', [
            'filters' => $filters,
            'products' => Product::latest()->filter(
                request($filters)
            )->paginate(8)->withQueryString()
        ]);
```
<small>método index de clase ProductController.php</small>

Las consultas de filtrado se hacen a través del **modelo Product**
```php
 $query->when($filters['from_age'] ?? false, fn($query, $from_age) 
        => $query->where(fn($query) 
        => $query->where('from_age','>=',$from_age)
        )
);
```

Por último tenemos es el componente que se incorpora dentro la **vista Index** de consulta de productos.

```php
@props(['name','type','text','filters'])

<form method="GET" action="/products/?{{ http_build_query(request()->except('category','page')) }}">
    @foreach ($filters as $filter)
        @if (request($filter) && $filter!=$name)
            <input type="hidden" name="{{$filter}}" value="{{ request($filter) }}">
        @endif
    @endforeach
    <div class="relative lg:inline-flex items-center rounded-xl gap-2">
        <x-form.text-input id="{{ $name }}" class="block mt-1 w-full" type="{{ $type }}" name="{{ $name }}"
                           autofocus autocomplete="{{ $name }}" placeholder=" {{ __($text) }}"
                           value="{{ request($name) }}"/>
    </div>
</form>
```
<small>Componente de vista input-seaarch</small>

## Definición de datos Enum

## Control de Autorización de acceso

## Control de incluir en Favoritos

## Control de incluir en Acuerdos

## Control de aportaciones en Campañas

## Instalación de API MailChimp para Newsletter

## Aplicación de paquetes

### Paquete FileInput
### Paquete DataTables
### Paquete Pagination

