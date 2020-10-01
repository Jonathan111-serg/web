<?php

require_once 'Recursos/BD.php';
 
 session_start();

 $lvrango = $_SESSION['lvRANGO'];
		if(!$lvrango >= 6 || $lvrango == 8){
			echo "<script>location.href='login.php';</script>";
			die();
		}
 
$usuario = $pass = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	if(empty(trim($_POST["usuario"]))){
        $msgerror_u = 'Introduzca un usuario.';
    } else{
        $usuario = trim($_POST["usuario"]);
    }
	
	if(empty(trim($_POST['pass']))){
        $msgerror_p = 'Introduzca una contraseña.';
    } else{
        $pass = hash("sha256", trim($_POST['pass']));
        
    }
	
	$rango = trim($_POST["rango"]);
	$lvrango = trim($_POST["lvrango"]);
	
	$resultados = seleccionar_BD("SELECT * FROM panel_users WHERE USUARIO = '$usuario' AND PASS = '$pass'");
	
	

	if(count($resultados) == 0){
		$request = request_BD("INSERT INTO panel_users (USUARIO, PASS, RANGO, lvRANGO, ACTIVO) VALUES ('$usuario', '$pass', '$rango', '$lvrango', '1')");
	}else{


	}

	
	
	
}
 
 
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SantaLifeRP Panel | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    
	<b>SantaLifeRP </b>Panel</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Logeate</p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="usuario" placeholder="Usuario">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
        <input type="text" class="form-control" name="rango" placeholder="rango">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
	  <div class="form-group has-feedback">
        <input type="text" class="form-control" name="lvrango" placeholder="lvrango">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pass" placeholder="Contraseña">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
       <!-- <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
		 -->
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">ENVIAR</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
    <!-- /.social-auth-links -->

   

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
