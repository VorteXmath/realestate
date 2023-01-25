<?php $connect = new Connect();
require_once "class/timeAgo.php";
?>
<h2 class="text-center mb-5">Son İlanlar</h2>
<!-- <div class="d-flex justify-content-end">
    <div class="btn btn-prev z-index-2">prev</div>
    <div class="btn btn-next z-index-2">next</div>
</div> -->
<div class="owl-carousel carousel-prop owl-theme position-relative">
    <?php
    $stmt = $connect->read("SELECT * FROM tblproperty ORDER BY id DESC LIMIT 10");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div class="item card-property">
            <a href="ilan.php?ilan=<?php echo $row['id'] ?>" class="card-image-wrapper position-relative">
                <span class="span-type"><?php echo $row['prop_case'] ?></span>
                <div class="owl-carousel carousel-image my-auto">
                    <?php
                    $getImage = $connect->read("SELECT * FROM tblimages WHERE property_id=?", array($row['id']));
                    while ($imgrow = $getImage->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <div class="card-image item">
                            <img class="item" src="<?php echo $imgrow['dir'] ?>" alt="">
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <span class="span-cost"><?php echo number_format_unchanged_precision($row['cost'], ',', '.') . " TL" ?></span>
            </a>
            <div class="card-body">
                <h5 class="props-prop-title">
                    <?php
                    echo $row['title'] ?>
                </h5>
                <div class="card-property-location"><?php echo $row['city'] . " / " . $row['district'] . " / " . $row['quarter'] ?> </div>
                <div class="mt-2">
                    <span class="area"><?php echo $row['area'] ?>m²</span>
                    <span class="area ml-1"><?php echo $row['room'] ?></span>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <?php echo "<div>" . $row['agent_name'] . "</div>" . "<div>" . timeAgo($row['date']) . "</div>"
                ?>
            </div>
        </div>
    <?php
    }
    ?>

</div>