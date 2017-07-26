<link href="<?php echo $ruta_base; ?>assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo $ruta_base; ?>assets/plugins/datatables/jquery-1.12.4.js"></script>
<script type="text/javascript" src="<?php echo $ruta_base; ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<?php
$codigo = $_POST[codigo];
$cedula = $_POST[cedula];
$nombre = utf8_encode($_POST[nombre]);
$apellido = utf8_encode($_POST[apellido]);
$telefono = utf8_encode($_POST[telefono]);
$correo = utf8_encode($_POST[correo]);
$direccion = utf8_encode($_POST[direccion]);
$eliminar = $_POST[eliminar];
$editar = $_POST[editar];
/*GUARDAR*/
if ($editar=='1' and $codigo==""){
    $consulu = paraTodos::arrayConsultanum("*", "voluntario", "vol_cedula='$cedula'");
    if ($consulu>0){
        paraTodos::showMsg("Esta persona ya se encuentra registrada", "alert-danger");
    } else{
        paraTodos::arrayInserte("vol_cedula, vol_nombres, vol_apellidos, vol_telefonos, vol_correo, vol_direccion, vol_status", "voluntario", "$cedula, '$nombre', '$apellido', '$telefono', '$correo', '$direccion', 1");
        $codigo="";    
        $cedula = "";
        $nombre = "";
        $apellido = "";
        $telefono = "";
        $correo = "";
        $direccion = "";        
    }
}
/*UPDATE*/
if($editar == 1 and $nombre !="" and $codigo!=""){
    paraTodos::arrayUpdate("vol_cedula='$cedula', vol_nombres='$nombre', vol_apellidos='$apellido', vol_telefonos='$telefono', vol_correo='$correo', vol_direccion='$direccion'", "voluntario", "vol_codigo=$codigo");
    $codigo="";    
    $cedula = "";
    $nombre = "";
    $apellido = "";
    $telefono = "";
    $correo = "";
    $direccion = "";
}
/*ELIMINAR*/
if ($eliminar !=''){
    paraTodos::arrayDelete("vol_codigo=$codigo", "voluntario");
    $codigo="";
}
/*MOSTRAR*/
if($editar == 1 and $codigo !="" and $nombre==""){
    
    $consulta = paraTodos::arrayConsulta("*", "voluntario", "vol_codigo=$codigo");
    foreach($consulta as $row){
        $cedula = $row[vol_cedula];
        $nombre = $row[vol_nombres];
        $apellido = $row[vol_apellidos];
        $telefono = $row[vol_telefonos];
        $correo = $row[vol_correo];
        $direccion = $row[vol_direccion];
    }
}
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>voluntario</h5>
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
									cedula 	: $('#cedula').val(),
									nombre 	: $('#nombre').val(),
									apellido: $('#apellido').val(),
									telefono: $('#txttelefono').val(),
									correo: $('#txtcorreo').val(),
									direccion: $('#txtdireccion').val(),
									editar: 1,
									ver 	: 2
								},
								success : function (html) {
									$('#page-content').html(html);
									$('#cedula').val('');
									$('#nombre').val('');
									$('#apellido').val('');
									$('#txttelefono').val('');
									$('#txtcorreo').val('');
								},
							}); return false;
                   " action="javascript:void(0);" method="post">
                        <div class="form-group" style="display: block;">
                            <div class="col-sm-2">
                                <label class="control-label" for="cedula">Cédula</label>
                                <input class="form-control" id="cedula" type="number" value="<?php echo $cedula; ?>" required>
                                <input class="form-control collapse" id="codigo" type="hidden" value="<?php echo $codigo; ?>"> </div>
                            <div class="col-sm-5">
                                <label class="control-label" for="nombre">Nombres</label>
                                <input class="form-control" id="nombre" type="text" value="<?php echo $nombre;?>" required> </div>
                            <div class="col-sm-5">
                                <label class="control-label" for="apellido">Apellidos</label>
                                <input class="form-control" id="apellido" type="text" value="<?php echo $apellido;?>" required> </div>
                            <div class="col-sm-4">
                                <label class="control-label" for="txttelefono">Teléfonos</label>
                                <input class="form-control" id="txttelefono" type="text" value="<?php echo $telefono;?>"> </div>
                            <div class="col-sm-4">
                                <label class="control-label" for="txtcorreo">Correo electrónico</label>
                                <input class="form-control" id="txtcorreo" type="mail" value="<?php echo $correo;?>"> </div>
                            <div class="col-sm-12">
                                <label class="control-label" for="txtdireccion">Dirección</label>
                                <input class="form-control" id="txtdireccion" type="mail" value="<?php echo $direccion;?>"> </div>
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
                    <h5>voluntario registrado</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-hover" id="voluntario">
                        <thead>
                            <tr>
                                <td class="text-center"><strong>Cédula</strong></td>
                                <td class="text-center"><strong>Nombres</strong></td>
                                <td class="text-center"><strong>Apellidos</strong></td>
                                <td class="text-center"><strong>Teléfono</strong></td>
                                <td class="text-center"><strong>Correo electrónico</strong></td>
                                <td class="text-center"><strong>Dirección</strong></td>
                                <td class="text-center"><strong>Estatus</strong></td>
                                <td class="text-center"><strong>Editar</strong></td>
                                <td class="text-center"><strong>Eliminar</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        $consulta = paraTodos::arrayConsulta("*", "voluntario p, tools_estatus s", "p.vol_status=s.est_codigo");
                        foreach($consulta as $row){
                        ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo $row[vol_cedula];?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo utf8_decode($row[vol_nombres]);?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo utf8_decode($row[vol_apellidos]);?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo utf8_decode($row[vol_telefonos]);?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo utf8_decode($row[vol_correo]);?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo utf8_decode($row[vol_direccion]);?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo utf8_decode($row[est_descripcion]);?>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:void(0);" onclick="$.ajax({
                                                url:'accion.php',
                                                type:'POST',
                                                data:{
                                                dmn 	: <?php echo $idMenut;?>,
                                                codigo 	: <?php echo $row[vol_codigo];?>,
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
                                                codigo 	: <?php echo $row[vol_codigo];?>,
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
        $('#voluntario').DataTable({
            "language": {
                "url": "<?php echo $ruta_base;?>assets/js/Spanish.json"
            }
        });
    </script>