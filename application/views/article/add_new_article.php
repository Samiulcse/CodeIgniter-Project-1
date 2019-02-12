<div class="container">
      <div class="page-header">
            <h1>Simple CRUD System <a href="<?php echo base_url('article') ?>" class="btn btn-lg btn-success float-right"> View Article</a></h1>
      </div>
      <hr>
  </div>
  
  <div class="container">
    <div class="card card-default">
      <h3 class="card-header">Add new article</h3>
      <div class="card-body">
        <form action="<?php echo base_url('article/save') ?>" method="post">
          <div class="form-group">
            <label for="firstName">Article title</label>
            <?php echo form_error('in_val[article_title]', '<div class="error text-danger">', '</div>'); ?>
            <input type="text" class="form-control" name="in_val[article_title]" placeholder="Enter article title">
            <input type="hidden" class="form-control" name="in_val[user_id]" value="<?php echo $this->session->userdata['id'];?>" placeholder="Enter article title">
        </div>
          <div class="form-group">
            <label for="lastName">Event Data</label>
            <?php echo form_error('in_val[article_event_dt]', '<div class="error text-danger">', '</div>'); ?>
            <input type="text" class="form-control" id="date-picker" data-date-format="yyyy-mm-dd" name="in_val[article_event_dt]" placeholder="YYYY-MM-DD">
        </div>
          <div class="form-group">
            <label for="articleText">Article text</label>
            <?php echo form_error('in_val[article_text]', '<div class="error text-danger">', '</div>'); ?>
            <textarea class="form-control ckeditor" name="in_val[article_text]" id="articleText"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
    <hr>
</div>

<script>
$(document).ready(function () {
    $('#date-picker').datepicker({
    autoclose: true,
    todayHighlight: true
});
});
</script>
