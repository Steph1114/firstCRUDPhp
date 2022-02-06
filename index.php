<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud en php</title>

    <link href="assets/css/bootstrap-grid.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
</head>
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
                            include ('connect.php'); //on inclut notre fichier de connection 

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
                                echo '<a class="btn" href="edit.php?id=' . $row['id'] . '">Read</a>';// un autre td pour le bouton d'edition (sous forme de lien)
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