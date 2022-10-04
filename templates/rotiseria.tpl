{include file="header.tpl"}
{include file="roti_form.tpl"}

<ul>
    {foreach from=$foods item=$food }
        <li>
        <span> <b>{$food->name}</b> - {$food->price}</span>
        </li>
    {/foreach}

    <p class="mt-3"><small>Mostrando {$count} comidas</small></p>
</ul>
{include file="footer.tpl"}