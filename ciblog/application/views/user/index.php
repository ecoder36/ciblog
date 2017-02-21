
<h2><?=  $title ?></h2>
<?php echo isset($msg) ? $msg :'' ; ?>


	<h3><?php //echo $user['title']; ?></h3>
	<div class="row">
			<script type="text/javascript" class="init">
$(document).ready(function() {
	$('.example').DataTable();
} );
	</script>
		<div class="">
	<table id="" class="example display" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>id</th>
				<th>username</th>
				<th>email</th>
				<th>delete</th>
			</tr>
		</thead>
		<tbody>
		    <?php foreach($users as $user) : 
		        //if($post['title'] == "test" || $post['title'] == 'dfhgdf') {
			?>
			<tr>
				<td><?php echo $user['id']; ?></td>
				<td><?php echo $user['username']; ?></td>
				<td><?php echo $user['email']; ?></td>
				<td><a class="btn btn-sm btn-default pull-left" href="<?php echo base_url(); ?>user/edit/<?php echo $user['id']; ?>">Edit</a>
				<?php echo form_open('/user/delete/'.$user['id']); ?><input type="submit" value="Delete" class="btn btn-sm btn-danger"></form>
				<a class="btn btn-sm btn-default pull-right" href="<?php echo base_url(); ?>user/delete/<?php echo $user['id']; ?>">d2</a>
				</td>
			</tr>
			
			<?php                                                                      
				//}
				endforeach; ?>
		</tbody>
	</table>
		</div>
	</div>


