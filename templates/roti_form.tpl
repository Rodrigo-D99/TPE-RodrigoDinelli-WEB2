<form action="add" method="POST" class="my-4">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Ingresar nombre de la comida</label>
                <input name="names" type="text" class="form-control">
            </div>
        </div>

       <div class="col-3">
            <div class="form-group">
                <label>Tipo de comida</label>
                <select name="id_categories_fk" class="form-control">
                    <option value="0">Seleccione una opcion</option>
                    <option value="1">milanesa</option>
                    <option value="2">pizza</option>
                    <option value="3">papas</option>
                    <option value="4">carne</option>
                    <option value="5">pollo</option>
                </select>
            </div>
        </div> 
    </div>

    
    <div class="form-group">
        <label>Añade una descripcion</label>
        <textarea name="descriptions" class="form-control" rows="3"></textarea>
    </div>
    <div class="form-group">
        
        <input name="price" type="number" class="form_control" placeholder="Precio">
        </div>
    <button type="submit" class="btn btn-primary mt-2">Cargar</button>
</form>