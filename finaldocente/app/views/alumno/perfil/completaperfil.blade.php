<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Evaluación Docente">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
   
    <link rel="stylesheet"  href="css/validating-style.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
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
            <a class="navbar-brand" href="#">Completa tu Perfil</a>
          </div>
          <div class="collapse navbar-collapse">
          
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

    <div class="row">
    	<div class="col-lg-4" id="ddf"></div>
    	<div class="col-lg-8">
    		<div class="page-header">
  <h1>Completa tu Perfil a Continuación<small></small></h1>
  
</div>
<div class="well">

{{Form::open(array('url'=>'alumno/guardaperfil','class'=>'form-horizontal','role'=>'form','id'=>'formularioperfil'))}}
<div class="form-group">
  <label for="nombre" class="col-sm-4 control-label">NOMBRE</label>
  <div class="col-sm-6">
{{Form::hidden('idusuario',Auth::user()->id)}}
{{Form::text('nombre','',array('id'=>'nombre','class'=>'form-control'))}}
  </div>
</div>
<div class="form-group">
  <label for="curp" class="col-sm-4 control-label">CURP</label>
  <div class="col-sm-6">
{{Form::text('curp','',array('id'=>'curp','class'=>'form-control','maxlength'=>'20'))}}
  </div>
</div>
<div class="form-group">
 <label for="correo" class="col-sm-4 control-label">CORREO</label>
  <div class="col-sm-6">
{{Form::email('correo','',array('id'=>'correo','class'=>'form-control','maxlength'=>'50'))}}
  </div>
</div>
<div class="form-group">
 <label for="telefono" class="col-sm-4 control-label">TELEFONO</label>
  <div class="col-sm-6">
{{Form::text('telefono','',array('id'=>'telefono','class'=>'form-control','maxlength'=>'15'))}}
  </div>
</div>

<div class="form-group">
 <label for="telefono" class="col-sm-4 control-label">TURNO</label>
  <div class="col-sm-6">
{{Form::select('turno',array('0'=>'ELIGE TU TURNO','1'=>'MATUTINO','2'=>'VESPERTINO'),'',array('id'=>'turno','class'=>'form-control'))}}
  </div>
</div>

<div class="form-group" id="aulaform">
 
</div>

<div class="form-group">
   <label for="submit" class="col-sm-4 control-label"></label>
 <div class=" col-sm-4">
{{Form::submit('Guardar Perfil',array('class'=>'btn btn-primary'))}}
  </div>
</div>
{{Form::close()}}

</div>
</div>

    </div>
       
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

      $("#formularioperfil").validate({
        submitHandler : function(form){
         $.ajax($(form).attr('action'),{
          type:'POST',
          data:$(form).serialize(),
          success:function(data){
           if(data.success){
            location.href = base_url+"alumno";
           }
          }

         });
        }
      });

      $("#turno").on('change',function(event){
       
      $.ajax(base_url+"alumno/muestraaulas",{
        type : 'GET',
        data:{"idturno":$(this).val()},
        success:function(data){
        $("#aulaform").hide().html(data).fadeIn();
        }

      });
      });
    });
    </script>
  </body>
</html>

