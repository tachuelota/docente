<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Evaluación Docente">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <title>Panel Administrativo</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
   
    <link rel="stylesheet"  href="css/validating-style.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/alumno.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

    <!-- Wrap all page content here 
<div class="well" style="background-image: url('images/fondogobierno.png');height:140px;background-repeat:no-repeat;"></div> 
     -->
    <div id="wrap">

      <!-- Fixed navbar -->
     
      <div class="navbar navbar-default navbar-fixed-top navbar-inverse">

        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Panel Administrativo</a>
          </div>
          <div class="collapse navbar-collapse">
           	<ul class="nav navbar-nav">
           		<li class="active"><a href="administrador/inicio" class="menu">Inicio</a></li>
              <li><a href="administrador/aulasindex" class="menu">Aulas</a></li>
           		<li><a href="administrador/alumnosindex" class="menualone menu">Alumnos</a></li>
           		<li><a href="administrador/materiasindex" class="menu">Materias</a></li>
           		<li><a href="administrador/maestrosindex" class="menu">Maestros</a></li>           		          
           		<li><a href="administrador/evaluacionindex" class="menu">Evaluación</a></li>
           	</ul>
             <ul class="nav navbar-nav navbar-right">
               <li><br><div id="cargando"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                <li class="dropdown">
                  <a href="{{URL::to('/')}}" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-user"></i>&nbsp;&nbsp;Bienvenido {{Auth::user()->username}} <b class="caret"></b></a>
                    <ul  class="dropdown-menu">
                    <li><a href="{{URL::to('/logout')}}">Cerrar Sesión</a></li>
                    </ul>
                </li>
             </ul>
          </div><!--/.nav-collapse -->
        </div>

      </div>

      <!-- Begin page content -->
      <div class="container" id="contenidoprincipal">

    <!-- {{ implode('<br>', $errors->all('<li>:message</li>')) }}-->


      

        
        
       
      </div>

    </div>

    @include('footer');


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/spiner.js"></script>
    <script src="js/spinerloading.js"></script>
    <script>
    $(function(){
    	base_url = "{{URL::to('/').'/'}}";
    	var spinermini = new Spinner(optsmini);
    	$(document).ajaxSend(function(){
    		spinermini.spin(target);
    	});
    	 $(document).ajaxStop(function(){
       spinermini.stop();
      });


    	 $("#contenidoprincipal").load(base_url+"administrador/inicio");
    	 $(".menu").on('click',function(e){
    	 	$(".menu").parent().removeClass('active');
    	 	$(this).parent().addClass('active');
    	 	e.preventDefault();
    	 	$("#contenidoprincipal").load(base_url+$(this).attr('href'));
    	 });


       

       
    });
    </script>
  </body>
</html>

