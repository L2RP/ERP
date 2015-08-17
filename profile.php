<?php require_once 'controllers/User/UserLogado.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>ERP | L2RP Solutions</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
   <body class="skin-blue sidebar-mini">
    <div class="wrapper">


          <?php
		  	require_once 'header.php';
		  ?>


      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <?php
			require_once 'menu.php';
		?>
        <!-- /.sidebar -->
      </aside>

       <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> ERP<small>Painel </small></h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Dados Pessoais</h3>
                        </div> <!-- /.box-header -->

                        <form id="PersonalData" action="" method="post">

                            <div class="box-body">
                                <div class="form-group col-md-6">
                                    <label for="nome"> Nome Completo:</label>
                                    <input type="text" name="nome" size="100" class="form-control" placeholder="Nome Completo"/>

                                </div><!-- /.form-group -->
                                <div class="form-group col-md-6">
                                    <label for="dtNasc">Data de Nascimento</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask />
                                    </div><!-- /.input-group -->
                                </div><!-- /.form-group -->
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <input type="submit" class=" pull-right btn btn-info" value="Atualizar dados Pessoais!"/>
                            </div><!-- /.box-footer -->

                        </form>
                    </div><!-- /.box -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->


        	<div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Atualizar Foto de Perfil</h3>
                </div><!-- /.box-header -->
                <!-- form start -->

            	<form id="uploadForm" action="" method="post" enctype="multipart/form-data">

                <div class="box-body">
                    <div class="form-group">
                    	<label for ="user" >Imagem para upload</label>
  					<input name="imagem" id="user" type="file" />
                     <p class="help-block">Formatos Suportados: .JPG .JPEG .GIF .PNG .BMP</p>
            		</div>
               	</div>
               	<div class="progress">
                    <div id="status" class="progress-bar progress-bar-primary " role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    <span id="spstatus"></span>
                </div>
                </div>
                <div class="box-footer">

                    <input type="submit" class=" pull-right btn btn-success" value="Atualizar Foto!" />

                </form>
            </div>
        </div>
     </div>

     <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Alterar Senha</h3>
            </div><!-- /.box-header -->
            <form id="changePassword" action="" method="post">
	            <div class="box-body">
	            	
	            </div><!-- /.box-body -->
            
            </form>
        </div><!-- /.box -->
     </div><!-- /.col-md-6 -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
       <?php
	  	require_once 'footer.php';
	  ?>



                   <!-- Control Sidebar -->



        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->



   <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="bootstrap/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script type="text/javascript">
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="bootstrap/moment.min.js" type="text/javascript"></script>
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>

    <!-- Header Framework L2RP -->
    <script src="js/header.js" type="text/javascript"></script>

  	<script src="js/userL2RP.js"></script>
  	<!-- InputMask -->
        <script src="plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>

  	<script type="text/javascript">
          $(function () {
            //Initialize Select2 Elements

            //Datemask dd/mm/yyyy
            $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            //Datemask2 mm/dd/yyyy
            $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
            //Money Euro
            $("[data-mask]").inputmask();

            });
        </script>
 </body>
 </html>