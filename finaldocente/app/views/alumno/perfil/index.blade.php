
<div class="row">


    		  
<div class="col-lg-7">

<div class="panel panel-primary">
	<div class="panel-heading">Turno y Aula</div>
	<br>
<div class="well">

<dl class="dl-horizontal">
  @foreach($aulas as $aula)
  <dt>TURNO</dt>
  <dd>{{$aula->turno}}</dd>
  <br>
   <dt>AULA</dt>
  <dd>{{$aula->aula}}</dd>
  @endforeach
</dl>

<br>
</div>

</div>

<div class="panel panel-primary">
	<div class="panel-heading">Perfil</div>
	<br>
<div class="well">
 @foreach($datos as $dato)


{{Form::open(array('class'=>'form-horizontal','role'=>'form'))}}
<div class="form-group">
<label for="nombre" class="col-sm-4 control-label">NOMBRE</label>
<div class="col-sm-8">
{{Form::text('nombre',$dato->nombre,array('class'=>'form-control','disabled'))}}
</div>
</div>

<div class="form-group">
<label for="nombre" class="col-sm-4 control-label">CURP</label>
<div class="col-sm-8">
{{Form::text('curp',$dato->curp,array('class'=>'form-control','disabled'))}}
</div>
</div>

<div class="form-group">
<label for="nombre" class="col-sm-4 control-label">CORREO</label>
<div class="col-sm-8">
{{Form::email('correo',$dato->email,array('class'=>'form-control','disabled'))}}
</div>
</div>

<div class="form-group">
<label for="nombre" class="col-sm-4 control-label">TELEFONO</label>
<div class="col-sm-8">
{{Form::text('telefono',$dato->telefono,array('class'=>'form-control','disabled'))}}
</div>
</div>


{{Form::close()}}
 @endforeach
<br>
</div>

</div>

</div>

<div class="col-lg-5">

<div class="panel panel-primary">
	<div class="panel-heading">CLASES</div>
<table class="table table-hover">
<thead>
<tr>
<th>Materia</th>
<th>Maestro</th>


</tr>
</thead>
<tbody>
@foreach($materias as $materia)
<tr>
<td>{{$materia->materia}}</td>
<td>{{$materia->nombre}}</td>

</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>