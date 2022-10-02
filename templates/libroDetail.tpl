{include file="header.tpl"}

<div>
    <h1>{$titulo}</h1>

    <li>Obra: {$libro->obra}</li>
    <li>Autor: {$libro->autor}</li>
    <li>Precio: {$libro->precio}</li>
    <li>Genero: {$libro->id_genero}</li>

    <a href="Libros" type='button' class='btn btn-primary ml-auto'>VOLVER</a>

</div>

