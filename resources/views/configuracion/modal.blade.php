<!-- Modal Structure -->
  <div id="{{$unique}}" class="modal modal-fixed-footer">
    <div class="modal-content" id="content-{{$unique}}">
      {{ $slot }}
    </div>
    <div class="modal-footer">
      {{$footer}}
    </div>
  </div>
