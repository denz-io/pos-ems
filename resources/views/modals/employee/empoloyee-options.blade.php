<!-- Modal -->
<div class="modal fade" id="employeeoptions" tabindex="-1" role="dialog" aria-labelledby="employeeoptions" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="update-employee" action="/home/update" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
          <div class="modal-body"> 
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <img class="profileimage" id="profile" alt="Profile Pic"></img>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Username:</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Phone:</label>
                        <input type="text" id="phone" name="phone" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Status:</label>
                        <input type="text" id="status" name="status" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Rate:</label>
                        <input type="text" id="rate" name="rate" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Password:</label>
                        <input type="password" id="password" name="password" class="form-control">
                        <input type="hidden" id="id" name="id" class="form-control">
                    </div>
                    <div class="form-group">
                        <span class="input-group-btn">
                            <span class="btn btn-default btn-file">
                                <input class="input-file" type="file" name="image" multiple>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div><a onClick="updateUser()" type="button" href="#" class="btn-custom btn btn-warning">Update User</a></div>
                </div>
                <div class="col-md-3">
                    <div><a onClick="deleteUser()" type="button" href="#" class="btn-custom btn btn-danger">Delete User</a></div>
                </div>
                <div class="col-md-3">
                    <div><a id="logs_user" type="button" href="#" class="btn-custom btn btn-primary">Current Logs</a></div>
                </div>
                <div class="col-md-3">
                    <div><a id="payroll_user" type="button" href="#" class="btn-custom btn btn-success">Payroll</a></div>
                </div>
            </div>
          </div>
      </form> 
    </div>
  </div>
</div>
