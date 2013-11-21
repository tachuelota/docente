<br>
<div class="row">
<div class="col-lg-2 well">

<ul class="nav nav-pills nav-stacked">
  <li id="principal">
    <div class="btn-group">
  <button class="btn btn-default sm-button dropdown-toggle" type="button" data-toggle="dropdown">
    Matutino &nbsp; &nbsp;<span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  	@foreach($matutino as $matu)
   <li><a href="#" id="{{$matu->id}}" class="alumnoaula">{{$matu->aula}}</a></li>
   @endforeach
  </ul>
</div>
  </li>
  <br>
  <br>
 <li>
    <div class="btn-group">
  <button class="btn btn-default sm-button dropdown-toggle" type="button" data-toggle="dropdown">
   Vespertino <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
   @foreach($vespertino as $ves)
   <li><a href="#" id="{{$ves->id}}" class="alumnoaula">{{$ves->aula}}</a></li>
   @endforeach
  </ul>
</div>
</ul>

</div>
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
<div class=" col-lg-8" id="datosalumnos">




</div>
</div>

<script>
$(function(){
base_url = "{{URL::to('/').'/'}}";
$(".alumnoaula").on('click',function(e){
e.preventDefault();
$.ajax(base_url+"administrador/showalumnos",{
	type:'GET',
	data : {"aulaid" : $(this).attr('id')},
	success:function(data){
	$("#datosalumnos").html(data);
	}
});
});


$(".turno").on('click',function(e){
e.preventDefault();
$(".turno").parent().removeClass('active');
$(this).parent().addClass('active');

});



   

});
</script>