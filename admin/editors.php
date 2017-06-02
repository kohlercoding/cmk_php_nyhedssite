<?php
    // denne fil inkluderes fra index.php, så der er allerede hul igennem
    // til database, sessions og al design osv...
    // skulle det ske at nogen prøvede at åbne filen direkte,
    // så indlæses siden korrekt med en header-location
    if ( !isset($database_link))
    {
        die(header('location: index.php?page=editors'));
    }
?>

<h2>Redaktør Administration</h2>
<?php 
	if(isset($_POST['choose'])) {
		$_SESSION['category_id'] = $_POST['category_id'];
	}
	if(isset($_SESSION['category_id'])) {
		$category_id = $_SESSION['category_id'];
	}
?>
<form class="form-inline" method="post">
	<div class="form-group">
		<select class="form-control" name="category_id">
			<?php 
				$query = "SELECT * FROM categories";
				$result = mysqli_query($database_link, $query);
				while($row = mysqli_fetch_assoc($result)):
			?>
			<option value="<?= $row['category_id']; ?>"><?= $row['category_title']; ?></option>
			<?php
				endwhile;
			?>
		</select>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="choose" value="Vælg">
	</div>
</form>
<!-- <div class="panel panel-info">
	<p class="panel-heading">
		Dette skal du lave :)
	</p>
	<div class="panel-body">
		<ul>
			<li>
				Hver enkelt redaktør skal have adgang til en eller flere kategorier.
			</li>
			<li>
				Slettes en kategori, så skal redaktørens adgang selvfølgelig også fjernes
			</li>

		</ul>
	</div>
</div> -->
<form method="post">
	<div class="col-md-5">
		<h3>Ikke Redaktører</h3>
		<select class="form-control" name="not_editor[]" multiple="multiple" size="20">
			<?php 
				$query = "SELECT user_id, user_name FROM users WHERE user_id NOT IN (SELECT fk_users_id FROM category_editors WHERE fk_categories_id = '$category_id') AND fk_roles_id = 3";// 3 == redaktør
				$result = mysqli_query($database_link, $query) or die(mysqli_error($database_link));
				while ($row = mysqli_fetch_assoc($result))
				{
					echo '<option value="'.$row['user_id'].'">'.$row['user_name'].'</option>';
				}
			?>
		</select>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<button type="submit" name="editors" class="btn btn-lg btn-success">
				<span class="glyphicon glyphicon-refresh"></span>
			</button>
		</div>
	</div>
	<div class="col-md-5">
		<h3>Redaktører</h3>
		<select class="form-control" name="is_editor[]" multiple="multiple" size="20">
			<?php
				$query = "SELECT user_id, user_name FROM users INNER JOIN category_editors ON fk_users_id = user_id WHERE fk_categories_id = $category_id AND fk_roles_id = 3";// 3 == redaktør
				$result = mysqli_query($database_link, $query) or die(mysqli_error($database_link));
				while ($row = mysqli_fetch_assoc($result))
				{
					echo '<option value="'.$row['user_id'].'">'.$row['user_name'].'</option>';
				}
			?>
		</select>
	</div>
</form>

