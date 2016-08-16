<form class="form-horizontal" action="/vehicle" method="POST">
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
    <select name="type" id="type" class="form-control">
      <option value="truck">Lastbil</option>
      <option value="van">Van</option>
    </select>
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

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="diims_id">Diims ID</label>
  <div class="col-md-8">
    <select name="diims_id" class="form-control" id="diims_id">
      <option value="869606020004341">869606020004341</option>
    </select>
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