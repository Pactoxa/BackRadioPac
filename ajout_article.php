<?php
	include "includes/check_connection.php";
	include'includes/database.php';

	$sql = "SELECT * FROM tags";
  	$tags = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

	$sql = "SELECT * FROM categories";
	$categories = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Radio PAC - Administration</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap  -->
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

 <link rel="stylesheet" href="dist/css/custom.css">
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
      	Ajouter un article
      </h1>
    </section>
    <br>
    <!-- Main content -->
    <section class="content">
	  <form method="post" action="traitements/add_article.php" enctype="multipart/form-data">
      <!-- Your Page Content Here -->
		    <div class="row">
			      <div class="col-md-6">
				        <div class="box box-primary">
					          <div class="box-header with-border">
					            	<h3 class="box-title">Info article</h3>
					          </div>
					          <div class="box-body">
									<div class="form-group">
										<label>Titre de l'article</label>
										<input type="text" class="form-control" name="titre" id="titre-article" placeholder="Titre de l'article">
									</div>
									<br>
						            <div class="form-group">
						              <label>Catégorie</label>
						              <select id="categorie-article" name="categorie" class="form-control select2" style="width: 100%;">
										<?php
											foreach($categories as $categorie){ ?>
												<option value="<?=$categorie['id_cat'];?>"><?=$categorie['lib_cat'];?></option>
										<?php  }
										 ?>
						              </select>
						            </div>
					            	<br>
						            <div class="form-group">
						              <label>Tags (optionnels)</label>
						              <select id="tags-article" name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Ajouter un tag" style="width: 100%;">
											<?php
												foreach($tags as $tag){ ?>
													<option value="<?=$tag['id_tag'];?>"><?=$tag['lib_tag'];?></option>
											<?php  }
											 ?>
						              </select>
						            </div>
						            <div class="form-group">
						              <label for="exampleInputFile">Mettre une image de couverture (optionnel)</label>
						              <input type="file" name="image" id="image-article">
						            </div>
					          </div>
				          <!-- /.box-body -->
				        </div>
			        <!-- /.box -->
			      </div>
			      <div class="col-md-6">
				        <div class="box box-success">
					          <div class="box-header with-border">
					            	<h3 class="box-title">Contenu de l'article</h3>
					          </div>
					          <!-- /.box-header -->
					          <div class="box-body pad">
					              	<textarea name="contenu" id="contenu-article" class="textarea" placeholder="Rédiger l'article" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					          </div>
					          <div class="box-footer">
					            <button type="submit" id="submit-form" class="btn btn-primary">Soumettre article</button>
					          </div>
				        </div>
			      </div>
		    </div>
		</form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- toast -->
	<div id="custom-toast" style="display:none;" id-action="" action="">
	</div>

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

<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
    //Editeur de texte
    $(".textarea").wysihtml5();
  });
</script>

<!-- Toast -->
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
