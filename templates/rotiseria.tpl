{include file="header.tpl"}


<ul>
    {if !isset($smarty.session.IS_ADMIN)}
    {foreach from=$foods item=$food }
        <li class='
        list-group-item d-flex justify-content-between align-items-center'>
        <span> <b>{$food->names}</b> --  ${$food->price} Contiene: {$food->descriptions}</span>
        
       </li>
    {/foreach}

    <p class="mt-3"><small>Mostrando {$count} comidas</small></p>
    {else}
     {include file="roti_form.tpl" foods=$foods product=$products}
        {foreach from=$foods item=$food }
            
            <li class='list-group-item d-flex justify-content-between align-items-center'>
            <span> <b>{$food->names}</b> --  ${$food->price} Contiene: {$food->descriptions} /// Es: {$food->product}</span>
            <div>
            <a href='showEdit/{$food->Id}' type='button' class='btn btn-success'>Editar</a>
            <a href='delete/{$food->Id}' type='button' class='btn btn-danger'>Borrar</a> 
            </div>
            </li>
        {/foreach}

    <p class="mt-3"><small>Mostrando {$count} comidas</small></p>
{/if}
</ul>
{include file="footer.tpl"}