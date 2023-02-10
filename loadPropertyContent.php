<div class="container-fluid position-relative">
    <div class="owl-carousel owl-theme">
        <?php
        $getImages = $connect->read("SELECT * FROM tblimages WHERE property_id=?", array($prop['id']));
        $getImagesCount = $connect->read("SELECT COUNT(*) FROM tblimages WHERE property_id=?", array($prop['id']));
        $imgCount = $getImagesCount->fetch();
        $n = 1;
        while ($imgRow = $getImages->fetch(PDO::FETCH_ASSOC)) {


        ?>
            <div style="max-height:580px;position:relative" class="item">
                <img class="ddd" src="<?php echo $imgRow['dir'] ?>" alt="">
                <span class="imgnum"><?php echo $n . " / " . $imgCount['COUNT(*)'] ?></span>
            </div>
        <?php
            $n++;
        } ?>
    </div>
    <i class="owl-prev fa-solid fa-chevron-left"></i>
    <i class="owl-next fa-solid fa-chevron-right"></i>


</div>

<div class="container-xl d-flex">
    <div class="prop-features d-flex flex-column w-75 me-2 bg-light">
        <div class="prop-title">
            <div class="text-dark my-4">
                <div class="container d-flex flex-column">
                    <!-- <div class="d-flex align-items-center justify-content-between">
                                <div class="breadcrumb-wrap">
                                    <nav class="text-dark">
                                        <ol class="breadcrumb text-dark">
                                            <li class="breadcrumb-item"><a class="text-primary" href="index.php">Ana Sayfa</a></li>
                                            <li class="breadcrumb-item"><a class="text-primary" href="">İlanlar</a></li>
                                            <li class="breadcrumb-item active breadcrumb-title"><a class="text-dark" href=""><?php // echo substr($prop['title'], 0, 30) . "..."  
                                                                                                                                ?></a></li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="icons">
                                    <span><i class="icon-share fa-solid fa-square-share-nodes border border-secondary rounded text-secondary"></i></span>
                                    <span><i class="icon-share fa-solid fa-print border border-secondary rounded text-secondary"></i></span>
                                </div>
                            </div> -->
                    <div class="prop-title d-flex justify-content-between align-items-center">
                        <h1><?php echo $prop['title'] ?></h1>
                        <h2><?php echo number_format_unchanged_precision($prop['cost'], ',', '.') . " TL" ?></h2>
                    </div>
                    <div class="d-flex my-2 align-items-center">
                        <div class="item-feature"><?php echo $prop['city'] ?></div>
                        <div class="item-feature"><?php echo $prop['district'] ?></div>
                        <div class="item-feature"><?php echo $prop['quarter'] ?></div>
                        <div class="item-feature"><?php echo $prop['prop_case'] ?></div>
                        <div class="item-feature"><?php echo $prop['type'] ?></div>
                        <div class="item-feature"><?php echo $prop['room'] ?></div>
                        <div class="item-feature"><?php echo $prop['area'] ?> m²</div>
                    </div>
                    <div class="features mt-2 p-1">
                        <div class="features-title">
                            <h5>İlan Bilgileri</h5>
                        </div>
                        <div class="features-body">
                            <div class="features-list">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>İlan Tarihi</td>
                                            <td><?php echo date('Y-m-d', strtotime($prop['date'])); ?></td>
                                        </tr>
                                        <tr>
                                            <td>İlan Durumu</td>
                                            <td><?php echo $prop['prop_case'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Konut Şekli</td>
                                            <td><?php echo $prop['type'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Oda Sayısı</td>
                                            <td><?php echo $prop['room'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Bulunduğu Kat</td>
                                            <td><?php echo $prop['floor'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kat Sayısı</td>
                                            <td><?php echo $prop['floor'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="features-list">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Tapu Durumu</td>
                                            <td><?php echo $prop['deed_case'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Eşya Durumu</td>
                                            <td><?php echo $prop['is_furnished'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Banyo Sayısı</td>
                                            <td><?php echo $prop['bathrooms'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Yapı Malzemesi</td>
                                            <td><?php echo $prop['construct_type'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Isınma</td>
                                            <td><?php echo $prop['fuel_type'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Brüt / Net m²</td>
                                            <td><?php echo $prop['area_gross'] . " m² / " . $prop['area'] . " m²" ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col mt-4">
                        <div class="card-header p-3"><strong>Açıklama</strong></div>
                        <div class="card-body bg-white p-4"><?php echo $prop['comment'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="agent-features">
        <div class="agent-card px-3 order-2 order-md-1 align-center">
            <div class="row mt-0 px-1 py-2 bg-white">
                <div class="agent-img col-4">
                    <i class="fa-solid fa-circle-user"></i>
                    <div class="logo logo-agent mt-3">
                        <a href="index.php">
                            <h1 class="text-dark">Emlak<span class="mx-0">hub</span></h1>
                        </a>
                    </div>
                </div>
                <div class="col-8 py-2">
                    <div class="card-row mb-2"><i class="fa-regular fa-user mr-1"></i><span><?php echo $prop['agent_name'] ?></span></div>
                    <hr>
                    <div class="card-row mb-1"><a href="tel:+9<?php echo $prop['agent_phone'] ?>"><i class="fa-solid fa-phone mr-1"></i><span><?php echo $prop['agent_phone'] ?></span></a></div>
                    <div class="card-row"><a href="https://api.whatsapp.com/send?phone=9<?php echo $prop['agent_phone'] ?>" target="_blank"><i class="fa-brands fa-whatsapp mr-1"></i>Whatsapp</a></div>
                </div>
            </div>
        </div>
    </div>
</div>