<div class="container">
      <div class="page-header">
            <h1>Simple CRUD System <button id="btn-delete-all" class="btn btn-lg btn-danger float-right" disabled=""><i class="fa fa-trash"></i> Delete All</button><a href="<?php echo base_url() ?>article/add_new_article" class="btn btn-lg btn-success float-right"><i class="fa fa-plus"></i> Add New</a></h1>
      </div>
      <hr>

      <?php if ($this->session->has_userdata('success')) {?>
    <div class="alert alert-primary" role="alert">
        <?php echo $this->session->flashdata('success') ?>
    </div>
    <?php }?>

    <?php if ($this->session->has_userdata('error')) {?>
    <div class="alert alert-danger" role="alert">
        <?php echo $this->session->flashdata('error') ?>
    </div>
    <?php }?>

  </div>

<div class="container">
            <div class="card card-default">
      <h3 class="card-header">Article List</h3>
      <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th colspan="2" class="text-center">ID</th>
                  <th>Article title</th>
                  <th>Brief</th>
                  <th>Event Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
            <?php if (count($articles) > 0) {
    foreach ($articles as $article) {
        ?>
              <tr>
                  <td>
                    <label class="form-check-label">
                     <input type="checkbox" value="<?php echo $article->article_id ?>" name="article_checkbox[]" class="article form-check-input btn-check-article">
                    </label>
                  </td>
                  <td><?php echo $article->article_id ?></td>
                  <td><a href="#"><?php echo substr($article->article_title, 0, 10) . '...' ?></a>
                  </td>
                  <td>
                      <p><?php echo substr(strip_tags($article->article_text), 0, 20) . '...' ?></p></td>
                  <td><?php echo $article->article_event_dt ?></td>
                  <td>
                    <a href="<?php echo base_url('article/edit/') . $article->article_id ?>" class="btn btn-primary btn-xs"> Update</a>
                    <a href="#" class="btn btn-danger btn-xs btn-delete" data-id="<?php echo $article->article_id ?>"> Delete</a>
                  </td>
                </tr>
            <?php }
}
?>
            </tbody>
        </table>
         <?php echo $pagination ?>
        </div>
     </div>

    </div>
    <hr>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Conform</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="<?php echo base_url('article/delete/') . $article->article_id ?>" method="post">
          <div class="modal-body">
            Do you want to delete this record?
            <input type="hidden" id="hidden_article" name="article_id">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Yes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- all selected item delete -->
    <div class="modal fade" id="allitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Conform</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="<?php echo base_url('article/delete/') . $article->article_id ?>" method="post">
          <div class="modal-body">
            Do you want to delete those record?
            <input type="hidden" id="hidden_article" name="article_id">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Yes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <script>
      $('.btn-delete').on('click', function(){
        $('#exampleModal').modal('show');
      });


      $('.btn-check-article').on('change', function(){
        $('#btn-delete-all').attr('disabled', false);
      });

      $('#btn-delete-all').on('click', function(){
        var checkboxValues = [];
            $('input[type="checkbox"]:checked').each(function(index, elem) {
                checkboxValues.push($(elem).val());
            });
            var id = checkboxValues.join(',');
            console.log(id);
            $('#hidden_article').val(id);
            $('#allitem').modal('show');
      });
    </script>
 </div>
