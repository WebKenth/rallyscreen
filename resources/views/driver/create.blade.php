<form class="form-horizontal" method="POST" action="/driver">
<fieldset>

{{ csrf_field() }}

<!-- Form Name -->
<legend>Driver</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="first_name">First Name</label>
  <div class="col-md-8">
  <input id="first_name" name="first_name" type="text" placeholder="" class="form-control input-md">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="middle_name">Middle Name</label>
  <div class="col-md-8">
  <input id="middle_name" name="middle_name" type="text" placeholder="" class="form-control input-md">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="last_name">Last Name</label>
  <div class="col-md-8">
  <input id="last_name" name="last_name" type="text" placeholder="" class="form-control input-md">

  </div>
</div>

<!-- File Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="image">Image</label>
  <div class="col-md-8">
    <input id="image" name="image" class="input-file" type="file">
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
  <label class="col-md-4 control-label" for="birthday">Birthday</label>
  <div class="col-md-8">
  <input id="birthday" name="birthday" type="date" placeholder="" class="form-control input-md">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="post_nord_id">Post Nord ID</label>
  <div class="col-md-8">
  <input id="post_nord_id" name="post_nord_id" type="text" placeholder="" class="form-control input-md">

  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit"></label>
  <div class="col-md-8">
    <button id="submit" name="submit" class="btn btn-success">Create</button>
  </div>
</div>

</fieldset>
</form>