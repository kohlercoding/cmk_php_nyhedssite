<?php
    // denne fil inkluderes fra index.php, så der er allerede hul igennem
    // til database, sessions og al design osv...
    // skulle det ske at nogen prøvede at åbne filen direkte,
    // så indlæses siden korrekt med en header-location
    if ( !isset($database_link))
    {
        die(header('location: index.php'));
    }
?>

<h2>Dette er backend forsiden...</h2>

<h3>Oversigt over hvad du skal lave:</h3>
<ul>
	<li>
		<h4><s><a href="index.php?page=editors">Redaktør</a> administrationen skal laves</s></h4>
		<ul>
			<li>
				<s>En <a href="index.php?page=editors">redaktør</a> skal kunne tilføjes som <a href="index.php?page=editors">redaktøren</a> til en eller flere <a href="index.php?page=categories">kategorier</a>.</s>
			</li>
			<li>
				<s>En <a href="index.php?page=editors">redaktør</a> skal kunne fjernes fra valgte <a href="index.php?page=categories">kategorier</a>.</s>
			</li>
		</ul>
	</li>
	<li>
		<h4><s>Når en <a href="index.php?page=editors">redaktør</a> logger på</s></h4>
		<ul>
			<li>
				<s><strong>Nyheds Kategori Menuen</strong> skal afgrænses, til kun at vise de <a href="index.php?page=categories">kategorier</a>&nbsp;<a href="index.php?page=editors">redaktøren</a> har adgang til.</s>
			</li>
			<li>
				<s>På <a href="index.php?page=news&amp;category_id=1">nyheds</a> admin siden, skal der tjekkes på om <a href="index.php?page=editors">redaktøren</a> har rettighed, til at administrere <a href="index.php?page=news&amp;category_id=1">nyhederne</a> i den pågældende <a href="index.php?page=categories">kategori</a>.</s>
			</li>
		</ul>
	</li>

	<li>
		<h4><s>Nyheder</s></h4>
		<ul>
			<li>
				<s>Indsæt en RichTextBox editor på <a href="index.php?page=news&amp;category_id=1">nyheds</a> administrationen</s>
			</li>
		</ul>
	</li>
	<li>
		<h4><s>Brugere</s></h4>
		<ul>
			<li>
				<s><a href="index.php?page=users">Brugernes</a> kodeord skal sikres i databasen med en <strong>HASH</strong> og <strong>SALT</strong></s>
			</li>
		</ul>
	</li>
	<li>
		<h4>RSS Feed Opgaver</h4>
		<ul>
			<li>
				Når en <a href="index.php?page=news&amp;category_id=1">nyhed</a> oprettes, rettes eller slettes, skal <a href="index.php?page=categories">kategoriens</a> RSS feed opdaters
			</li>
			<li>
				Når en <a href="index.php?page=categories">kategori</a> oprettes, rettes eller slettes, så skal den's RSS feed opdateres.
			</li>
		</ul>
	</li>
	<li>
		<h4><s>Frontend specifikke opgaver:</s></h4>
		<ul>
			<li>
				<s>På frontend, skal der oprettes <strong>Paging</strong> under hver <a href="index.php?page=categories">kategori</a>, så der vises 5 nyheder pr side, og man kan bladre rundt imellem siderne i <a href="index.php?page=categories">kategorien</a></s>.
			</li>
			<li>
				<s>Der skal oprettes et link til <a href="index.php?page=categories">kategoriens</a> RSS feed, under hver <a href="index.php?page=categories">kategori</a> (skal selvfølgelig først lave RSS feed delen!)</s>
			</li>
		</ul>
	</li>
</ul>
