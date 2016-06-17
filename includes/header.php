<?
$_SETTINGS['site']['menu'] = array('/login'=>'Login', '/signup'=>'Signup');
require_once('includes/loader.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=$_SETTINGS['site']['title'] . ' -> ' . $_SETTINGS['page']; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/styles/style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navContainer">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><?=$_SETTINGS['site']['leftNav']; ?></a>
		</div>
		<div class="collapse navbar-collapse" id="navContainer">
			<ul class="nav navbar-nav navbar-right">
			<?
				foreach ($_SETTINGS['site']['menu'] as $link => $title):
					echo '<li><a href="' . $link . '">' . $title . '</a></li>';
				endforeach;
			?>
			</ul>
		</div>
	</div>
</nav>