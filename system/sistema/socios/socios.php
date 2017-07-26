<link href="<?php echo $ruta_base; ?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $ruta_base; ?>assets/plugins/datatables/jquery-1.12.4.js"></script>
<script type="text/javascript" src="<?php echo $ruta_base; ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<?php
$codigo = $_POST[codigo];
$asociados = $_POST[asociados];
$nombre = $_POST[nombre];
$telefono = $_POST[telefono];
$tipo = $_POST[tipo];
$eliminar = $_POST[eliminar];
$editar = $_POST[editar];
/*GUARDAR*/
if ($editar=='1' and $codigo==""){
    $consulu = paraTodos::arrayConsultanum("*", "asociados", "asoc_descripcion='$asociados'");
    if ($consulu>0){
        paraTodos::showMsg("Este Asociado ya se encuentra registrado", "alert-danger");
    } else{
        paraTodos::arrayInserte("asoc_nombre, asoc_telefono, asoc_descripcion, asoc_tipo", "asociados", "'$nombre','$telefono','$asociados', '$tipo'");
        $codigo="";    
        $asociados = "";
        $nombre = "";
        $telefono = "";
    }
}
/*UPDATE*/
if($editar == 1 and $asociados !="" and $codigo!=""){
    paraTodos::arrayUpdate("asoc_nombre='$nombre', asoc_telefono='$telefono', asoc_descripcion='$asociados', asoc_tipo='$tipo'", "asociados", "asoc_codigo=$codigo");
    $codigo="";    
    $asociados = "";
    $nombre = "";
    $telefono = "";
    $tipo = "";
}
/*ELIMINAR*/
if ($eliminar !=''){
    paraTodos::arrayDelete("asoc_codigo=$codigo", "asociados");
    $codigo="";
    $asociados = "";
    $nombre = "";
    $telefono = "";    
    $tipo = "";    
}
/*MOSTRAR*/
if($editar == 1 and $codigo !="" and $asociados==""){
    
    $consulta = paraTodos::arrayConsulta("*", "asociados", "asoc_codigo=$codigo");
    foreach($consulta as $row){
        $asociados = $row[asoc_descripcion];
        $nombre = $row[asoc_nombre];
        $telefono = $row[asoc_telefono];
        $tipo = $row[asoc_tipo];
    }
}
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Asociados</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" onsubmit="
                            $.ajax({
								url:'accion.php',
								type:'POST',
								data:{
									dmn 	: <?php echo $idMenut;?>,
									codigo 	: $('#codigo').val(),
									asociados 	: $('#txtasociados').val(),
									nombre 	   : $('#txtnombre').val(),
									telefono   : $('#txttelef').val(),
									tipo   : $('#txttipo').val(),
									editar: 1,
									ver 	: 2
								},
								success : function (html) {
									$('#page-content').html(html);
								},
							}); return false;
                   " action="javascript:void(0);" method="post">
                        <div class="form-group" style="display: block;">
                            <div class="col-sm-4">
                                <label class="control-label">Tipo de asociado</label>
                                <select class="form-control" id="txttipo" required>
                                    <option value="">Seleccione una opción</option>
                                    <?php
                                    combos::CombosSelect("1", "$tipo", "*", "tools_tipo", "tip_codigo", "tip_descripcion", "1=1");
                                    ?>
                                </select>
                            </div>                            
                            <div class="col-sm-8">
                                <label class="control-label" for="txtasociados">Institucion</label>
                                <input class="form-control" id="txtasociados" type="text" value="<?php echo $asociados; ?>" required>
                                <input class="form-control collapse" id="codigo" type="hidden" value="<?php echo $codigo; ?>"> </div>                            
                            <div class="col-sm-6">
                                <label class="control-label">Contacto</label>
                                <input class="form-control" id="txtnombre" type="text" value="<?php echo $nombre; ?>" required>                                
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label">Teléfono</label>
                                <input class="form-control" id="txttelef" type="text" value="<?php echo $telefono; ?>" required>                                
                            </div>
                        </div>
                        <div class="box-footer">
                            <input id="enviar" type="submit" value="Guardar" class="btn btn-primary col-md-offset-5"> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Estructuras regionales registrados</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-hover" id="asociados">
                        <thead>
                            <tr>
                                <td class="text-center"><strong>Tipo</strong></td>
                                <td class="text-center"><strong>Institución</strong></td>
                                <td class="text-center"><strong>Contacto</strong></td>
                                <td class="text-center"><strong>Teléfono</strong></td>
                                <td class="text-center"><strong>Editar</strong></td>
                                <td class="text-center"><strong>Eliminar</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $consulta = paraTodos::arrayConsulta("*", "asociados a, tools_tipo t", "a.asoc_tipo=t.tip_codigo");
                        foreach($consulta as $row){
                        ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo $row[tip_descripcion];?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row[asoc_descripcion];?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row[asoc_nombre];?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row[asoc_telefono];?>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0);" onclick="$.ajax({
                                                url:'accion.php',
                                                type:'POST',
                                                data:{
                                                dmn 	: <?php echo $idMenut;?>,
                                                codigo 	: <?php echo $row[asoc_codigo];?>,
                                                editar 	: 1,
                                                ver 	: 2
                                                },
                                                success : function (html) {
                                                $('#page-content').html(html);
                                                },
                                                }); return false;"> <i class="fa fa-edit"></i> </a>
                                    </td>
                                    <td class="text-center"> <a href="javascript:void(0);" onclick="$.ajax({
                                                url:'accion.php',
                                                type:'POST',
                                                data:{
                                                dmn 	: <?php echo $idMenut;?>,
                                                codigo 	: <?php echo $row[asoc_codigo];?>,
                                                eliminar : 1,
                                                ver 	: 2
                                                },
                                                success : function (html) {
                                                $('#page-content').html(html);
                                                },
                                                }); return false;"><i class="fa fa-eraser"></i>
                                    </a> </td>
                                </tr>
                                <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#asociados').DataTable({
            "language": {
                "url": "<?php echo $ruta_base;?>assets/js/Spanish.json"
            }
        });
    </script>