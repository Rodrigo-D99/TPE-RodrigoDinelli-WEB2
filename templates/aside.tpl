<aside>
    <ul class="list-group">
        <li class="top list-group-item">Categorias</li>
            {foreach from=$categories item=$category}
                <li class="list-group-item">
                    <form method="POST" action="filter">
                        <input type="hidden" name="id" value="{$category->id_category}">
                        <button type="submit" id="{$category->id_category}">{$category->category}</button>
                    </form>
                </li>   
            {/foreach}
        <li class="list-group-item"><a href="">Ver todos</a></li>
    </ul>
</aside>