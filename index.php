<?php
require_once "init.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "loadHead.php" ?>
</head>

<body>
    <header style="border-bottom: 1px solid rgba(238, 238, 238, 0.24);" class="header-wrap">
        <?php require_once "loadNavbar.php";
        require_once "loadHeaderContent.php" ?>
    </header>
    <!-- content area -->

    <!-- section last properties -->
    <section class="last-properties container-xl position-relative">
        <?php require_once "loadLastProperties.php" ?>

    </section>
    <!-- section about us -->
    <section id="aboutus" class="bg-white mt-5">
        <?php require_once "loadAboutUs.php" ?>
    </section>

    <!-- content area end -->
    <footer class="col mt-5 p-0">
        <?php require_once "loadFooter.php" ?>
    </footer>
    <?php require_once "loadScripts.php" ?>
    <script>
        dynamicHeader();
        dynamicNavbar();
        getSelectPicker();
        $('.carousel-prop').owlCarousel({
            nav: false,
            loop: true,
            margin: 20,
            dotsEach: false,
            responsiveClass: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 1,
                },
                700: {
                    items: 2,
                    loop: false
                },
                1000: {
                    items: 3,
                    loop: false
                }
            }
        });
        $('.carousel-image').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            // dotsData:true,
            dots: false,
            touchDrag: false,
            mouseDrag: false,
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

        $('.btn-prev').click(function() {
            console.log("prev")
            $('.carousel-prop').trigger('prev.owl.carousel', [800]);
        });
        $('.btn-next').click(function() {
            console.log("next")
            $('.carousel-prop').trigger('next.owl.carousel', [800]);
        })
    </script>
</body>

</html>