<?php
    include("../../../php/viewmodal.php");
?>

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
                <form method="POST" id="formregister">                    
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Nombre(s)</label>
                            <input type="text" class="form-control" value="<?php echo $nombre ?>" disabled>
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label>Apellido Paterno</label>
                            <input type="text" class="form-control" value="<?php echo $ap_paterno ?>" disabled>
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label>Apellido Materno</label>
                            <input type="text" class="form-control" value="<?php echo $ap_materno ?>" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Fecha de nacimiento</label>
                            <input type="date" class="form-control" value="<?php echo $fecha_nac ?>" disabled>
                        </div>                                      
                        <div class="form-group col-md-4">
                            <label>Cedula Profesional</label>
                            <input type="text" class="form-control" value="<?php echo $cedula ?>" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Cedula Profesional</label>
                            <input type="text" class="form-control" value="<?php echo $rol ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                    <label>Correo Electr&oacute;nico</label>
                        <input type="text" class="form-control" value="<?php echo $correo ?>" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>