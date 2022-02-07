<!DOCTYPE html>
<html lang="en">

<?php
    include ('view/head.php');
?>

<body>
    <br />
    <div class="container"><br />
        <div class="row"><br />
            <h2>Crud en Php</h2><p>

        </div><p><br />
        <div class="row">               
            <a href="add.php" class="btn btn-success">Ajouter un user</a><br />
            <div class="table-responsive"><br />
                <table class="table table-hover table-bordered"><br />
                    <thead>
                        <th>Name</th><p>
                        <th>Firstname</th><p>
                        <th>Age</th><p>
                        <th>Tel</th><p>
                        <th>Country</th><p>
                        <th>Email</th><p>
                        <th>Comment</th><p>
                        <th>Job</th><p>
                        <th>Url</th><p>
                        <th>Edition</th><p>
                    </thead><p><br />
                    <tbody>
                        <?php 
                            include ('model/connect.php'); //on inclut notre fichier de connection 

                            $pdo = Database::connect(); //on se connecte à la base 

                            $sql = 'SELECT * FROM user ORDER BY id DESC'; //on formule notre requete 

                            foreach ($pdo->query($sql) as $row) { //on cree les lignes du tableau avec chaque valeur retournée
                                echo '<br /><tr>';
                                echo'<td>' . $row['name'] . '</td><p>';
                                echo'<td>' . $row['firstname'] . '</td><p>';
                                echo'<td>' . $row['age'] . '</td><p>';
                                echo'<td>' . $row['tel'] . '</td><p>';
                                echo'<td>' . $row['email'] . '</td><p>';
                                echo'<td>' . $row['country'] . '</td><p>';
                                echo'<td>' . $row['comment'] . '</td><p>';
                                echo'<td>' . $row['job'] . '</td><p>';
                                echo'<td>' . $row['url'] . '</td><p>';
                                echo '<td>';

                                // attend un id en paramètre
                                echo '<a class="btn" href="read.php?id=' . $row['id'] . '">Read</a>';// un autre td pour le bouton d'edition (sous forme de lien)
                                echo '</td><p>';
                                echo '<td>';

                                // attend un id en paramètre
                                echo '<a class="btn btn-success" href="update.php?id=' . $row['id'] . '">Update</a>';// un autre td pour le bouton d'update (sous forme de lien)
                                echo '</td><p>';
                                echo'<td>';

                                // attend un id en paramètre
                                echo '<a class="btn btn-danger" href="delete.php?id=' . $row['id'] . ' ">Delete</a>';// un autre td pour le bouton de suppression (sous forme de lien)
                                echo '</td><p>';
                                echo '</tr><p>';
                            }
                            Database::disconnect(); //on se deconnecte de la base;
                        ?>    
                    </tbody>
                    <p>
                </table>
                <p>
            </div>
            <p>
        </div>
        <p>
    </div>
    <p>
</body>
<footer>
    <script src="assets/js/bootstrap.min.js"></script>
</footer>
</html>