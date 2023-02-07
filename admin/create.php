<?php require_once "init.php"; ?>
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