<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="/inventory" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-body">
              <div class="row"> 
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Item Name:</label>
                        <input type="text" name="name" class="custom-input form-control">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Stock QTY:</label>
                        <input type="text" name="stock" class="custom-input form-control">
                      </div>
                  </div>	
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Original Price:</label>
                        <input type="text" name="original_price" class="custom-input form-control">
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Retail Price:</label>
                        <input type="text" name="retail_price" class="custom-input form-control">
                      </div>
                      <input type="hidden" name="sold" value="0" class="form-control">
                  </div>	
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Description:</label>
                        <textarea style="height: 125px;" name="description" class="custom-input form-control" id="message-text"></textarea>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file">
                            <input type="file" name="image" multiple>
                        </span>
                    </span>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-lg fa-times"> Close</i></button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-lg fa-floppy-o"> Save</i></button>
          </div>
        </form>
    </div>
  </div>
</div>
