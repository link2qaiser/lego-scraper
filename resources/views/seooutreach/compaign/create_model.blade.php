<form role="form" action="{{$action}}" method="post" enctype="multipart/form-data" class="make_ajax">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">{{$model_title}}</h4>
    </div>
    <div class="modal-body"> 
       
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" id="title" class="form-control" placeholder="Find expired domain" required="">
        </div>
        <div class="form-group">
          <label for="deep_crawl">Deep Crawl</label>
          <select name="deep_crawl" id="deep_crawl" class="form-control" required="">
            <option value="1">Yes</option>
            <option value="0">No</option>
          </select>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea type="text" id="description" name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label for="matched_kewords">Match Keywords</label>
          <textarea type="text" id="matched_kewords" name="matched_kewords" placeholder="Enter each keyword in new line" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label for="negtive_keyword">Negtive Keywords</label>
          <textarea type="text" id="negtive_keyword" name="negtive_keyword" placeholder="Enter each keyword in new line" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label for="tags">Tags</label>
          <textarea type="text" id="tags" name="tags" placeholder="Enter each keyword in new line" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label for="title">Google Date Range</label>
          <div class="row">
            <div class="col-md-6">
              Start:<input type="date" name="g_dstart" id="g_dstart" class="form-control">
            </div>
            <div class="col-md-6">
              End:<input type="date" name="g_dend" id="g_dend" class="form-control">
            </div>
          </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
        <button type="submit" class="btn green">Create</button>
    </div>
</form>