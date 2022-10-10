{include file="header.tpl"}

<h1>{$titulo}</h1>

<form action="{$accion}" method="POST">
{if $accion == "guardar_en_bd"}
        <div>
            <label for="genero">Genero:</label>
            <input type="text" name="genero" id="" value="">
        </div>
        
               
        <div>
            <button type="submit" class='btn btn-primary ml-auto'>{$boton}</button>
            <a href="Generos" type='button' class='btn btn-primary ml-auto'>Cancelar</a>
        </div>

{else   $accion == "Modificar_Registro_genero"}
         <div>
            <input type="text" name="id" id="" value="{$genero->id}" hidden>
        </div>
        <div>
            <label for="genero">Generossss:</label>
            <input type="text" name="genero" id="" value="{$genero->genero}">
        </div>

           
            <div>
                <button type="submit" class='btn btn-primary ml-auto'>{$boton}</button>
                <a href="Generos" type='button' class='btn btn-primary ml-auto'>Cancelar</a>
            </div>
                        

{/if}     
   
    


</form>
