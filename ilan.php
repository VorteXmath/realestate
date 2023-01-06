<?php

if (isset($_GET['ilan'])) {
    require_once "init.php";
    $result = $connect->read("SELECT * FROM tblproperty WHERE id=?", array($_GET['ilan']));
    $prop = $result->fetch();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php require_once "loadHead.php" ?>

    </head>

    <body class="bg-light">
        <!-- header section -->
        <header class="header">
            <?php require_once "loadNavbar.php" ?>
        </header>
        <!-- header section end -->
        <!-- prop title wrap -->
        <section class="prop-title-wrap">
            <?php require_once "loadPropTitle.php"; ?>
        </section>
        <!-- prop title wrap end -->
        <section class="prop-body-wrap container">
            <?php require_once "loadPropBody.php" ?>
        </section>
        <!-- footer section start -->
        <footer class="col mt-5">
            <?php require_once "loadFooter.php" ?>
        </footer>
        <!-- footer section end -->

        <?php require_once "loadScripts.php" ?>
        <script>
            let printBtn = document.querySelector(".fa-print");
            printBtn.addEventListener("click", () => window.print())
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                loop: true,
                // margin: 10,
                responsiveClass: true,
                // dotsData:true,
                dots: true,
                touchDrag: false,
                mouseDrag: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 1,
                    },
                    1000: {
                        items: 1,
                    }
                }
            });
        </script>
    </body>

    </html>

<?php
} else {
    die("forbidden");
} ?>