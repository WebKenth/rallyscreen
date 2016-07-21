<form class="form-horizontal" data-type="vehicle">
<fieldset>

{{ csrf_field() }}

<!-- Form Name -->
<legend>Vehicle</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Name</label>
  <div class="col-md-8">
  <input id="name" name="name" type="text" placeholder="" class="form-control input-md">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="brand">Brand</label>
  <div class="col-md-8">
  <input id="brand" name="brand" type="text" placeholder="" class="form-control input-md">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="type">Type</label>
  <div class="col-md-8">
  <input id="type" name="type" type="text" placeholder="" class="form-control input-md">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="reg_nr">Registration Number</label>
  <div class="col-md-8">
  <input id="reg_nr" name="reg_nr" type="text" placeholder="" class="form-control input-md">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="model">Model</label>
  <div class="col-md-8">
  <input id="model" name="model" type="text" placeholder="" class="form-control input-md">

  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-4">
    <button id="submit" name="submit" class="btn btn-success">Create</button>
  </div>
</div>

</fieldset>
</form>