<div class="modal fade" id="update-item" tabindex="-1" role="dialog" aria-labelledby="updateitemmodal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Update Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="/inventory/update" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-body">
              <div class="row"> 
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Item Name:</label>
                        <input type="text" name="name" id="name" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Description:</label>
                        <textarea id="desc" style="height: 125px;" name="description" class="form-control"></textarea>
                      </div>
                  </div>	
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Stock QTY:</label>
                        <input type="text" id="stock" name="stock" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Original Price:</label>
                        <input type="text" id="original_price" name="original_price" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Retail Price:</label>
                        <input type="text" id="retail_price" name="retail_price" class="form-control">
                      </div>
                      <input type="hidden" id="sold" name="sold" value="0" class="form-control">
                      <input type="hidden" id="id" name="id" value="0" class="form-control">
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
    </div>
  </div>
</div>