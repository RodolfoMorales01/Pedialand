<?php
    include("../../../php/viewmodal.php");
      
?>
<div class="md-4">
    <span id="result"></span>
</div>
<div class="modal fade bd-example-modal-lg" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $nombre; ?> <?php echo $ap_paterno; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form method="POST" id="formupdate">                    
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Nombre(s)</label>
                            <input type="text" class="form-control" value="<?php echo $nombre ?>" id="nombre">
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label>Apellido Paterno</label>
                            <input type="text" class="form-control" value="<?php echo $ap_paterno ?>" id="paterno">
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label>Apellido Materno</label>
                            <input type="text" class="form-control" value="<?php echo $ap_materno ?>" id="materno">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Fecha de nacimiento</label>
                            <input type="date" class="form-control" value="<?php echo $fecha_nac ?>" id="fecha">
                        </div>                                      
                        <div class="form-group col-md-4">
                            <label>Cedula Profesional</label>
                            <input type="text" class="form-control" value="<?php echo $cedula ?>" id="cedula">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Roles</label>
                            <select id="rol" class="form-control">
                                <option selected>Selecciona ...</option>
                                    <?php
                                        while ($data2 =mysqli_fetch_array($resultado2)) {
                                    ?>
                                <option value="<?php echo $data2['idroles'];?>"><?php echo $data2['rol'];?></option>
                                    <?php
                                        }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label>Correo Electr&oacute;nico</label>
                            <input type="text" class="form-control" value="<?php echo $correo ?>" id="correo">
                        </div>
                        <div class="form-group col-md-6">
                        <label>Contrase&ntilde;a</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a onclick="updatePerson(<?php echo $persona ?>)" class="btn btn-success update" style="color: white;">Actualizar</a>
                <a type="button" class="btn btn-primary" style="color: white;" data-dismiss="modal">Cerrar</a>
            </div>
        </div>
    </div>
</div>