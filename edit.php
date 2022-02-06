<?php
require('connect.php'); //on appelle notre fichier de config 

//On initialise une variable $id
$id = null;


if (!empty($_GET['id'])) { //si on a bien un id envoyé dans l’url ($_GET)
    $id = $_REQUEST['id']; //on le recupere
}
if (null == $id) {
    header("location:index.php");
} else {
    //on lance la connection 
    $pdo = Database::connect();

    //PDO : represente la connection entre php et un serveur de base de donnee
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) .

    //On lance la requete (qui affichera chaque element retrouné)
    $sql = "SELECT * FROM user where id =?";

    //Preparing Statement
    $q = $pdo->prepare($sql);

    $toExecute = $q->execute(array($id));

    //Recuperer et afficher sous forme de tableau associatif
    $data = $q->fetch(PDO::FETCH_ASSOC);

    var_dump($data);

    //on arrete la connection 
    Database::disconnect();
}



/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>

    <link href="assets/css/bootstrap-grid.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
</head>

<body>
    <br />
    <div class="container">
        <br />
        <div class="span10 offset1">
            <br />
            <div class="row">

                <br />
                <h3>Edition</h3>
                <p>

            </div>
            <p>
                <br />
            <div class="form-horizontal">

                <br />
                <div class="control-group">
                    <label class="control-label">Name</label>

                    <br />
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['name']; ?>
                        </label>
                    </div>
                    <p>
                </div>
                <p>
                    <br />
                <div class="control-group">
                    <label class="control-label">Firstname</label>
                    <br />
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['firstname']; ?>
                        </label>
                    </div>
                    <p>

                </div>
                <p>

                    <br />
                <div class="control-group">
                    <label class="control-label">Email Address</label>

                    <br />
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['email']; ?>
                        </label>
                    </div>
                    <p>

                </div>
                <p>
                    <br />
                <div class="control-group">
                    <label class="control-label">Phone</label>

                    <br />
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['tel']; ?>
                        </label>
                    </div>
                    <p>

                </div>
                <p>
                    <br />
                <div class="control-group">
                    <label class="control-label">Country</label>

                    <br />
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['country']; ?>
                        </label>
                    </div>
                    <p>

                </div>
                <p>

                    <br />
                <div class="control-group">
                    <label class="control-label">Job</label>

                    <br />
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['job']; ?>
                        </label>
                    </div>
                    <p>

                </div>
                <p>

                    <br />
                <div class="control-group">
                    <label class="control-label">Url</label>

                    <br />
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['url']; ?>
                        </label>
                    </div>
                    <p>

                </div>
                <p>

                    <br />
                <div class="control-group">
                    <label class="control-label">Comment</label>

                    <br />
                    <div class="controls">
                        <label class="checkbox">
                            <?php echo $data['comment']; ?>
                        </label>
                    </div>
                    <p>

                </div>
                <p>
                
                <!-- s’il n’y pas d’id, on redirige vers l’index -->
                    <br />
                <div class="form-actions">
                    <a class="btn" href="index.php">Back</a>
                </div>
                <p>

            </div>
            <p>

        </div>
        <p>

    </div>
    <p>
        <!-- /container -->
</body>

</html>