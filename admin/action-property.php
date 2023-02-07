<?php
require_once "init.php";
if (!isset($_GET['action'])) {
    die("forbidden");
} else {
    switch ($_GET['action']) {
        case "create":  //create new property
            if (isset($_POST['submit'])) {

                $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : null;
                $title = isset($_REQUEST['title']) ? $_REQUEST['title'] : null;
                $comment = isset($_REQUEST['comment']) ? $_REQUEST['comment'] : null;
                $city = isset($_REQUEST['city']) ? $_REQUEST['city'] : null;
                $district = isset($_REQUEST['district']) ? $_REQUEST['district'] : null;
                $quarter = isset($_REQUEST['quarter']) ? $_REQUEST['quarter'] : null;
                $prop_case = isset($_REQUEST['prop_case']) ? $_REQUEST['prop_case'] : null;
                $room = isset($_REQUEST['room']) ? $_REQUEST['room'] : null;
                $area = isset($_REQUEST['area']) ? $_REQUEST['area'] : null;
                $cost = isset($_REQUEST['cost']) ? $_REQUEST['cost'] : null;
                $age = isset($_REQUEST['age']) ? $_REQUEST['age'] : null;
                $floor = isset($_REQUEST['floor']) ? $_REQUEST['floor'] : null;
                $floors = isset($_REQUEST['floors']) ? $_REQUEST['floors'] : null;
                $bathroom = isset($_REQUEST['bathroom']) ? $_REQUEST['bathroom'] : null;
                $furnished = isset($_REQUEST['furnished']) ? $_REQUEST['furnished'] : null;
                $balcony = isset($_REQUEST['balcony']) ? $_REQUEST['balcony'] : null;
                $constructType = isset($_REQUEST['constructType']) ? $_REQUEST['constructType'] : null;
                $fuel = isset($_REQUEST['fuel']) ? $_REQUEST['fuel'] : null;
                $deed = isset($_REQUEST['deedCase']) ? $_REQUEST['deedCase'] : null;
                $agentName = isset($_SESSION['full_name']) ? $_SESSION['full_name'] : null;
                $agentPhone = isset($_SESSION['phone']) ? $_SESSION['phone'] : null;

                try {

                    // // $stmt = $db->prepare("INSERT INTO ilanlar SET Tür=':type', Durum=':case' ,Başlık=':title', İl=':city', İlçe=':district', Mahalle=':quarter' ,Açıklama=':comment'");
                    // $stmt = $connect->$db->prepare("INSERT INTO tblproperty(type,case,title,city,district,quarter,comment) VALUES(?,?,?,?,?,?,?)");

                    // $connect->$db->beginTransaction();
                    // // $stmt->execute(array(':type' => $type, ':case' => $case, ':title' => $title, ':city' => $city, ':district' => $district, ':quarter' => $quarter, ':comment' => $comment));
                    // $stmt->execute(array($type, $case, $title, $city, $district, $quarter, $comment));
                    // $lastId = $db->lastInsertId();
                    // $connect->$db->commit();
                    $connect = new Connect();

                    $query = "INSERT INTO tblproperty(type, prop_case, title, city, district, quarter, comment, room, area, cost, age, floor, floors, bathrooms,agent_name,agent_phone,is_furnished,balcony,construct_type,fuel_type,deed_case) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                    $connect->create($query, array($type, $prop_case, $title, $city, $district, $quarter, $comment, $room, $area, $cost, $age, $floor, $floors, $bathroom, $agentName, $agentPhone, $furnished, $balcony, $constructType, $fuel, $deed));

                    //get last insert id to sync prop images 
                    $lastInsertId = $connect->lastInsertId;

                    //insert images
                    if (isset($_FILES['images'])) {
                        $images = $_FILES['images'];
                        $imgsTmpName = $images['tmp_name'];
                        foreach ($imgsTmpName as $index => $value) {
                            $imgName = $images['name'][$index];
                            $imgTemp = $images['tmp_name'][$index];
                            $uniqid = uniqid();
                            $imgPath = "../assets/data-images/" . $uniqid . "_" . $imgName;
                            if (move_uploaded_file($imgTemp, $imgPath)) {
                                $query = "INSERT INTO tblimages(property_id,dir) VALUES (?,?)";
                                $connect->create($query, array($lastInsertId, "assets/data-images/" . $uniqid . "_" . $imgName));
                            }
                        }
                    }
                    Routing::go("index.php");
                } catch (PDOException $ex) {
                    echo $ex->getMessage();
                }
            } else {
                die("forbidden");
            }

        case "delete": //delete property by id 
            if (isset($_POST['propertyId'])) {
                $propertyId = $_POST['propertyId'];
                $connect->delete("DELETE FROM tblimages WHERE property_id = ?", array($propertyId));

                $deleteCommand = "DELETE FROM tblproperty WHERE id = ?";
                $connect->delete($deleteCommand, array($propertyId));
            }
        case "update":
            if (isset($_POST['propertyId'])) {

                $type = isset($_REQUEST['type']) ? $_REQUEST['type'] : null;
                $title = isset($_REQUEST['title']) ? $_REQUEST['title'] : null;
                $comment = isset($_REQUEST['comment']) ? $_REQUEST['comment'] : null;
                $city = isset($_REQUEST['city']) ? $_REQUEST['city'] : null;
                $district = isset($_REQUEST['district']) ? $_REQUEST['district'] : null;
                $quarter = isset($_REQUEST['quarter']) ? $_REQUEST['quarter'] : null;
                $prop_case = isset($_REQUEST['prop_case']) ? $_REQUEST['prop_case'] : null;
                $room = isset($_REQUEST['room']) ? $_REQUEST['room'] : null;
                $area = isset($_REQUEST['area']) ? $_REQUEST['area'] : null;
                $cost = isset($_REQUEST['cost']) ? $_REQUEST['cost'] : null;
                $age = isset($_REQUEST['age']) ? $_REQUEST['age'] : null;
                $floor = isset($_REQUEST['floor']) ? $_REQUEST['floor'] : null;
                $floors = isset($_REQUEST['floors']) ? $_REQUEST['floors'] : null;
                $bathroom = isset($_REQUEST['bathroom']) ? $_REQUEST['bathroom'] : null;
                $furnished = isset($_REQUEST['furnished']) ? $_REQUEST['furnished'] : null;
                $balcony = isset($_REQUEST['balcony']) ? $_REQUEST['balcony'] : null;
                $agentName = isset($_SESSION['full_name']) ? $_SESSION['full_name'] : null;
                $agentPhone = isset($_SESSION['phone']) ? $_SESSION['phone'] : null;


                $propertyId = $_POST['propertyId'];
                $cmdUpdate = "UPDATE tblproperty SET type=?, prop_case=?, title=?, city=?, district=?, quarter=?, comment=?, room=?, area=?, cost=?, age=?, floor=?, floors=?, bathrooms=?,agent_name=?,agent_phone=?,is_furnished=?,balcony=? WHERE id=? ";
                $connect->update($cmdUpdate, array($type, $prop_case, $title, $city, $district, $quarter, $comment, $room, $area, $cost, $age, $floor, $floors, $bathroom, $agentName, $agentPhone, $furnished, $balcony, $propertyId));


                Routing::go("index.php");
            }
    }
}
