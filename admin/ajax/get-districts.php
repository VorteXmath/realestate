<?php
require_once "../../init.php";

$connect = new Connect();
$query = "SELECT * FROM tbldistrict WHERE city_name=? ORDER BY district_id ASC";
$result = $connect->read($query, array($_POST['city']));;
while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
    <option value="<?php echo $row['district_name'] ?>"><?php echo $row['district_name'] ?></option>
<?php
}
?>