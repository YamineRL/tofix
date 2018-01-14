<?php
include 'core/header.php';
include 'core/modify_admin.php';

	if (isset($_GET['id']))
	{
		$id = mysqli_real_escape_string($link, $_GET['id']);
		$query = 'SELECT * FROM admin WHERE id="'.$id.'"';
		$array = mysqli_query($link, $query);
		$row = mysqli_fetch_assoc($array);
	if (empty($row))
	{
		echo "<span class='erreur'>Une erreur est survenue, veuillez revenir a l'accueil</span>";
	}
	else
	{
?>
<div class="form admin_form">

	<form action="modify_admin.php?id=<?php echo $_GET['id']; ?>" method="post">
		<fieldset>
			<h3>Modifier le compte</h3>
			<?php if(isset($err_enre)) echo "<span class'succ'>$err_enre</span>"; ?>
			<div class="labele">
		<label for="name">Login: </label><input type="text" name="login" value="<?php echo $row['login'];?>" /> <br>
		<label for="name">Mot de passe : </label><input type="password" name="passwd" value="" /> <br>
		<input type="submit" name="modify" value="Modifier le client" />
		<input type="submit" name="delete" value="Supprimer le client" />
	</div>
		</fieldset>
	</form>
</div>
<?php
	}
	}
	else{
		echo "<span class='erreur'>Une erreur est survenue, veuillez revenir a l'accueil</span>";
	}
?>