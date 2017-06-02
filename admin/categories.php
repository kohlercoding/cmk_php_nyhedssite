<?php
    // denne fil inkluderes fra index.php, så der er allerede hul igennem
    // til database, sessions og al design osv...
    // skulle det ske at nogen prøvede at åbne filen direkte,
    // så indlæses siden korrekt med en header-location
    if ( !isset($database_link))
    {
        die(header('location: index.php?page=categories'));
    }

    // tjek for om brugeren er redaktør, hvis den er så tjek for om der er rettigheder til kategorien
    if($_SESSION['user']['role_access'] === 10)
    {
        $uid = $_SESSION['user']['user_id'];
        $cid = $_GET['category_id'];
        $permcheck = mysqli_query($database_link, "SELECT * FROM category_editors WHERE fk_users_id='$uid' AND fk_category_id='$cid'");
        if(mysqli_num_rows($permcheck) < 1) {
            header("Location: index.php");
        }
    }
    /****************************************************************************
     * DIN OPGAVE!
     *
     * 1. Denne side skal tjekke om brugeren der er logget på, er redaktør og om
     *    redaktøreren har rettigheder til at skrive i den pågældende kategori
     *    Er man redaktør i kategorien, har man FULD ret til at oprette, rette og
     *    slette samtlige nyheder i den pågældende kategori.
     ****************************************************************************/

    echo '<h2>Kategori Administration</h2>';

    // her findes der ud af hvilken del af kategori admin der skal vises
    // baseret på om der står en action i adressebaren
    if (isset($_GET['action']))
    {
        switch($_GET['action'])
        {
            case 'add' :
                include ('page_functions/category_add.php');
                break;
            case 'edit' :
                include ('page_functions/category_edit.php');
                break;
            case 'delete' :
                include ('page_functions/category_delete.php');
                break;
        }
    }
    else
    {
        // hvis der ikke står en action i URL, så hentes listen
        include ('page_functions/category_list.php');
    }
?>

