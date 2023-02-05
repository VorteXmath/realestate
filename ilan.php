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

    <body class="">
        <!-- header section -->
        <header class="header">
            <?php require_once "loadNavbar.php" ?>
        </header>
        <!-- header section end -->

        <?php require_once "loadPropertyContent.php"?>



        <!-- footer section start -->
        <footer class="col mt-5">
            <?php require_once "loadFooter.php" ?>
        </footer>
        <!-- footer section end -->

        <?php require_once "loadScripts.php" ?>
        <script>
            let printBtn = document.querySelector(".fa-print");
            // printBtn.addEventListener("click", () => window.print())
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                dots: true,
                touchDrag: true,
                mouseDrag: true,
                center: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 1,
                    },
                    1000: {
                        items: 3,
                    }
                }
            });

            $(".owl-next").on("click", () => {
                owl.trigger('next.owl.carousel')
            })

            $(".owl-prev").on("click", () => {
                owl.trigger('prev.owl.carousel')
            })
        </script>
    </body>

    </html>

<?php
} else {
    die("forbidden");
} ?>