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
        <header>
            <?php include_once "loadNavbar.php" ?>
        </header>
        <!-- update section  -->
        <section class="container bg-light align-items-start mt-5 p-3 border" id="create">
            <?php include_once "loadUpdateForm.php" ?>
        </section>
        <?php require_once "loadScripts.php" ?>
        <script>
            $.ajax({
                url: "ajax/get-quarters.php",
                method: 'POST',
                data: {
                    district: "<?php echo $resultx['district'] ?> "
                },
                success: (data) => {
                    $("#select-quarter").html(data).selectpicker('refresh');
                }
            })

            $.ajax({
                url: "ajax/get-districts.php",
                method: 'POST',
                data: {
                    city: "<?php echo $resultx['city'] ?> "
                },
                success: (data) => {
                    $("#select-district").html(data).selectpicker('refresh');
                }
            });

            getSelectPicker("<?php echo $resultx['city'] ?>", "<?php echo $resultx['district'] ?>");
            $("#comment").jqte();
            let propTypes = document.querySelectorAll(".prop-type");
            propTypes.forEach(e => {
                if (e.value == "<?php echo $resultx['type'] ?>") {
                    e.selected = true;
                }
            });

            $(document).ready(() => {
                setTimeout(() => {

                    let propRoom = document.querySelectorAll(".option-room");
                    let propCity = document.querySelectorAll(".option-city");
                    let propDistrict = document.querySelectorAll(".option-district");
                    let propQuarter = document.querySelectorAll(".option-quarter");


                    propRoom.forEach(e => {
                        if (e.value == "<?php echo $resultx['room'] ?>") {
                            e.selected = true;
                        }
                    });
                    propCity.forEach(e => {
                        if (e.value == "<?php echo $resultx['city'] ?>") {
                            e.selected = true;
                        }
                    });
                    propDistrict.forEach(e => {
                        if (e.value == "<?php echo $resultx['district'] ?>") {
                            e.selected = true;
                        }
                    })
                    propQuarter.forEach(e => {
                        if (e.value == "<?php echo $resultx['quarter'] ?>") {
                            e.selected = true;
                        }
                    })
                }, 100);


            })
        </script>
    </body>

    </html>
<?php } ?>