<!-- Large modal -->
<div class="modal fade" id="show-payroll" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">PayStubs</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
            <table class="display nowrap table table-striped" id="stubs" style="width:100%;">
              <thead>
                <tr>
                  <th scope="col">Released</th>
                  <th scope="col">Option</th>
                </tr>
              </thead>
              <tbody>
                @foreach($stubs as $stub) 
                    <tr id="{{'paystub_' . $stub->id}}">
                      <td>{{Carbon::parse($stub->created_at)->format('F m Y')}}</td>
                      <td>
                          <a href="/payroll/stubs/{{$stub->id}}" class="btn btn-success"><i class="fa fa-lg fa-eye"></i> View</a>
                          @if (Auth::user()->status == 'admin')
                              <a href="#" data-id="{{$stub->id}}" class="delete_payroll btn btn-danger"><i class="fa fa-lg fa-trash-o"></i> Delete</a>
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
