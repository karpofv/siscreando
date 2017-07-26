<link href="<?php echo $ruta_base; ?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $ruta_base; ?>assets/plugins/datatables/jquery-1.12.4.js"></script>
<script type="text/javascript" src="<?php echo $ruta_base; ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<?php
$codigo = $_POST[codigo];
$estruc_regional = $_POST[estruc_regional];
$nombre = $_POST[nombre];
$telefono = $_POST[telefono];
$eliminar = $_POST[eliminar];
$editar = $_POST[editar];
/*GUARDAR*/
if ($editar=='1' and $codigo==""){
    $consulu = paraTodos::arrayConsultanum("*", "estruc_regional", "estreg_descripcion='$estruc_regional'");
    if ($consulu>0){
        paraTodos::showMsg("Esta Estructura ya se encuentra registrada", "alert-danger");
    } else{
        paraTodos::arrayInserte("estreg_nombre, estreg_telefono, estreg_descripcion", "estruc_regional", "'$nombre','$telefono','$estruc_regional'");
        $codigo="";    
        $estruc_regional = "";
        $nombre = "";
        $telefono = "";
    }
}
/*UPDATE*/
if($editar == 1 and $estruc_regional !="" and $codigo!=""){
    paraTodos::arrayUpdate("estreg_nombre='$nombre', estreg_telefono='$telefono', estreg_descripcion='$estruc_regional'", "estruc_regional", "estreg_codigo=$codigo");
    $codigo="";    
    $estruc_regional = "";
    $nombre = "";
    $telefono = "";
}
/*ELIMINAR*/
if ($eliminar !=''){
    paraTodos::arrayDelete("estreg_codigo=$codigo", "estruc_regional");
    $codigo="";
    $estruc_regional = "";
    $nombre = "";
    $telefono = "";    
}
/*MOSTRAR*/
if($editar == 1 and $codigo !="" and $estruc_regional==""){
    
    $consulta = paraTodos::arrayConsulta("*", "estruc_regional", "estreg_codigo=$codigo");
    foreach($consulta as $row){
        $estruc_regional = $row[estreg_descripcion];
        $nombre = $row[estreg_nombre];
        $telefono = $row[estreg_telefono];
    }
}
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Estructuras regionales</h5>
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
									estruc_regional 	: $('#txtestruc_regional').val(),
									nombre 	   : $('#txtnombre').val(),
									telefono   : $('#txttelef').val(),
									editar: 1,
									ver 	: 2
								},
								success : function (html) {
									$('#page-content').html(html);
								},
							}); return false;
                   " action="javascript:void(0);" method="post">
                        <div class="form-group" style="display: block;">
                            <div class="col-sm-12">
                                <label class="control-label" for="txtestruc_regional">Descripción</label>
                                <input class="form-control" id="txtestruc_regional" type="text" value="<?php echo $estruc_regional; ?>" required>
                                <input class="form-control collapse" id="codigo" type="hidden" value="<?php echo $codigo; ?>"> </div>                            
                            <div class="col-sm-6">
                                <label class="control-label">Nombre</label>
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
                    <table class="table table-hover" id="estruc_regional">
                        <thead>
                            <tr>
                                <td class="text-center"><strong>Estructura</strong></td>
                                <td class="text-center"><strong>Nombre</strong></td>
                                <td class="text-center"><strong>Teléfono</strong></td>
                                <td class="text-center"><strong>Editar</strong></td>
                                <td class="text-center"><strong>Eliminar</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $consulta = paraTodos::arrayConsulta("*", "estruc_regional", "1=1");
                        foreach($consulta as $row){
                        ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo $row[estreg_descripcion];?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row[estreg_nombre];?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row[estreg_telefono];?>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0);" onclick="$.ajax({
                                                url:'accion.php',
                                                type:'POST',
                                                data:{
                                                dmn 	: <?php echo $idMenut;?>,
                                                codigo 	: <?php echo $row[estreg_codigo];?>,
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
                                                codigo 	: <?php echo $row[estreg_codigo];?>,
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
        $('#estruc_regional').DataTable({
            "language": {
                "url": "<?php echo $ruta_base;?>assets/js/Spanish.json"
            }
        });
    </script>