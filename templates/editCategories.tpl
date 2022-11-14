{include file='head.tpl'}
{include file='header.tpl'}
<div class="container d-flex justify-content-center m-5">
    <table class="table-dark ">
        <thead>
            <tr>
                <th>Categorias</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$categories item=$category}
                <tr>
                    <td>{$category->category}</td>
                    <td>
                        <form action="update/category" method="POST">
                            <div class="d-flex m-1">
                                <input class="form-control me-2" name="category" placeholder="nuevo nombre">
                                <input type="hidden" name="id" value="{$category->id_category}">
                                <button class="btn btn-success ml-5" type="submit" id="{$category->id_category}">Editar</a>
                            </div>
                        </form>
                    </td>
                    <td>
                        <form action="delete/category" method="POST">
                            <input type="hidden" name="id" value="{$category->id_category}">
                            <button class="btn btn-danger" type="submit">Borrar</button>
                        </form>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>

    <form action="add/category" method="POST" class="m-5">
        <div class="container-sm">
            <input class="form-control" name="category" placeholder="nueva categoria">
            <button type="submit" class="btn btn-success mt-2">Agregar</button>
        </div>
    </form>
</div>





