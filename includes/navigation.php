<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
  <a href="../index.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>P</b>AC</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Radio </b>PAC</span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Afficher menu</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">Administrateur</span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

              <p>
                Administrateur
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-right">
                <a href="#" class="btn btn-default btn-flat">Se déconnecter</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
      </ul>
    </div>
  </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Administrateur</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Connecté</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">MENU</li>
      <!-- Optionally, you can add icons to the links -->
      <li><a href="index.php"><i class="fa fa-newspaper-o"></i> <span>Publier un article</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-users"></i> <span>Emissions</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <?php
            $emissions = $db->query("SELECT * FROM emission");
  			    $emissions = $emissions->fetchAll(PDO::FETCH_ASSOC);

            foreach ($emissions as $emission) {
              echo "<li><a href=\"emission.php?id=".$emission["id_emission"]."\">".$emission["lib_emission"]."</a></li>";
            }
          ?>
          <li><i class="fa fa-minus"></i><a href="ajout-emission.php">Ajouter une émission</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-calendar"></i> <span>Gérer le calendrier</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="ajout-programme.php">Programme radio</a></li>
          <li><a href="ajout-evenement.php">Évenement</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-exclamation-triangle"></i> <span>Publier un bulletin</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-cloud"></i> Météo</a></li>
          <li><a href="#"><i class="fa fa-road"></i> Routier</a></li>
        </ul>
      </li>
      <li><a href="#"><i class="fa fa-picture-o"></i> <span>Portfolio</span></a></li>
      <li><a href="#"><i class="fa fa-envelope-o"></i> <span>Boite de reception</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
