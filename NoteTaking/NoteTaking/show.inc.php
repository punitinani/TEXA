<!DOCTYPE html>
<?php
session_start();
?>


<html>
    <head>
        <meta charset="windows-1252">
        <title>Dashboard</title>

        <link rel="stylesheet" href="/NoteTaking/css/style.css" />
        <link rel="stylesheet" href="/NoteTaking/css/bootstrap.css" />
    </head>
    <body>
        <br>
        <br><br>
        <?php
        include_once './nav.inc.php';
        ?>
        <script type='text/javascript'>


            document.getElementById('dashboard').style.background = 'white';
        </script>

        <br>
        <br> <div class=" col-sm-2 ">
            <p ><a    id="showAll" href="<?php echo htmlentities("showAll/" . base64_encode("ShowAllPunit")); ?>/" class="list-group-item" style="  list-style-type: none; font-family:Century Gothic   ; font-size: 1.2em; visibility: visible" > Show all </a></p>


            <p  class="list-group-item" style="font-family:Century Gothic   ; font-size: 1.2em; visibility: hidden; background:  #ffffff ;  padding :1%; list-style-type: none; "   id="FileName"> File Name  :- </p>

            <br>
            <p style="font-family:Century Gothic   ; font-size: 1.2em; visibility: hidden;"  class="btn  btn-primary"   id="editButton" onclick="edit();" > Edit   </p>


            <p style="font-family:Century Gothic   ; font-size: 1.2em; visibility:hidden;"  class="btn  btn-danger"   id="deleteButton" onclick="del();" > Delete   </p>

            <br>





        </div>
        <ul class=" col-sm-2 "   id="list"  >


            <?php
            require_once 'core.inc.php';

            if (isset($_GET['showAll'])) {

                $show = base64_decode($_GET['showAll']);

                if ($show === "ShowAllPunit") {
                    showAll();
                } else {
                    showLimitTen();
                }
            } else {
                showAll();
            }
            ?>
        </ul>
        <div class="col-lg-offset-3">

            <?php
            require_once './core.inc.php';

            if (isset($_GET['id']) && isset($_GET['link']) && isset($_GET['title'])) {
                $_SESSION['id'] = $_GET['id'];
                $title = base64_decode(htmlentities($_GET['title']));


                $link = $_GET['link'];

                $id = base64_decode(htmlentities(mysql_real_escape_string($_GET['id'])));
                $message = getMessage($id, 0);




                echo " <textarea name=\"matter\" id=\"textareamatter\" readonly=\"\" style=\"font-family:courier new ;font-size:1em;\"\    > $message </textarea>";


                echo"<script>" . "document.getElementById('$link').style.background=\"#337ab7\";";
                echo "document.getElementById('$link').style.color=\"#fff\";";

                echo "document.getElementById('FileName').style.visibility=\"visible\";";

                echo "document.getElementById('editButton').style.visibility=\"visible\";";
                echo "document.getElementById('editButton').style.cursor=\"pointer\";";



                echo "document.getElementById('deleteButton').style.cursor=\"pointer\";";



                echo "document.getElementById('showAll').style.visibility=\"visible\";";


                echo "document.getElementById('deleteButton').style.visiblity=\"visible\";";



                echo "document.getElementById('FileName').innerHTML+=\"<b>$title </b>\" ;" . "</script>";
            } else {
                ?>
                <textarea   name="matter" id="textareamatter" readonly="" placeholder="Please select the file"> Please select the file  </textarea>

                <?php
            }
            ?>


        </div>
        <script>



            function edit() {
                window.open("edit/" + "<?php echo $_SESSION['id']; ?>");
            }
        </script>
    </body>

</html>


<?php
session_destroy();
?>
