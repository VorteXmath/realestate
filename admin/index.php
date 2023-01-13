<?php
require_once "init.php";
if (!isset($_SESSION['logon']) or !isset($_SESSION['username']) or !isset($_SESSION['full_name'])) {
    echo "forbidden";
    routing::go("login.php", 2);
    exit;
} else {

?>

    <!DOCTYPE html>
    <html lang="tr">

    <head>
        <?php require_once "loadHead.php" ?>
    </head>

    <body>
        <div class="d-flex">
            <?php require_once "loadSideBar.php" ?>
            <div class="content p-1">
                <div class="content-header d-flex my-2 p-2">
                    <!-- <div id="toggle-sidebar" class="p-1"><i class="fa-solid fa-bars"></i></div> -->
                    <div id="toggle-sidebar" class="p-1">
                        <div class="img-wrapper">
                            <img src="assets/img/Hamburger_icon.png" alt="">
                        </div>
                    </div>
                    <div><a id="btn-log-off" class="btn btn-danger" onclick="logOff()" href="#">Çıkış yap<i style="margin-left:5px" class="fa-solid fa-right-from-bracket"></i></a></div>
                </div>
                <!-- open filter modal button -->
                <?php require_once "loadFilterModal.php" ?>

                <div class="d-flex">
                    <div class="p-0 w-100">
                        <div class="control-stick d-flex justify-content-between p-1">
                            <div id="btn-filter" class="btn btn-primary">Filtrele</div>
                            <div class="d-flex">
                                <div class="btn-change-page" id="btn-prev-page"><i class="fa-solid fa-chevron-left"></i></div>
                                <select name="select-page" id="select-page">
                                </select>
                                <div class="btn-change-page" id="btn-next-page"><i class="fa-solid fa-chevron-right"></i></div>
                            </div>
                        </div>
                        <!-- <div class="search-content"></div> -->
                        <table class="table table-striped table-primary table-bordered w-100">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">İlan ID</th>
                                    <th class="text-center" style="width:16rem" scope="col"></th>
                                    <th class="text-center" scope="col">Emlak Türü</th>
                                    <th class="text-center" scope="col">İlan Başlığı</th>
                                    <th class="text-center" scope="col">m² (Brüt)</th>
                                    <th class="text-center" scope="col">Oda Sayısı</th>
                                    <th class="text-center" scope="col">Fiyat</th>
                                    <th class="text-center" scope="col">İl/İlçe</th>
                                    <th class="text-center" scope="col">İlan Tarihi</th>
                                    <th class="text-center" scope="col">Yönet</th>
                                </tr>
                            </thead>
                            <tbody id="properties">

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>

        <!-- footer section -->
        <!-- sube section end -->
        <?php require_once "loadScripts.php" ?>
        <script src="assets/js/sweetalert.js"></script>

        <script>
            getItems();
            getSelectPicker();
            filterModal();
            changePage();
            nextPage();
            prevPage();
            toggleSideBar();

            function logOff() {
                Swal.fire({
                    title: 'Çıkış yapmak istediğinizden emin misiniz?',
                    text: "",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet, Çıkış yap!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "action-logoff.php"
                    }
                })
            }

            function deleteProperty(id) {
                Swal.fire({
                    title: id + ' Numaralı ilanı silmek istediğinize emin misiniz?',
                    text: "Bunu geri alamazsınız!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet, sil!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "action-property.php?action=delete",
                            method: "POST",
                            data: {
                                propertyId: id
                            },
                            success: (data) => {
                                Swal.fire(
                                    'Başarılı!',
                                    'İlan Silindi'
                                )
                                getItems();
                            }
                        })

                    }
                })
            }
        </script>
    </body>

    </html>
<?php
} ?>