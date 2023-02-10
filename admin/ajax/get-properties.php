<?php
setlocale(LC_ALL, 'tr_TR.UTF-8');

require_once "../init.php";

$w     = array();
$where = '';
$offset;

if (!empty($_POST['type']))     $w[] = "type='" . $_POST['type'] . "'";
if (!empty($_POST['room']))     $w[] = "room='" . $_POST['room'] . "'";
if (!empty($_POST['city']))     $w[] = "city='" . $_POST['city'] . "'";
if (!empty($_POST['district']))     $w[] = "district='" . $_POST['district'] . "'";
if (!empty($_POST['quarter']))     $w[] = "quarter='" . $_POST['quarter'] . "'";
if (!empty($_POST['costMin']))     $w[] = "cost>='" . $_POST['costMin'] . "'";
if (!empty($_POST['costMax']))     $w[] = "cost<='" . $_POST['costMax'] . "'";
if (!empty($_POST['m2min']))     $w[] = "area>='" . $_POST['m2min'] . "'";
if (!empty($_POST['m2max']))     $w[] = "area<='" . $_POST['m2max'] . "'";
if (!empty($_POST['offset']))  $offset = ($_POST['offset'] - 1) * 6;



if (count($w)) $where = "WHERE " . implode(' AND ', $w);
$countQuery = "SELECT COUNT(*) FROM tblproperty $where";
$getPropertiesQuery = "select * from tblproperty $where ORDER BY ID DESC LIMIT 20 OFFSET {$offset}";

$getcount = $connect->read($countQuery);
$getcount = $getcount->fetch(pdo::FETCH_ASSOC);
$count = $getcount['COUNT(*)'];
$pageCount = ceil(intval($count) / 20);

$getImagesQuery = "SELECT * FROM tblimages WHERE property_id=?";
try {
    echo "<div class='d-none' id='pageCount'>$pageCount</div>";
    $getProperties = $connect->read($getPropertiesQuery);
    while ($row = $getProperties->fetch(PDO::FETCH_ASSOC)) {
        $getImages = $connect->read($getImagesQuery, array($row['id'])); ?>

        <tr>
            <td class="align-middle text-center col-md-1" scope="col"><?php echo $row['id'] ?></td>
            <td class="col-2" style="height:8rem" scope="col">
                <div style="height:8rem" class="image-container">
                    <?php
                    while ($imgrow = $getImages->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="slide">
                            <img src="<?php echo "../" . $imgrow['dir'] ?>" loading="lazy">
                        </div>
                    <?php
                    } ?>

                    <!-- Next and Previous icon to change images -->
                    <a class="change-img previous" onclick="moveSlides(-1)">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                    <a class="change-img next" onclick="moveSlides(1)">
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
            </td>
            <td class="align-middle text-center col-md-1" scope="col"><?php echo $row['type'] ?></td>
            <td class="align-middle text-center col-md-2 prop-title" scope="col"><?php echo $row['title'] ?></td>
            <td class="align-middle text-center col-md-1" scope="col"><?php echo $row['area'] ?></td>
            <td class="align-middle text-center col-md-1" scope="col"><?php echo $row['room'] ?></td>
            <td class="align-middle text-center col-md-1" scope="col"><?php echo number_format_unchanged_precision($row['cost']) . " TL" ?></td>
            <td class="align-middle text-center col-md-1" scope="col"><?php echo $row['city'] ?>/<?php echo $row['district'] ?><br> <?php echo $row['quarter'] ?></td>
            <td class="align-middle text-center col-md-1" scope="col"><?php echo $row['date'] ?></td>
            <td class="align-middle text-center col-md-1" scope="col">
                <form action="update.php" method="post">
                    <input type="hidden" name="prop_id" id="prop_id" value="<?php echo $row['id'] ?>"><input type="submit" value="Düzenle" class="btn btn-primary px-1 mb-2"></input>
                </form><a onclick="deleteProperty(<?php echo $row['id'] ?>)" class="btn btn-danger px-4" href="#">Sil</a>
            </td>
        </tr>
<?php

    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}
