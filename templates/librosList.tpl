{include file="header.tpl"}

<h1>{$titulo}</h1>
<div>
    <a href="Agregar_Libro" type='button' class='btn btn-primary ml-auto'>Agregar Libro</a>
</div>

<div>
    <form action="Filtrar" method="POST">
        <input type="hidden" name="genero" id="">
        <select name="genero" id="genero">
            <option value="0">Seleccione el Genero</option>
            {foreach from=$generos item=$genero}
                <option value="{$genero->id}">{$genero->genero}</option>
            {/foreach}
        </select>
        <button type="submit" class='btn btn-primary ml-auto'>Filtrar</button>
    </form> 
</div>

<table class="table">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Obra</th>
            <th>Autor</th>
            <th>Precio</th>
            <th>Genero</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$libros item=$libro}
            <tr>
                <td>{$libro->id}</td>
                <td>{$libro->obra}</td>
                <td>{$libro->autor}</td>
                <td>{$libro->precio}</td>
                {foreach from=$generos item=$genero}
                    {if $genero->id == $libro->id_genero}
                        <td>{$genero->genero}</td>
                    {/if}
                {/foreach}
                <td>
                    <a href="Ver_Libro/{$libro->id}" type='button' class='btn btn-primary ml-auto'>VER</a>
                    <a href="Editar_Libro/{$libro->id}" type='button' class='btn btn-success ml-auto'>EDITAR</a>
                    <a href="Eliminar_Libro/{$libro->id}" type='button' class='btn btn-danger ml-auto'>ELIMINAR</a>
                    
                </td>
            </tr>   
        {/foreach}

    </tbody>
</table>

