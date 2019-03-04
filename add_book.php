
<?php  
include('header.php');
include('connection.php');
?>
<?php 
$title = null;
$date = null;
$price = null;
$cover = null;
$isbn = null;
// Traitement du formulaire
if (!empty($_POST)) {
    $title = htmlspecialchars($_POST['title']);
    $date = $_POST['release_date'];
    $price = strip_tags($_POST['price'], '<strong>');
    $cover = $_FILES['cover'];
    $isbn = $_POST['isbn'];
    // Un tableau avec les erreurs potentielles du formulaire
    $errors = [];
    // Vérifier le name
    if (empty($title)) {
        $errors['title'] = '\'est pas valide';
    }
    // Vérifier la description
    if (empty($price)) {
        $errors['price'] = '\'est pas valide';
    }
    // Upload de la jaquette
    if ($cover['error'] === 0) {
        // On récupére le fichier temporaire
        $tmpFile = $cover['tmp_name'];
        // On récupére le nom du fichier
        $fileName = $cover['name'];
        // Générer un nom de fichier unique
        $fileName = substr(md5(time()), 0, 8) . '_' . $fileName;
        // On déplace le fichier à l'endroit désiré
        move_uploaded_file($tmpFile, __DIR__.'/upload/img/'.$fileName);
        // On récupère le nom du fichier pour le mettre dans la bdd
        $cover = $fileName;
    } else { // S'il n'y a pas d'upload
        $cover = null;
    }
    // Si le formulaire est valide
    if (empty($errors)) {
        $query = $conn->prepare('INSERT INTO book (title, release_date, price, cover, isbn) VALUES (:title, :release_date, :price, :cover, :isbn)');
        $query->bindValue(':title', $title);
        $query->bindValue(':release_date', $date);
        $query->bindValue(':price', $price);
        $query->bindValue(':cover', $cover);
        $query->bindValue(':isbn', $isbn);
        
        if ($query->execute()) {
            echo '<div class="alert alert-success">book added.</div>';
        }
    }
}
?>

<div class="container my-5">
    <?php
        // S'il y a des erreurs
        if (!empty($errors)) {
            echo '<div class="alert alert-danger">';
            echo '<p>Le formulaire contient des erreurs</p>';
            echo '<ul>';
            foreach ($errors as $field => $error) {
                echo '<li>'.$field.' : '.$error.'</li>';
            }
            echo '</ul>';
            echo '</div>';
        }
    ?>


 <div class="container">
 <form action="#"method="POST" enctype="multipart/form-data">
  <p>TITLE: <input type="text" name="title" id="title" /></p>
  <p>RELEASE_DATE: <input type="date" name="release_date" id="release_date"/></p>
  <p>PRICE: <input type="text" name="price" id="price"/></p>
  <p>ISBN : <input type="text" name="isbn" id="isbn"/></p>
  <p>COVER: <input type="file" name="cover" id="cover"/></p>
  <input type="submit" name ="submit" value="Submit" />
</form>
</div>
</div>
  
  	<?php 
  	require('footer.php');
  	 ?>