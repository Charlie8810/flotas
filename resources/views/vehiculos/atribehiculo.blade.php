<div class="input-field col s4 p{{$attr->pestana}}">
  <input id="fd_{{$attr->id}}" type="text" data-type="{{$attr->tipoDato}}" class="validate {{($attr->tipoDato=='fecha') ? 'datepicker' : ''}} no-autoinit">
  <label for="fd_{{$attr->id}}">{{$attr->etiqueta}}</label>
</div>
