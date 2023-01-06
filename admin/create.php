<!DOCTYPE html>
<html lang="tr">

<head>
    <?php include_once "loadHead.php" ?>
</head>

<body class="bg-light">
    <header>
        <?php include_once "loadNavbar.php" ?>
    </header>
    <!-- create section  -->
    <section class="container bg-light align-items-start mt-5 p-3 border" id="create">
        <?php include_once "loadCreateForm.php" ?>
    </section>
    <?php require_once "loadScripts.php" ?>
    <script>
        getSelectPicker();
        $("#comment").jqte();

    </script>
</body>

</html>