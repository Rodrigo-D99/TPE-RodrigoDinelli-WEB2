


<form action="{$action}" method="POST" class="my-4">
    <div class="row">
   
        <div class="col-9">
            <div class="form-group">
                <label>Tipo de comida</label>
                <input name="names" type="text" class="form-control">
            </div>
        </div>
        <div class="col-3">
        {if $action=='editCategory'}
            <div class="form-group">
            
                <label>Tipo de comida</label>
                <select name="id_categories_fk" class="form-control">
                    <option value="-1">Seleccione una opcion</option>
                    
                    {foreach from=$products  item=$product}
                        <option value={$product->id_category}>{$product->names}</option>
                    {/foreach}
                    
                </select>
            </div>
        {/if}
        </div>
   </div> 
        
    
    {if $action=='editCategory'}
        <button type="submit" class="btn btn-primary mt-2">Editar</button>
        <a href='editCategory/{$product->id_category}' type='button' class='btn btn-success'>Editar</a>
        <a href='deleteCategory/{$product->id_category}' type='button' class='btn btn-danger'>Borrar</a>
    {else}
        <button type="submit" class="btn btn-primary mt-2">Agregar</button>
    {/if}
    


</form>
{include file="footer.tpl"}