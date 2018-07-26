<!-- Large modal -->
<div class="modal fade" id="showmoreinventory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Info</h5>
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
                        <input type="text" id="name" name="name" class="custom-input" readonly>
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Units Sold:</label>
                        <input type="text" id="sold" name="sold" class="custom-input" readonly>
                      </div>
                  </div>	
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Stock QTY:</label>
                        <input type="text" id="stock" name="stock" class="custom-input" readonly>
                      </div>
                      <div class="row"> 
                          <div class="col-md-6">
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Original Price:</label>
                                <input type="text" id="original_price" name="original_price" class="custom-input" readonly>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                <label for="message-text" class="col-form-label">Retail Price:</label>
                                <input type="text" id="retail_price" name="retail_price" class="custom-input" readonly>
                              </div>
                              <input type="hidden" id="sold" name="sold" value="0" class="form-control" readonly>
                          </div>	
                      </div>	
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Description:</label>
                        <textarea style="height: 125px;" id="desc" name="description" class="custom-input" id="message-text" readonly></textarea>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-lg fa-times"></i> Close</button>
          </div>
        </form>
    </div>
  </div>
</div>
