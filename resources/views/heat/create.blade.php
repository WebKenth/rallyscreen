<form class="form-horizontal" method="POST" action="/heat" enctype="multipart/form-data">
<fieldset>

{{ csrf_field() }}

<!-- Form Name -->
<legend>Heat</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="number">Nummer</label>
  <div class="col-md-8">
  <input id="number" name="number" type="text" placeholder="1" class="form-control input-md">

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