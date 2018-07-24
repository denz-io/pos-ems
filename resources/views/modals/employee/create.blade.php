<!-- Large modal -->
<div class="modal fade" id="employee-create" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="/home/create" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Employee Name</label>
                <div class="col-md-6">
                    <input class="custom-input" id="text" type="text" name="name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Phonenumber</label>
                <div class="col-md-6">
                    <input class="custom-input" id="text" type="text" name="phone" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Position</label>
                <div class="col-md-6">
                    <input class="custom-input" id="text" type="text" name="position" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Rate/Hour</label>
                <div class="col-md-6">
                    <input class="custom-input" id="text" type="number" name="rate" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Username</label>
                <div class="col-md-6">
                    <input class="custom-input" id="text" type="text" name="username" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                <div class="col-md-6">
                    <input class="custom-input" id="password" type="password" name="password" required>
                    <input type="hidden" name="status" value="employee" required>
                    <input type="hidden" name="is_loggedin" value="0" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file">
                            <input style="width:50%;"type="file" name="image" multiple>
                        </span>
                    </span>
                </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
    </div>
  </div>
</div>
