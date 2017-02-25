<html>
	<head>
		<title>ciBlog</title>
		<link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>../assets/css/style.css">
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js">
	</script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js">
	</script>
	</head>
	<body>

<nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url(); ?>">ciBlog</a>
        </div>
        <div id="navbar">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><a href="<?php echo base_url(); ?>about">About</a></li>
            <li><a href="<?php echo base_url(); ?>posts">Blog</a></li>
            <li><a href="<?php echo base_url(); ?>tuser/create">New User</a></li>
            <li><a href="<?php echo base_url(); ?>tuser/index">user list</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo base_url(); ?>posts/create">Create Post</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">