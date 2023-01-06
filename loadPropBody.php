<div class="row">
    <div class="col-md-8 col-sm-12 px-3">
        <div class="col" style="height:600px" scope="col">
            <div style="height:580px" class="image-container">
                <div class="owl-carousel owl-theme">
                    <?php
                    $getImages = $connect->read("SELECT * FROM tblimages WHERE property_id=?", array($prop['id']));
                    while ($imgRow = $getImages->fetch(PDO::FETCH_ASSOC)) {


                    ?>
                        <div style="max-height:580px" class="item">
                            <img class="ddd" src="<?php echo $imgRow['dir'] ?>" alt="">
                        </div>
                    <?php

                    } ?>
                </div>
            </div>
        </div>
        <div class="col mt-4">
            <div class="card-header p-3"><strong>Açıklama</strong></div>
            <div class="card-body bg-white p-4"><?php echo $prop['comment'] ?>
            </div>
        </div>
    </div>
    <!-- properties -->
    <div class="col-md-4 col-sm-12 px-3 d-flex flex-column">
        <div class="agent-card px-3 order-2 order-md-1 align-center">
            <div class="row mt-0 px-1 py-2 bg-white">
                <div class="agent-img col-4"><img class="img-fluid" src="assets/img/ozi.jpg" alt="">
                </div>
                <div class="col-8 py-2">
                    <div class="card-row mb-2"><i class="fa-regular fa-user mr-1"></i><span>Mert Çobanoğlu</span></div>
                    <hr>

                    <div class="card-row mb-1"><a href="tel:+90 (541) 505 4991"><i class="fa-solid fa-phone mr-1"></i><span>+90 (541) 505 4991</span></a></div>
                    <div class="card-row"><a href="https://api.whatsapp.com/send?phone=905415054991" target="_blank"><i class="fa-brands fa-whatsapp mr-1"></i>Whatsapp</a></div>

                </div>
            </div>
        </div>
        <ul class="list-properties bg-white px-3 py-3 order-1 order-md-2 ">
            <li><strong class="d-inline-block w-50">İlan Tarihi:</strong><span><?php echo $prop['date'] ?></span></li>
            <hr>
            <li><strong class="d-inline-block w-50">Emlak Türü:</strong><span><?php echo $prop['prop_case'] . " " . $prop['type'] ?></span></li>
            <hr>
            <li><strong class="d-inline-block w-50">m² (Brüt)</strong><span><?php echo $prop['area'] ?></span></li>
            <hr>
            <li><strong class="d-inline-block w-50">Oda Sayısı</strong><span><?php echo $prop['room'] ?></span></li>
            <hr>
            <li><strong class="d-inline-block w-50">Bina Yaşı</strong><span><?php echo $prop['age'] ?></span></li>
            <hr>
            <li><strong class="d-inline-block w-50">Bulunduğu Kat</strong><span><?php echo $prop['floor'] ?></span></li>
            <hr>
            <li><strong class="d-inline-block w-50">Kat Sayısı</strong><span><?php echo $prop['floors'] ?></span></li>
            <hr>
            <li><strong class="d-inline-block w-50">Eşyalı</strong><span><?php if ($prop['is_furnished']) {
                                                                                echo "Evet";
                                                                            } else {
                                                                                echo "Hayır";
                                                                            } ?></span></li>
            <hr>
            <li><strong class="d-inline-block w-50">Banyo Sayısı</strong><span><?php echo $prop['bathrooms'] ?></span></li>
            <hr>
            <li><strong class="d-inline-block w-50">Balkon</strong><span><?php if ($prop['balcony']) {
                                                                                echo "Var";
                                                                            } else {
                                                                                echo "Yok";
                                                                            } ?>
                </span></li>
            <hr>
            <li><strong class="d-inline-block w-50">Site İçerisinde</strong><span><?php if ($prop['in_site']) {
                                                                                        echo "Evet";
                                                                                    } else {
                                                                                        echo "Hayır";
                                                                                    } ?>
                </span></li>
            <hr>
            <li><strong class="d-inline-block w-50">Aidat(TL)</strong><span><?php echo $prop['dues'] ?>
                </span></li>
            <hr>
            <li><strong class="d-inline-block w-50">Tapu Durumu</strong><span><?php echo $prop['deed_case'] ?>
                </span></li>
        </ul>
    </div>
</div>