<?php
include ('../connect.php');

if (isset($_POST['modify']))
{
	if (!isset($_POST['login']) || !isset($_POST['passwd']))
	{
		$err_enre = "N'oubliez pas de remplir les champs obligatoires";
	}
	else
	{
		$id = mysqli_real_escape_string($link, $_GET['id']);
		$login = mysqli_real_escape_string($link, $_POST['login']);
		if ($_POST['passwd'] !== "")
		{
			$passwd = hash("whirlpool", $_POST['passwd']);
			$sql = "UPDATE admin SET login='$login', mdp='$passwd' WHERE id='$id'";
		}
		else
		{
			$sql = "UPDATE admin SET login='$login' WHERE id='$id'";
		}
			if (mysqli_query($link, $sql) === TRUE)
				$err_enre = "Votre admin a bien été modifié";
			else
				$err_enre = "Une erreur est survenue";
	}
}
if (isset($_POST['delete']))
{
	$count = "SELECT COUNT(*) as total FROM admin";
	$n_count = mysqli_query($link, $count);
	$n_row = mysqli_fetch_assoc($n_count);
	if ($n_row['total'] == "1")
		$err_enre = "Vous devez garder au moins un compte admin";
	else
	{
		$id = mysqli_real_escape_string($link, $_GET['id']);
		$sql = "DELETE FROM admin WHERE id=$id";
		mysqli_query($link, $sql);
		echo '<script>window.location="admin.php"</script>';
	}
	// header("Location:./admin.php");
}
?>