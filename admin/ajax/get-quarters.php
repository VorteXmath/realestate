<?php
require_once "../init.php";

$query = "SELECT * FROM tblquarter WHERE district_name=? ORDER BY quarter_id ASC";
$result = $connect->read($query, array($_POST['district']));
while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
    <option class="option-quarter" value="<?php echo $row['quarter_name'] ?>"><?php echo $row['quarter_name'] ?></option>
<?php
}
?>