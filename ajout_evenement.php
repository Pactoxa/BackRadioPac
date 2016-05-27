<?php
	include "includes/check_connection.php";
	include'includes/database.php';

	$sql = "SELECT * FROM type_event";
	$types = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

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
      Ajouter un évenement
      </h1>
    </section>
    <br>
    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Info événement</h3>
          </div>
          <div class="box-body">
						<div class="form-group">
			              <label>Nom de l'événement</label>
			            	<input type="text" class="form-control" value="" placeholder="Nom de l'événement">
			            </div>
						<div class="form-group">
			              <label>Lieu de l'événement</label>
			            	<input type="text" class="form-control" value="" placeholder="Lieu de l'événement">
			            </div>
						<div class="form-group">
			              <label>Description de l'événement (calendrier)</label>
			            	<input type="text" class="form-control" value="" placeholder="Description pour calendrier">
			            </div>
						<div class="form-group">
			              <label>Lien du site web de l'événement </label>
			            	<input type="text" class="form-control" value="" placeholder="Lien du site web de l'événement">
			            </div>
            <div class="form-group">
              <label>Type d'événement</label>
              <select class="form-control select2" style="width: 100%;">
								<?php
									foreach($types as $type){ ?>
										<option value="<?=$type['id_type_event'];?>"><?=$type['lib_type_event'];?></option>
								<?php  }
								 ?>
              </select>
            </div>
            <br>
            <div class="form-group">
              <label for="exampleInputFile">Mettre une image de couverture (optionnel)</label>
              <input type="file" id="exampleInputFile">
            </div>
          </div>
          <!-- /.box-body -->
        </div>

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Date de l'événement</h3>
          </div>
          <div class="box-body">
            <div class="form-group">
              <label>Début de l'événement</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-clock-o"></i>
                </div>
                <input type="text" class="form-control pull-left" id="horaire_debut">
              </div><!-- /.input group -->
              <br>
              <label>Fin de l'événement</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-clock-o"></i>
                </div>
                <input type="text" class="form-control pull-left" id="horaire_fin">
              </div><!-- /.input group -->
            </div><!-- /.form group -->

          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Ajouter l'événement</button>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div class="col-md-6">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Description événement</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body pad">
            <form role="form">
              <textarea class="textarea" placeholder="Rédiger l'article" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          </div>
        </form>
        </div>
      </div>
    </div>

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

<script>

	var toast = $("#custom-toast");
	function show_toast(message){
		toast.html(message);
		toast.slideToggle().delay(2000).slideToggle();
	}

</script>
<?php
	if(isset($_GET['message'])){ ?>
		<script>show_toast('<?=$_GET['message'];?>');</script>
	<?php }
?>
</body>
</html>
