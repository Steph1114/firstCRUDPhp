<?php require 'model/connect.php';
$id = 0;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if (!empty($_POST)) {
    $id = $_POST['id'];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM user  WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Database::disconnect();
    header("Location: index.php");
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE html>
<html lang="en">

<?php
    include ('view/head.php');
?>

<body>
    <br />
    <div class="container">
        <br />
        <div class="span10 offset1">

            <br />
            <div class="row">

                <br />
                <h3>Delete a user</h3>
                <p>

            </div>
            <p>

                <br />
            <form class="form-horizontal" action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />

                Are you sure to delete ?

                <br />
                <div class="form-actions">
                    <button type="submit" class="btn primary btn-danger">Yes</button>
                    <a class="btn secondary" href="index.php">No</a>
                </div>
                <p>

            </form>
            <p>
        </div>
        <p>

    </div>
    <p>
        <!-- /container -->
</body>

</html>