<link href="<?php echo $ruta_base; ?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $ruta_base; ?>assets/plugins/datatables/jquery-1.12.4.js"></script>
<script type="text/javascript" src="<?php echo $ruta_base; ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<?php
$codigo = $_POST[codigo];
$estructura = $_POST[estructura];
$eliminar = $_POST[eliminar];
$editar = $_POST[editar];
/*GUARDAR*/
if ($editar=='1' and $codigo==""){
    $consulu = paraTodos::arrayConsultanum("*", "estructura", "estr_descripcion='$estructura'");
    if ($consulu>0){
        paraTodos::showMsg("Esta estructura ya se encuentra registrada", "alert-danger");
    } else{
        paraTodos::arrayInserte("estr_descripcion", "estructura", "'$estructura'");
        $codigo="";    
        $estructura = "";
    }
}
/*UPDATE*/
if($editar == 1 and $estructura !="" and $codigo!=""){
    paraTodos::arrayUpdate("estr_descripcion='$estructura'", "estructura", "estr_codigo=$codigo");
    $codigo="";    
    $estructura = "";
}
/*ELIMINAR*/
if ($eliminar !=''){
    paraTodos::arrayDelete("estr_codigo=$codigo", "estructura");
    $codigo="";
}
/*MOSTRAR*/
if($editar == 1 and $codigo !="" and $estructura==""){
    
    $consulta = paraTodos::arrayConsulta("*", "estructura", "estr_codigo=$codigo");
    foreach($consulta as $row){
        $estructura = $row[estr_descripcion];
    }
}
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Estructuras</h5>
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
									estructura 	: $('#txtestructura').val(),
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
                                <label class="control-label" for="txtestructura">Estructura</label>
                                <input class="form-control" id="txtestructura" type="text" value="<?php echo $estructura; ?>" required>
                                <input class="form-control collapse" id="codigo" type="hidden" value="<?php echo $codigo; ?>"> </div>                            
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
                    <h5>Estructuras registrados</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-hover" id="estructura">
                        <thead>
                            <tr>
                                <td class="text-center"><strong>Estructura</strong></td>
                                <td class="text-center"><strong>Editar</strong></td>
                                <td class="text-center"><strong>Eliminar</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $consulta = paraTodos::arrayConsulta("*", "estructura", "1=1");
                        foreach($consulta as $row){
                        ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo $row[estr_descripcion];?>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0);" onclick="$.ajax({
                                                url:'accion.php',
                                                type:'POST',
                                                data:{
                                                dmn 	: <?php echo $idMenut;?>,
                                                codigo 	: <?php echo $row[estr_codigo];?>,
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
                                                codigo 	: <?php echo $row[estr_codigo];?>,
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
        $('#estructura').DataTable({
            "language": {
                "url": "<?php echo $ruta_base;?>assets/js/Spanish.json"
            }
        });
    </script>