<?php require_once "init.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "loadHead.php" ?>
</head>

<body>
    <!-- <button class="btn-toggle-filter">
        <i class="fa-solid fa-filter"></i>
    </button> -->
    <header style="background:#1A5E91; border-bottom: 1px solid rgba(238, 238, 238, 0.24);">
        <?php require_once "loadNavbar.php" ?>
    </header>
    <div class="filter-sort">
        <button class="fs btn-toggle-sort">SIRALA &nbsp;<i class="fa-solid fa-arrow-down-wide-short"></i></button>
        <button class="fs btn-toggle-filter">FİLTRELE &nbsp;<i class="fa-solid fa-filter me-3"></i></button>
    </div>
    <section style="background:#eee" class="container-xl d-flex justify-content-center">
        <div class="wrapper-sort">
        </div>
        <?php require_once "loadSideFilters.php" ?>
        <div id="properties">

        </div>
    </section>
    <footer>
        <?php require_once "loadFooter.php" ?>
    </footer>
    <?php require_once "loadScripts.php" ?>
    <script src="assets/js/filters.js"></script>
    <script>
        getSelectPicker();
        filterToggle();
    </script>
</body>

</html>