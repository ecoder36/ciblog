<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create'); date_default_timezone_set('Asia/Riyadh');
 ?>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" value="<?php echo set_value('title'); ?>" placeholder="Add Title">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"></textarea>
  </div>
  <div class="form-group">
	  <label>Category</label>
	  <select name="category_id" class="form-control">
		  <?php 
		  //foreach($posts as $post):
		  foreach($categories as $category):
		  ?>
		  	<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
		  <?php endforeach; ?>
	  </select>
  </div>
  <div class="form-group">
	  <label>Upload Image</label>
	  <input type="file" name="userfile" size="20">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>