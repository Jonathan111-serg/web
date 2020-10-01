

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="imagenes/SantaLifeRP.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["Nombre"] ?></p>
          <a href="index.php"><i class="fa fa-circle text-success"></i> <?php echo $_SESSION["RANGO"] ?></a>
        </div>
      </div>
      <!-- search form -->
 
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php if ($_SESSION['lvRANGO'] >= 1){
      	echo '
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li class="active">
          
            <i class=""><a href="index.php"></i> <span>INICIO</span>
            
          
          
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-address-card-o"></i>
            <span>Usuario</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="bans.php"><i class="fa fa-circle-o"></i> BanList</a></li>
          <li><a href="buscar.php"><i class="fa fa-circle-o"></i> Buscar usuario</a></li>
    <li><a href="buscardni.php"><i class="fa fa-circle-o"></i> Buscar usuario por DNI</a></li>
    <li><a href="busquedahexadecimal.php"><i class="fa fa-circle-o"></i> Buscar por HEXADECIMAL</a></li>
    <li><a href="ipbuscador-admins.php"><i class="fa fa-circle-o"></i> Buscador por IP</a></li>
            
          </ul>
        </li>
        <li>
          <a href="mafias.php">
            <i class="fa fa-user-secret"></i> <span>Mafias</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
		 <li>
          <a href="usersonline.php">
            <i class="fa fa-child"></i> <span>Usuarios Online</span>
          </a>
        </li>
		<br>
		';
	}
		?>
        <?php if ($_SESSION['lvRANGO'] == 11){
      echo '
      <li>
      <a href="blacklist.php">
        <i class="fa fa-child"></i> <span>Comprobar Blacklist</span>
      </a>
      </li>';
	}
		?>
<?php if ($_SESSION['lvRANGO'] >= 3 && $_SESSION["lvRANGO"] != 8){
        echo '
      <li>
      <a href="buscarnegros.php">
        <i class="fa fa-child"></i> <span>Buscar Negros</span>
      </a>
      </li>';
	}
		?>



		<!-- Inicio Rango GC M -->

		
		
		<!-- Final Rango EMS M -->
		
		
		<!--<li class="treeview">
          <a href="#">
            <i class="	fa fa-bar-chart-o"></i>
            <span>Estadísticas</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">3</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="estadisticasstaff.php"><i class="fa fa-circle-o"></i> STAFF</a></li>
            <li><a href="estadisticaspoli.php"><i class="fa fa-circle-o"></i> POLICÍA</a></li>
            <li><a href="estadisticasems.php"><i class="fa fa-circle-o"></i> EMS</a></li>
            
          </ul>
        </li> -->
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  
  <script>
$(document).ready(function () {
 setInterval(function () {
     cargar();
 },5000);

function cargar () {
    $.ajax({
        url:'notificaciones.php',
        type:'POST',
        success:function (data) {
            $('.content').html(data);
        }
    });

}
</script>