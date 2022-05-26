@if (isset($errors))
@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h5><span class="font-weight-bold">Error:</span> Por favor, corrige los siguientes errores:</h5>
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
</div>
@endif
@endif