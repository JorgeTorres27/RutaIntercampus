@if(Session::has('message-error'))

<div class="alert alert-dismissible alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  {{Session::get('message-error')}}
</div>
@endif