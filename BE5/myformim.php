<?php
    ini_set("display_errors", "On");
    ERROR_REPORTING(E_ALL);
    $title = "Input Golfball Data";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title;?></title>
        <link rel="stylesheet" href="./css/ifdemo.css"/>
        <script>
            // Keybord saver #ACK:

            var $ = function (nml) {
                return document.getElementById(nml);
            }

            var dispSlide = function () {
                $('ranger').innerHTML = $('dimples').value;
            }

            var isValid = function (e) {
                if (e.target.color.value === '') {
                    window.alert('Missing color');
                    e.target.color.focus()
                    e.preventDefault();
                    return false;
                }
                if (e.target.img.value === '') {
                    window.alert('Missing image');
                    e.target.img.focus()
                    e.preventDefault();
                    return false;
                }
                return true;
            }

            var init = function () {
                $('deform').addEventListener('submit', isValid);
                dispSlide();
                $('dimples').addEventListener('mousemove', dispSlide);
            }
            window.addEventListener('load', init);
        </script>
    </head>
    <body>
        <?php
            printf("<header><h1>%s</h1></header>\n", $title);            // put your code here
        ?>
        <form action="golfballsdb.php"
              method="post"
              id='deform'

              enctype="multipart/form-data">  <!-- File can be sendt in multible parts -->
            <fieldset>
                <legend>Golfballs</legend>
            <p>
                <label for='color'>Color:</label><br/>
                <input type='text' id='color' name='color'/>
            </p>
            <p>
                <label for='dimples'>No of Dimples:</label><br/>
                <input type="range" id="dimples" name="dimples"
                       min="350" max="500" value="375" required/> <span id='ranger'></span>
            </p>
            <p>
                <input type="hidden" name="MAX_FILE_SIZE" value="131072"/> <!-- Remember max file size! -->
                <label for='bild'>Image:</label><br/>
                <input type='file' id='bild' name='img'/>
            </p>
            <p>
               <input type='submit' name='butt' value='Go!'/>
            </p>
            </fieldset>
        </form>
    </body>
</html>
