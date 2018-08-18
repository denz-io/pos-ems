<!-- Large modal -->
<div class="modal fade" id="update-log" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <i class="fa fa-lg fa-pencil-square-o"> PayStubs</i>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="/payroll/update" method="POST">
          {{ csrf_field() }}
            <div class="form-group row">
                <label for="password" class="col-md-3 col-form-label text-md-right">Log In</label>
                <div class="col-md-7">
                    <input class="custom-input" id="time_in" type="text" name="time_in" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-3 col-form-label text-md-right">Log Out</label>
                <div class="col-md-7">
                    <input class="custom-input" id="time_out" type="text" name="time_out" required>
                    <input class="custom-input" id="id" type="hidden" name="id" required>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                <button class="btn btn-success" type="submit" href="#"><i class="fa fa-lg fa-pencil-square-o"> Update Log</i></button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
