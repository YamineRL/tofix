<?php
include 'core/header.php';
?>

 <div class="prod_ran">

<?php
echo "<section>";
	echo "<a href=admin_add.php class='button ajout'>Ajouter un admin</a></section>";
$query = mysqli_query($link, "SELECT * FROM `admin`");
while (($array = mysqli_fetch_assoc($query)) !== NULL)
{
	echo "<section>";
	echo "<strong><a href=modify_admin.php?id=";
	echo $array['id'];
	echo ">";
		echo "</strong>";
	echo $array['login'];
	echo "</a>";
	echo "</section>";
}
?>

</div>