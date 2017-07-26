<link href="<?php echo $ruta_base; ?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $ruta_base; ?>assets/plugins/datatables/jquery-1.12.4.js"></script>
<script type="text/javascript" src="<?php echo $ruta_base; ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<?php
$codigo = $_POST[codigo];
$parroquia = $_POST[parroquia];
$municipio = $_POST[municipio];
$eliminar = $_POST[eliminar];
$editar = $_POST[editar];
/*GUARDAR*/
if ($editar=='1' and $codigo==""){
    $consulu = paraTodos::arrayConsultanum("*", "parroquia", "par_descripcion='$parroquia'");
    if ($consulu>0){
        paraTodos::showMsg("Esta parroquia ya se encuentra registrada", "alert-danger");
    } else{
        paraTodos::arrayInserte("par_muncodigo, par_descripcion", "parroquia", "'$municipio', '$parroquia'");
        $codigo="";    
        $parroquia = "";
    }
}
/*UPDATE*/
if($editar == 1 and $parroquia !="" and $codigo!=""){
    paraTodos::arrayUpdate("par_descripcion='$parroquia'", "parroquia", "par_codigo=$codigo");
    $codigo="";    
    $parroquia = "";
}
/*ELIMINAR*/
if ($eliminar !=''){
    paraTodos::arrayDelete("par_codigo=$codigo", "parroquia");
    $codigo="";
}
/*MOSTRAR*/
if($editar == 1 and $codigo !="" and $parroquia==""){
    
    $consulta = paraTodos::arrayConsulta("*", "parroquia", "par_codigo=$codigo");
    foreach($consulta as $row){
        $parroquia = $row[par_descripcion];
        $municipio = $row[par_muncodigo];
    }
}
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Parroquias</h5>
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
									parroquia 	: $('#txtparroquia').val(),
									municipio 	: $('#txtmunicipio').val(),
									editar: 1,
									ver 	: 2
								},
								success : function (html) {
									$('#page-content').html(html);
								},
							}); return false;
                   " action="javascript:void(0);" method="post">
                        <div class="form-group" style="display: block;">
                            <div class="col-sm-6">
                                <label class="control-label" for="txtparroquia">Municipios</label>                                
                                <select class="form-control" id="txtmunicipio" required>
                                    <option value="">Seleccione una opción</option>
                                    <?php
                                    combos::CombosSelect("1", "$municipio", "*", "municipio", "mun_codigo", "mun_descripcion", "1=1");
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label" for="txtparroquia">Parroquia</label>
                                <input class="form-control" id="txtparroquia" type="text" value="<?php echo $parroquia; ?>" required>
                                <input class="form-control collapse" id="codigo" type="hidden" value="<?php echo $codigo; ?>"> 
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
                    <h5>Parroquias registradas</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-hover" id="parroquia">
                        <thead>
                            <tr>
                                <td class="text-center"><strong>Municipio</strong></td>
                                <td class="text-center"><strong>Parroquia</strong></td>
                                <td class="text-center"><strong>Editar</strong></td>
                                <td class="text-center"><strong>Eliminar</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $consulta = paraTodos::arrayConsulta("*", "municipio m, parroquia p", "p.par_muncodigo=m.mun_codigo");
                        foreach($consulta as $row){
                        ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo $row[mun_descripcion];?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $row[par_descripcion];?>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0);" onclick="$.ajax({
                                                url:'accion.php',
                                                type:'POST',
                                                data:{
                                                dmn 	: <?php echo $idMenut;?>,
                                                codigo 	: <?php echo $row[par_codigo];?>,
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
                                                codigo 	: <?php echo $row[par_codigo];?>,
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
        $('#parroquia').DataTable({
            "language": {
                "url": "<?php echo $ruta_base;?>assets/js/Spanish.json"
            }
        });
    </script>