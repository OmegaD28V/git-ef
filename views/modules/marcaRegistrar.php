<div class="contenedor-formulario">
    <form class="formulario" name="nuevaMarca" method="post">
        <h2>Nueva Marca</h2>
        <div class="input-group">
            <label for="nameTrademark">Nombre de la Marca</label>
            <input id="nameTrademark" type="text" name="nameTrademark" required>
        </div>

        <div class="input-group">
            <input type="submit" id="btnRegistrarMarca" name="btnRegistrarMarca" value="Registrar Marca" title="Registrar Marca">
        </div>
    </form>
</div>

<?php
    $registro = new MvcController();
    $registro -> registrarMarcaController();
?>