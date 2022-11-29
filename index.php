<?php
session_start(); ?>
<!DOCTYPE html>
<title>BackFans - the only service for backup fans</title>
<meta charset="UTF-8">
<link rel="icon" type="image/png" href="/big.png">
<link rel="stylesheet" href="/style.css">
<header>
	<nav><ul>
		<li><a href="#">Home</a>
		<li><a href="#">Links</a>
		<li><a href="#">About</a>
	</ul></nav>
<?php	if(isset($_SESSION['login'])){ ?>
	<span>Welcome <?= $_SESSION["user"]["username"] ?>
	<a href="/logout.php" class="login">logout</a>
	</span>
<?php } else { ?>
	<span><a class="login" href="/login.php">login</a></span>
<?php } ?>
</header>
<main>
	<article>
		<h1>BackFans</h1>
		<p>BackFans is the platform revolutionizing connections between people and backup. The site is inclusive of gamers and bloggers of all genres and does not allow them to monetize while having a genuinely reliable way to download backups of games and blog posts.
<?php	if(isset($_SESSION['login'])){ ?>
		<a class="backup" href="minecraft_backup.php">minecraft</a>
		<a class="backup" href="ghost_backup.php">ghost</a>
<?php } ?>
	</article>
</main>
<footer>
	<nav><ul>
		<li><a href="#">Home</a>
		<li><a href="#">Links</a>
		<li><a href="#">About</a>
	</ul></nav>
</footer>
