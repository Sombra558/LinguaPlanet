<form  id="transferencia" method="post"  enctype="multipart/form-data" class="mx-2">
    @csrf
 
    <input class="form-control input-novedades mb-3" style="border-radius:8px;" type="text" name="direccion" placeholder="direccion" require>
    <input class="form-control input-novedades mb-3" style="border-radius:8px;" type="text" name="cnumero" placeholder="numero de comprobante" require>
    <div>
        <input type="file"  name="img_deposito" id="file-u" class="input-file" style="position: absolute; opacity: 0; cursor: pointer; height: 0; width: 0;">
            <label for="file-u" class="btn btn-tertiary js-labelFile row justify-content-center align-items-center mx-0 w-100" style=" height:2.5rem; background: #ECF2EE; border:none; border-radius: 8px;">
                <i class="icon fa fa-check"></i>
                <span class="js-fileName mt-5" style="color:#768079;">Subir comprobante</span>
            </label>
    </div>
</form>