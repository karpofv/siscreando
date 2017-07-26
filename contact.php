<?php
	error_reporting(E_ALL);
	ini_set('display_errors', false);
	ini_set('display_startup_errors', false);
	require_once ('includes/conf/db.php');
	require_once ('includes/conexion.php');
	require_once ('system/modelo/usuarios/class.usuarios.php');
	// $usuario = $_POST['usuario'];
	// $cedula = $_POST['cedula'];
	// $contrasena = md5($_POST['contrasena']);
	// $tipo = "Empleado";
    include_once("includes/layout/headp.php");
    include_once("includes/layout/sidebarp.php");
    $nombre = $_POST[name];
    $correo = $_POST[email];
    $asunto = $_POST[subject];
    $mensaje = $_POST[message];
    if($mensaje!=""){
        $consulmensaje = UsuariosModel::registrarmensaje($nombre,$correo,$asunto,$mensaje);
        if($consulmensaje==1){
            echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Gracias por tu mensaje');
                javascript:window.location.href = 'http://localhost/creando/contact.php';
                </SCRIPT>");
            
        } else {
            echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Hubo un error enviar mensaje');
                javascript:window.history.back();
                </SCRIPT>");   
        }
    }
            $nombre = "";
            $correo = "";
            $asunto = "";
            $mensaje = "";
?>
    <div class="breadcrumb">
        <h2>CONTACTANOS</h2>
    </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="recent">
                    </div>
                    <div id="errormessage"></div>
                    <form action="contact.php" method="post" role="form" class="contactForm">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Tu nombre" data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="<?php echo $nombre;?>" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Tu correo electrónico" data-rule="email" data-msg="Please enter a valid email" value="<?php echo $correo;?>"/>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" value="<?php echo $asunto;?>"/>
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Dejanostu mensaje" placeholder="Mensaje" required><?php echo $mensaje;?></textarea>
                            <div class="validation"></div>
                        </div>

                        <div class="text-center"><button type="submit" class="btn btn-primary btn-lg">Enviar mensaje</button></div>
                    </form>
                </div>

                <div class="col-lg-6">
                    <div class="recent">
                        <h3>Envianos un mensaje</h3>
                    </div>
                    <div class="">
                        <p>Preguntas Frecuentes<br>
                            Dar ayuda<br>
                            Recibir ayuda<br>
                            Formar Equipo<br>
                            </p>
                    </div>
                </div>
            </div>
        </div>
<?php
    include_once("includes/layout/footp.php");
?>
