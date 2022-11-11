{include file="header.tpl" }

<h1>{$detail}</h1>

<ul class="list-group">
{foreach from=$details item=$detail}
      <li class="list-group-item list-group-item-success">Nombre: {$detail->names}</li>
      <li class="list-group-item list-group-item-success">Precio: {$detail->price}</li>
      <li class="list-group-item list-group-item-success">Descripción: {$detail->descriptions}</li>
{/foreach}

</ul>