{include file="header.tpl"}

<h1>{$titulo}</h1>
<div>
    {if $administradorIsLogged==true}
        <a href="Agregar_Genero" type='button' class='btn btn-primary ml-auto'>Agregar genero</a>
    {/if}
</div>



<table class="table">
    <thead>
        <tr>
            <th>Genero</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$generos item=$genero}
            <tr>
                   
                <td>{$genero->genero}</td>
        
                
                {if $administradorIsLogged==true}
                    <td>    
                    <a href="Ver_genero/{$genero->id}" type='button' class='btn btn-primary ml-auto'>VER</a>
                    <a href="Editar_genero/{$genero->id}" type='button' class='btn btn-success ml-auto'>EDITAR</a>
                    <a href="Eliminar_genero/{$genero->id}" type='button' class='btn btn-danger ml-auto'>ELIMINAR</a>
                    </td>
                {else}
                    <td>
                    <a href="Ver_genero/{$genero->id}" type='button' class='btn btn-primary ml-auto'>VER</a>
                    </td>
                   
                
                {/if}
                
            </tr>   
        {/foreach}
    

    </tbody>
</table>


    
            
        
  