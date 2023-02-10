<?php require_once "init.php";
if (!isset($_POST['prop_id'])) {
    die("forbidden");
} else {
    $getPropertyCommand = "SELECT * FROM tblproperty WHERE id = ?";
    $resultx = $connect->read($getPropertyCommand, array($_POST['prop_id']));
    $resultx = $resultx->fetch();

?>

    <!DOCTYPE html>
    <html lang="tr">

    <head>
        <?php include_once "loadHead.php" ?>
    </head>


    <body class="bg-light">
        <div class="container pt-3">
            <a href="index.php" class="btn btn-danger mt-3">
                Ana Sayfa
            </a>
        </div>
        <!-- update section  -->
        <section class="container bg-light align-items-start mt-5 p-3 border" id="create">
            <?php include_once "loadUpdateForm.php" ?>
        </section>
        <?php require_once "loadScripts.php" ?>
        <script>
            getSelectPicker("<?php echo $resultx['city'] ?>", "<?php echo $resultx['district'] ?>"); //app.js

            //call jqte textarea editor
            $("#comment").jqte();

            $(document).ready(() => {
                setTimeout(() => {
                    let propCity = document.querySelectorAll(".option-city");
                    let propDistrict = document.querySelectorAll(".option-district");
                    let propQuarter = document.querySelectorAll(".option-quarter");

                    // // propDistrict.forEach(e => {
                    // // //     if (e.value == "<?php echo $resultx['district'] ?>") {
                    // //         e.selected = true;
                    // //         console.log(e)
                    // //     }
                    // // })
                    // // propQuarter.forEach(e => {
                    // //     if (e.value == "<?php echo $resultx['quarter'] ?>") {
                    // //         e.selected = true;
                    // //     }
                    // // })

                }, 1000);


            })
        </script>
    </body>

    </html>
<?php } ?>