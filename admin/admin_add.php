<?php
	include "core/header.php";
	include "../connect.php";
	if (isset($_POST['acc_admin']))
	{
		$query = mysqli_query($link, "SELECT * FROM `admin`");
		while (($array = mysqli_fetch_assoc($query)) !== NULL)
		{
			if ($array['login'] === $_POST['login'])
			{
				echo "Ce compte existe déjà";
				return ("Ce compte existe déjà");
			}
		}
		if (!isset($_POST['login']) || !isset($_POST['passwd']))
			error();
		else
		{
			$stmt = mysqli_prepare($link, "INSERT INTO admin(login, mdp) 
				VALUES (?, ?)");
			$bind = mysqli_stmt_bind_param($stmt, "ss", $_POST['login'], hash("whirlpool", $_POST['passwd']));
			$exec = mysqli_stmt_execute($stmt);
			echo '<script>window.location="admin.php"</script>';
			// header("Location:./index.php");
		}
	}
?>

<form id="create-account_form" class="std" method="post" action="admin_add.php">
	<fieldset>
		<h3>Creation compte admin</h3>
		<div class="labele">
		<label for="login">Login : </label><input id="login" type="text" name="login" /> <br>
		<label for="passwd">Mot de pase : </label><input id="passwd" type="password" name="passwd" /> <br>
		<input type="submit" class="submit" value="Creer" name="acc_admin">
		</div>
	</fieldset>
</form>