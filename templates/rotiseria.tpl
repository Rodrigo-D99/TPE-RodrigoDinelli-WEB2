{include file="header.tpl"}


<ul>
    {if !isset($smarty.session.IS_ADMIN)}
    {foreach from=$foods item=$food }
        <li class='
        list-group-item d-flex justify-content-between align-items-center'>
        <a href="details/{$food->id}">{$food->names}</a>
        
        
       </li>
    {/foreach}

    <p class="mt-3"><small>Mostrando {$count} comidas</small></p>
    {else}
     {include file="roti_form.tpl" foods=$foods product=$products}
        {foreach from=$foods item=$food }
            
            <li class='list-group-item d-flex justify-content-between align-items-center'>
            <a href="details/{$food->id}" class='btn btn-info'>{$food->names}</a>
           
            <div>
            <a href='showEdit/{$food->id}' type='button' class='btn btn-success'>Editar</a>
            <a href='delete/{$food->id}' type='button' class='btn btn-danger'>Borrar</a> 
            </div>
            </li>
        {/foreach}

    <p class="mt-3"><small>Mostrando {$count} comidas</small></p>
{/if}
</ul>
{include file="footer.tpl"}