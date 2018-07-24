<!-- Large modal -->
<div class="modal fade" id="employee-create" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">PayStubs</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
            <table class="table table-striped" id="users" style="width:100%; text-align: center;">
              <thead>
                <tr>
                  <th scope="col">Released</th>
                  <th scope="col">Option</th>
                </tr>
              </thead>
              <tbody>
                @foreach($logs as $log) 
                    <tr>
                      <td>{{Carbon::parse($log->time_in)->format('F m Y')}}</td>
                      <td>
                          <a href="#" class="btn btn-success">View</a>
                          @if (Auth::user()->status == 'admin')
                              <a href="#" class="btn btn-danger">Delete</a>
                          @endif
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
      </div>
    </div>
  </div>
</div>
