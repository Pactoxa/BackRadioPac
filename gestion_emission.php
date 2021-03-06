<?php
  include "includes/check_connection.php";
  include'includes/database.php';

  $sql = "SELECT * FROM tags";
  $tags = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Radio PAC - Administration</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-green.min.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">

  <?php

    if(isset($_GET["id"])) {

      $id = $_GET["id"];

    }

    $emission = $db->query("SELECT * FROM emissions WHERE id_emission = $id");
    $emission = $emission->fetch(PDO::FETCH_ASSOC);

    $titre = $emission["titre_emission"];

    $description = $emission["descri_emission"];

  ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
  <!-- Navigation -->
  <?php include("includes/navigation.php") ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Gérer l'émission : <b><?php echo $titre ?></b>
      </h1>
    </section>
    <br>
    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->

      <div class="row">
        <div class="col-md-12">
          <div class="box box-success box-solid collapsed-box">
            <div class="box-header with-border" data-widget="collapse">
              <div class="box-tools pull-left">
                <button type="button" class="btn pull-left btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <h3 class="box-title" data-widget="collapse">Ajouter un article</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
			<form method="post" action="traitements/add_article_emission.php" enctype="multipart/form-data">
	            <div class="box-body">
	              <div class="row">
	                <div class="col-md-4">
	                  <div class="box box-purple">
	                    <div class="box-header with-border">
	                      <h3 class="box-title">Info article</h3>
	                    </div>
		                    <div class="box-body">
		                      <label>Titre de l'article</label>
		                      <input name="titre" type="text" class="form-control" value="" placeholder="Titre de l'article">
		                      <br>
		                      <div class="form-group">
		                        <label>Tags (optionnels)</label>
		                        <select class="form-control select2" name="tags[]" multiple="multiple" data-placeholder="Ajouter un tag" style="width: 100%;">
		                          <?php
		                            foreach($tags as $tag){ ?>
		                              <option value="<?=$tag['id_tag'];?>"><?=$tag['lib_tag'];?></option>
		                          <?php  }
		                           ?>
		                        </select>
		                      </div>
		                      <div class="form-group">
		                        <label for="exampleInputFile">Mettre une image de couverture (optionnel)</label>
		                        <input name="image" type="file" id="exampleInputFile">
		                      </div>
		                    </div>
	                    <!-- /.box-body -->
	                  </div>
	                  <!-- /.box -->
	                  <div class="box-footer">
	                    <button type="submit" class="btn btn-primary">Envoyer</button>
	                  </div>
	                </div>
	                <div class="col-md-8">
	                  <div class="box">
	                    <div class="box-header">
	                      <h3 class="box-title">Rédiger l'article</h3>
	                    </div>
	                    <!-- /.box-header -->
	                    <div class="box-body pad">
	                        <textarea name="contenu" class="textarea" placeholder="Rédiger l'article" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
				<input style="display:none;" name='emission' value="<?=$id;?>"/>
			</form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
      </div>
      <br>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-success box-solid collapsed-box">
            <div class="box-header with-border" data-widget="collapse">
              <div class="box-tools pull-left">
                <button type="button" class="btn pull-left btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <h3 class="box-title" data-widget="collapse">Ajouter un podcast</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
				<form method="post" action="traitements/add_podcast_emission.php" enctype="multipart/form-data">
                <div class="col-md-4">
                  <div class="box box-purple">
                    <div class="box-header with-border">
                      <h3 class="box-title">Info podcast</h3>
                    </div>
                    <div class="box-body">
                      <label>Titre du podcast </label>
                      <input name="titre" type="text" class="form-control" value="" placeholder="Titre du podcast">
                      <br>
                      <div class="form-group">
                        <label for="exampleInputFile">Podcast </label>
                        <input name="podcast" type="file" id="exampleInputFile">
                      </div>
                      <div class="form-group">
                        <label>Tags (optionnels)</label>
                        <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Ajouter un tag" style="width: 100%;">
                          <?php
                            foreach($tags as $tag){ ?>
                              <option value="<?=$tag['id_tag'];?>"><?=$tag['lib_tag'];?></option>
                          <?php  }
                           ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Insérer une image de présentation (optionnel)</label>
                        <input name="image" type="file" id="exampleInputFile">
                      </div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                  </div>
                  <!-- /.box -->
                </div>
                <div class="col-md-8">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Contenu du podcast</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body pad">
                        <textarea name="contenu" class="textarea" placeholder="Contenu du podcast" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                  </div>
                </div>
				<input style="display:none;" name='emission' value="<?=$id;?>"/>
				</form>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
      </div>
      <br>

      <div class="row">
		<form method="post" action="traitements/edit_emission.php" enctype="multipart/form-data">
        <div class="col-md-6 col-lg-6 col-xs-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Info émission</h3>
            </div>
            <div class="box-body">
              <div class="form-group">
                  <div class="form-group">
                    <label>Nom de l'émission</label>
                    <input name="titre" type="text" class="form-control" value="<?php echo $titre ?>" placeholder="<?php echo $titre ?>">
                  </div>
              </div>
              <br>
              <div class="form-group">
                <label for="exampleInputFile">Modifier image de couverture</label>
                <input name="image" type="file" id="exampleInputFile">
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  	<!-- OSEF -->
	          <div class="box box-primary">
	            <div class="box-header with-border">
	              <h3 class="box-title">Programmation émission</h3>
	            </div>
	            <div class="box-body">
	              <div class="form-group">
	                <label>Début du programme</label>
	                <div class="input-group">
	                  <div class="input-group-addon">
	                    <i class="fa fa-clock-o"></i>
	                  </div>
	                  <input type="text" class="form-control pull-left" id="horaire_debut">
	                </div><!-- /.input group -->
	                <br>
	                <label>Fin du programme</label>
	                <div class="input-group">
	                  <div class="input-group-addon">
	                    <i class="fa fa-clock-o"></i>
	                  </div>
	                  <input type="text" class="form-control pull-left" id="horaire_fin">
	                </div><!-- /.input group -->
	              </div><!-- /.form group -->
			<!-- FIN OSEF -->
	            </div>
	            <div class="box-footer">
	              <button type="submit" class="btn btn-primary">Ajouter</button>
	            </div>
	            <!-- /.box-body -->
	          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Description de l'émission</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <textarea name="description" class="textarea" placeholder="Rédiger l'article" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $description; ?></textarea>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
          </div>
        </div>
		<input style="display:none;" name='emission' value="<?=$id;?>"/>
		</form>
      </div>
      <br>
      <br>
      <br>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include("includes/footer.html") ?>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
    //Editeur de texte
    $(".textarea").wysihtml5();

    $('#horaire_debut').datetimepicker({
      format : 'DD/MM/YYYY HH:mm:ss'
    });

    $('#horaire_fin').datetimepicker({
      format : 'DD/MM/YYYY HH:mm:ss'
    });


  });
</script>
</body>
</html>
