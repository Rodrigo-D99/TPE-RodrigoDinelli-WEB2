{include file="header.tpl"}
{include file="roti_form.tpl"}

<ul>
    {foreach from=$foods item=$food }
        <li class='
        list-group-item d-flex justify-content-between align-items-center'>
        <span> <b>{$food->names}</b> --  ${$food->price} Contiene: {$food->descriptions}</span>
       <a href='delete/{$food->id}' type='button' class='btn btn-danger'>Borrar</a> 
       </li>
    {/foreach}

    <p class="mt-3"><small>Mostrando {$count} comidas</small></p>
    
</ul>
{include file="footer.tpl"}