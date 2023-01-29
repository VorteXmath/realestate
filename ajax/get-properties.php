<?php
setlocale(LC_ALL, 'tr_TR.UTF-8');

require_once "../init.php";


$jsonroom = json_decode($_POST['room']) ?? array();


$w     = array();
$where = '';
$whereOr = '';
$offset;

if (!empty($_POST['prop_case']))     $w[] = "prop_case='" . $_POST['prop_case'] . "'";
if (!empty($_POST['type']))     $w[] = "type='" . $_POST['type'] . "'";
if (!empty($_POST['city']))     $w[] = "city='" . $_POST['city'] . "'";
if (!empty($_POST['district']))     $w[] = "district='" . $_POST['district'] . "'";
if (!empty($_POST['quarter']))     $w[] = "quarter='" . $_POST['quarter'] . "'";
if (!empty($_POST['costMin']))     $w[] = "cost>='" . $_POST['costMin'] . "'";
if (!empty($_POST['costMax']))     $w[] = "cost<='" . $_POST['costMax'] . "'";
if (!empty($_POST['areaMin']))     $w[] = "area>='" . $_POST['areaMin'] . "'";
if (!empty($_POST['areaMax']))     $w[] = "area<='" . $_POST['areaMax'] . "'";
if (!empty($_POST['offset']))  $offset = ($_POST['offset'] - 1) * 12;
if (!empty($_POST['offset']))  $raw_offset = $_POST['offset'];



if (count($w)) {
    $where = "WHERE " . implode(' AND ', $w);
    if (count($jsonroom)) $whereOr = " AND " . implode(' OR ', $jsonroom);
} else {
    if (count($jsonroom)) $whereOr = " WHERE " . implode(' OR ', $jsonroom);
}




$countQuery = "SELECT COUNT(*) FROM tblproperty $where";
$getPropertiesQuery = "SELECT * FROM tblproperty $where $whereOr ORDER BY ID DESC LIMIT 12 OFFSET {$offset}";




$getcount = $connect->read($countQuery);
$getcount = $getcount->fetch(pdo::FETCH_ASSOC);
$count = $getcount['COUNT(*)'];
$pageCount = ceil(intval($count) / 12);

$getImagesQuery = "SELECT * FROM tblimages WHERE property_id=?";
try {
    echo "<div class='d-none' id='pageCount'>$pageCount</div>";
    // echo $getPropertiesQuery;
    echo "<div class='nav-properties'>Aramanızla eşleşen " . $count . " ilan bulundu.</div>";
    $getProperties = $connect->read($getPropertiesQuery);
    while ($row = $getProperties->fetch(PDO::FETCH_ASSOC)) {
        $getImages = $connect->read($getImagesQuery, array($row['id'])); ?>
        <div class="card-property">
            <a href="<?php echo "ilan.php?ilan=" . $row['id'] ?>" class="property-card-image owl-carousel owl-theme">
                <?php
                $getImage = $connect->read("SELECT * FROM tblimages WHERE property_id=?", array($row['id']));
                while ($imgrow = $getImage->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="item">
                        <img src="<?php echo $imgrow['dir'] ?>" alt="">
                    </div>
                <?php
                }
                ?>
            </a>
            <div class="property-card-body d-flex flex-column p-2">
                <div style="font-size:13px"><?php echo $row['city'] . " / " . $row['district']  ?></div>
                <h3 class="my-2 props-prop-title"><?php echo $row['title'] ?> </h3>
                <div class="my-1">
                    <span><?php echo $row['area'] . "m²" ?></span>
                    <span><?php echo $row['room'] ?></span>
                </div>
                <h5 class="my-1"><?php echo number_format_unchanged_precision($row['cost'], ',', '.') . " TL" ?></h5>
            </div>
            <div style="bottom:0" class="property-card-footer bg-faded d-flex justify-content-between p-2 justify-self-end">
                <div><?php echo $row['agent_name'] ?></div>
                <div><?php echo timeAgo($row['date']) ?></div>
            </div>
            <span class="prop-type"><?php echo $row['prop_case'] . " " . $row['type'] ?></span>
        </div>
    <?php

    }
    if ($pageCount > 0) {
        echo "toplam " . $pageCount . " sayfa içerisinde " . $raw_offset . ". sayfayı görmektesiniz";
    ?>
        <div class="paginationBar mt-3">
            <?php
            if ($raw_offset > 2) {
            ?>
                <button class="btn btn-secondary btn-pagination mx-1" onclick="pagination(1)">
                    <i class="fa-solid fa-angles-left"></i>
                </button>
            <?php
            }
            if ($raw_offset > 1) {
            ?>
                <button class="btn btn-secondary btn-pagination mx-1" onclick="pagination(<?php echo $raw_offset - 1 ?>)">
                    <i class="fa-solid fa-angle-left"></i>
                </button>
                <button class="btn btn-secondary btn-pagination mx-1" onclick="pagination(<?php echo $raw_offset - 1 ?>)"><?php echo $raw_offset - 1 ?></button>
            <?php
            }
            ?>
            <button class="btn btn-primary btn-pagination mx-1"><?php echo $raw_offset ?></button>

            <?php
            if ($pageCount > $raw_offset) {
            ?>
                <button class="btn btn-secondary btn-pagination mx-1" onclick="pagination(<?php echo $raw_offset + 1 ?>)"><?php echo $raw_offset + 1 ?></button>
                <button class="btn btn-secondary btn-pagination mx-1" onclick="pagination(<?php echo $raw_offset + 1 ?>)"><i class="fa-solid fa-angle-right"></i></button>
            <?php }
            if (($pageCount - $raw_offset) > 1) {
            ?>
                <button class="btn btn-secondary btn-pagination mx-1" onclick="pagination(<?php echo $pageCount ?>)"><i class="fa-solid fa-angles-right"></i></button>
            <?php }
            ?>
        </div>
<?php
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}
?>

<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        loop: true,
        // margin: 10,
        responsiveClass: true,
        // dotsData:true,
        dots: false,
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

    $(document).ready(function() {
        $('.btn-pagination').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    })
</script>