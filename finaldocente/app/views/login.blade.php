<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Evaluación Dosente">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
    <link rel="stylesheet"  href="css/signin.css">
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
            <a class="navbar-brand" href="#">LogIn</a>
          </div>
          <div class="collapse navbar-collapse">
           
             <ul class="nav navbar-nav navbar-right">
                <li><a href="{{URL::to('registro')}}"><i class="icon-hand-right"></i>&nbsp;&nbsp;registrarme</a></li>
             </ul>
          </div><!--/.nav-collapse -->
        </div>

      </div>

      <!-- Begin page content -->
      <div class="container">

    <!-- {{ implode('<br>', $errors->all('<li>:message</li>')) }}-->


        {{Form::open(array('url'=>'login','id'=>'login','class'=>'form-signin','autocomplete'=>'off'))}}
       
        <p class="text-center"><img src="images/lock.png"></p>
       <br>
       <div id="errorLogin"></div>
        {{Form::text('username','',array('class'=>'form-control','placeholder'=>'Ingresa Tu Usuario','autofocus','autocomplete'=>'off','minlength'=>'6','maxlength'=>'16','required'))}}
        <br>

       

        {{Form::password('password',array('class'=>'form-control','placeholder'=>'Ingresa Tu Contraseña','id'=>'password','required','minlength'=>'8','maxlength'=>'20'))}}
        <br>
        
       
        

        {{Form::submit('Entrar',array('id'=>'send-formlogin','class'=>'btn btn-lg btn-info btn-block'))}}
        <br><br>
        <div id="cargando"></div>
        {{Form::close()}}

        
        
       
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
if($('#login').length > 0){
  $('#login').validate({

    submitHandler:function(form){
      $.ajax($(form).attr('action'),{
        type:'POST',
        data:$(form).serialize(),
        success:function(data){
          if(data.success==true){
           var base_url = "{{URL::to('/').'/'}}"
           if(data.rol=="1"){
             location.href= base_url + 'administrador';
           }else if(data.rol=="2"){
             location.href= base_url + 'alumno';
           }
          
          }
          else if(data.success == 'errorValidacion'){
           var errores = '';
           for(datos in data.message){
           if(datos == 'username'){
            alert(data.message[datos]);
           }else if(datos == 'password'){
            alert(data.message[datos] + " en el campo contraseña");
           }
           }

          }else if(data.success == 'errorDatos'){
            $("#errorLogin").html("<div class='alert alert-warning'>"+data.message+"<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button></div>");
          }
        },
        error:function(request,errorType,errorMessage){
          alert(errorMessage);
        },
        timeout : 4000,
        beforeSend:function(){
           spinner.spin(target);
        },
        complete:function(){
           spinner.stop();
        }
      });
    }

  });
}


    });
    </script>
  </body>
</html>

