<label for="telefono" class="col-sm-4 control-label">AULA</label>
  <div class="col-sm-6" id="seleccionaaula">
<select name="aula" class="form-control">
  @foreach($aulas as $aula)
  <option value="{{$aula->id}}">{{$aula->aula}}</option>
  @endforeach
</select>
  </div>