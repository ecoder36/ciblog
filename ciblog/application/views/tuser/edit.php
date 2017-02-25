



<h2><?= $title; ?></h2>


<?php echo isset($msg) ? $msg :'' ; ?>
<?php echo validation_errors(); ?>

<?php echo form_open_multipart('tuser/update/'.$users['id']); date_default_timezone_set('Asia/Riyadh');
 ?>
 	<input type="hidden" name="id" value="<?php echo $users['id']; ?>">
  <div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control" name="username" value="<?php if(isset($_POST['username'])){ echo set_value('username'); }else{ echo $users['username'] ; } ?>" placeholder="Add username">
     <?php echo form_error('username','<span class="help-block">','</span>'); ?>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" name="email" value="<?php if(!empty($_POST['email'])){ echo set_value('email');}else{ echo $users['email']; } ?>" placeholder="Add email">
     <?php echo form_error('email','<span class="help-block">','</span>'); ?>
   </div>
   <div class="form-group">
    <label>Password</label>
     <input type="text" class="form-control" name="password" value="" placeholder="Password" >
     <?php echo form_error('password','<span class="help-block">','</span>'); ?>
   </div>
<!--<div class="form-group">-->
<!--    <label>Passwordc</label>-->
     <!--<input type="password" class="form-control" name="passconf" value="<?php // echo $users['passconf'] ; ?>" placeholder="passconf" required="">-->
     <?php // echo form_error('passconf','<span class="help-block">','</span>'); ?>
<!--   </div>-->
 
  
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>