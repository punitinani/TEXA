<!DOCTYPE html>


<?php
ob_end_clean();

header("Cache-Control:no-cache,must-revalidate");
header("Expires:Sat,26 Jul 1997 50:00:00 GMT");


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['save'])) {

        if (!empty($_POST['title']) && !empty($_POST['message'])) {

            $title = $_POST['title'];
            $message = $_POST['message'];

            $fav = 0;
            $pin = 0;
            if (isset($_POST['fav'])) {
                $fav = 1;
            }

            if (isset($_POST['pin'])) {

                $pin = 1;
            }

            require_once 'core.inc.php';

            $con = Database::setParameter();

            if ($con) {

                saveNote($title, $fav, $pin, $message);
            }
        } else {
            echo "<script>  alert (\"Please Fill    ...\") " . "" . "</script>";
        }
    }
}
?>


<?php
require_once 'core.inc.php';
$index = lastIndex();
?>

<html>
    <head>
        <meta charset="windows-1252">
        <title>

            <?php
            include_once 'title.php';
            ?>
        </title>

        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/bootstrap.css" />
    </head>
    <body>


        <?php
        include_once 'nav.inc.php';
        ?>
        <script  type="text/javascript">
            document.getElementById("<?php echo $file; ?>").style.background = 'white';

        </script>



        <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <br>

            <div id="title_float"  >
                <div style="color:black;
                     font-family:Century Gothic ;

                     margin-left: 3%;
                     width:10%;

                     margin-top: 10px;
                     font-size: 2em;

                     ">Title </div>

                <input type="text" class="form-group form-control"  style=" width:20%;  margin-left: 3%;"   id="title" name="title" value='Utility_<?php echo $index; ?>'
                       placeholder="Title for Note"> 
                <p style="margin-left: 3%  ; font-size: 1em;"><b>
                        <?php echo "Created   :-    " . date(" d/n/Y ", time()); ?>

                    </b> </p>
                <br>


                <div>
                    <label style="font-family:Century Gothic ;margin-left: 1%;">  
                        <input type="checkbox" value="unchecked"    id="title" name="fav" 
                               > Add to Favourite
                    </label>


                </div>

                <div>
                    <label style="font-family:Century Gothic ;margin-left: 1%;">  
                        <input type="checkbox" value="unchecked"    id="title" name="pin" 
                               > Pin to DashBoard
                    </label>


                </div>


            </div>


            <div>
                <br>

                <input type="submit" id="set" name="save"  style="margin-left: 1% ; width:5%;"value="Save" class="btn btn-primary">
                <a href="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="reset" id="set"  style="margin-left: 1%;"class="btn btn-danger"> Cancel   </a>
            </div>


            <div style="float:center;" id="set">


                <center >
                    <textarea id="area"  name="message" placeholder="Enter  your  text here......!!" autofocus></textarea>   
                </center>
            </div>
        </form>

    </body>
</html>

