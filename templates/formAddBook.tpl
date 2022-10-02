{include file="header.tpl"}

<h1>{$titulo}</h1>

<form action="{$accion}" method="POST">
    {if $accion == "Mandar_BD"}
        <div>
            <input type="text" name="id" id="" value="" hidden>
        </div>
        <div>
            <label for="obra">Obra:</label>
            <input type="text" name="obra" id="" value="">
        </div>
        <div>
            <label for="autor">Autor:</label>
            <input type="text" name="autor" id="" value="">
        </div>
        <div>
            <label for="precio">Precio:</label>
            <input type="text" name="precio" id="" value="">
        </div>
        <div>
            <label for="genero">Genero:</label>
            <input type="hidden" name="genero" id="">
            <select name="genero" id="genero">
                <option value="0">Seleccione el Genero</option>
                {foreach from=$generos item=$genero}
                    <option value="{$genero->id}">{$genero->genero}</option>
                {/foreach}
            </select>
        </div>
                
        <div>
            <button type="submit" class='btn btn-primary ml-auto'>{$boton}</button>
            <a href="Libros" type='button' class='btn btn-primary ml-auto'>Cancelar</a>
        </div>

    {elseif $accion == "Modificar_Registro"}
        <div>
            <input type="text" name="id" id="" value="{$libro->id}" hidden>
        </div>
        <div>
            <label for="obra">Obra:</label>
            <input type="text" name="obra" id="" value="{$libro->obra}">
        </div>
        <div>
            <label for="autor">Autor:</label>
            <input type="text" name="autor" id="" value="{$libro->autor}">
        </div>
        <div>
            <label for="precio">Precio:</label>
            <input type="text" name="precio" id="" value="{$libro->precio}">
        </div>
        <div>
            <label for="genero">Genero:</label>
            <input type="hidden" name="genero" id="">
            <select name="genero" id="genero">
                <option value="{$generoLibro->id}">{$generoLibro->genero}</option>
                {foreach from=$generos item=$genero}
                    <option value="{$genero->id}">{$genero->genero}</option>
                {/foreach}
            </select>
        </div>
        <div>
            <button type="submit" class='btn btn-primary ml-auto'>{$boton}</button>
            <a href="Libros" type='button' class='btn btn-primary ml-auto'>Cancelar</a>
        </div>
            
    {/if}


</form>