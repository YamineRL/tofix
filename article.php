<?php
include 'core/header.php';
if (isset($_GET['id']))
{
	$id = mysqli_real_escape_string($link, $_GET['id']);
	$query = 'SELECT * FROM produit WHERE id="'.$id.'"';
	$array = mysqli_query($link, $query);
	$row = mysqli_fetch_assoc($array);
	if (empty($row))
	{
		echo "<span class='erreur'>Une erreur est survenue, veuillez revenir a l'accueil</span>";
	}
	else
	{
?>
</div>
<section class="title_product menu">
	<div class="wrapper">
		<h1><?php echo $row['nom'] ?></h1>
	</div>
</section>
<div class="wrapper">
<div class="single_wr">
	<div class="cadre">
		<img src="<?php echo $row['image']; ?>" alt="">
	</div>

	<div class="desc">
		<p class="description">
			<?php echo $row['description']; ?>
		</p>
		<p class="price">
			<?php echo $row['prix']; ?>
		</p>
		<p class="add_to_cart">
			<p>Quantité :</p>
			<form action="article.php?id=<?php echo $_GET['id'];?>" method="post">
				<input type="text" name="quantity" class="quantity_single" value="1"/>
				<input class="addcart" type="submit" name="addtocart" value="Ajoutez au panier">
			</form>
		</p>
	</div>
</div>
<div class="clearboth"></div>

<?php
}
}
else{

}

include 'core/footer.php';
?>
