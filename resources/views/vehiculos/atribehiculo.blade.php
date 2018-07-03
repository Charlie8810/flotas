<div class="input-field col s12 m4 pst-{{$attr->pestana}}">
  <input id="{{$attr->etiqueta_slug}}" name="attr_{{$attr->id}}" type="text" data-type="{{$attr->tipoDato}}" class="validate {{($attr->tipoDato=='fecha') ? 'datepicker' : ''}} no-autoinit" value="{{$attr->valor}}">
  <label for="{{$attr->etiqueta_slug}}">{{$attr->etiqueta}}</label>
</div>
