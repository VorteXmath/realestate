<form id="form-update" action="action-property.php?action=update" method="POST" enctype="multipart/form-data">
    <div class="form-group m-2">
        <div class="row">
            <div class="advanced-radio col-6 col-sm-4 col-xl-2" style-type="grid" style-color="light">
                <input type="radio" label="Satılık" name="prop_case" value="Satılık" checked>
                <input type="radio" label="Kiralık" name="prop_case" value="Kiralık" <?php if ($resultx['prop_case'] == 'Kiralık') {
                                                                                            echo 'checked';
                                                                                        } ?>>
            </div>
        </div>
    </div>
    <?php echo $resultx['id'] ?>
    <hr>
    <input type="text" hidden name="propertyId" id="propertyId" value="<?php echo $resultx['id'] ?>">
    <div class="form-group my-2">
        <label class="me-1" for="type">Emlak Türü:</label><br>
        <select class="selectpicker" name="type" id="type" data-style="btn-secondary">
            <option value="Konut" <?php if ($resultx['type'] == 'Konut') echo 'selected' ?>>Konut</option>
            <option value="İşyeri" <?php if ($resultx['type'] == 'İşyeri') echo 'selected' ?>>İşyeri</option>
            <option value="Arsa" <?php if ($resultx['type'] == 'Arsa') echo 'selected' ?>>Arsa</option>
        </select>
    </div>
    <hr>
    <div class="form-group mt-2">
        <label class="mb-2" for="title">İlan Başlığı</label>
        <input type="text" class="form-control col-12 col-xl-6" id="title" name="title" value="<?php echo $resultx['title'] ?>">
    </div>
    <div class="form-group my-1">
        <label class="mt-2" for="comment">İlan Açıklaması</label>
        <textarea class="form-control col-6 mt-0" id="comment" name="comment" rows="4"><?php echo $resultx['comment'] ?></textarea>
    </div>
    <hr>
    <!-- bootstrap select dropdowns -->
    <div class="form-group d-flex flex-column flex-xl-row my-2">
        <select id="select-city" class="me-2" name="city" data-live-search="true" title="İl" data-style="btn-primary">
            <?php
            $connect = new Connect();
            $queryGetCities = "SELECT * FROM tblcity ORDER BY city_name COLLATE utf8_turkish_ci ASC";
            $result = $connect->read($queryGetCities);

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <option value="<?php echo $row['city_name'] ?>" <?php if ($row['city_name'] == $resultx['city']) echo 'selected' ?>><?php echo $row['city_name'] ?></option>
            <?php
            }
            ?>
        </select>
        <select id="select-district" class="selectpicker me-2 mt-1 mt-xl-0" name="district" data-live-search="true" title="İlçe" data-style="btn-primary">
            <?php
            $queryGetDistrict = "SELECT * FROM tbldistrict WHERE city_name=? ORDER BY district_id ASC";
            $getDistrictResult = $connect->read($queryGetDistrict, array($resultx['city']));
            while ($optionDistrict = $getDistrictResult->fetch(PDO::FETCH_ASSOC)) { ?>
                <option class="option-district" value="<?php echo $optionDistrict['district_name'] ?>" <?php if ($resultx['district'] == $optionDistrict['district_name']) echo 'selected' ?>><?php echo $optionDistrict['district_name'] ?></option>
            <?php
            }
            ?>
        </select>
        <select id="select-quarter" class="selectpicker mt-1 mt-xl-0" name="quarter" data-live-search="true" title="Mahalle" data-style="btn-primary">
            <?php $queryGetQuarter = "SELECT * FROM tblquarter WHERE district_name=? ORDER BY quarter_id ASC";
            $getQuarterResult = $connect->read($queryGetQuarter, array($resultx['district'])); ?>
            <?php
            while ($optionQuarter = $getQuarterResult->fetch(PDO::FETCH_ASSOC)) { ?>
                <option class="option-quarter" value="<?php echo $optionQuarter['quarter_name'] ?>" <?php if ($resultx['quarter'] == $optionQuarter['quarter_name']) echo 'selected' ?>><?php echo $optionQuarter['quarter_name'] ?></option>
            <?php
            }
            ?>
        </select>
    </div><!-- bootstrap select dropdowns end-->
    <hr>
    <div class="form-group my-2">
        <label for="cost">Fiyat (TL)</label>
        <input class="form-control" name="cost" id="cost" type="number" placeholder="Fiyat (TL)" value="<?php echo $resultx['cost'] ?>">
    </div>
    <hr>
    <div class="form-group d-flex align-items-center">
        <div class="col-4 col-md-3 col-lg-2 col-xl-1">
            <label class="ms-1" for="area">m² (Net) </label>
            <input class="form-control w-100" name="area" id="area" type="number" placeholder="m² (Net)" value="<?php if (!empty($resultx['area'])) {
                                                                                                                    echo $resultx['area'];
                                                                                                                } else {
                                                                                                                    echo "";
                                                                                                                } ?>">
        </div>
        <div class="col-4 col-md-3 col-lg-2 col-xl-1 mx-1">
            <label class="ms-1" for="areaGross">m² (Brüt) </label>
            <input class="form-control w-100" name="areaGross" id="areaGross" type="number" placeholder="m² (Brüt)" value="<?php if (!empty($resultx['area_gross'])) {
                                                                                                                                echo $resultx['area_gross'];
                                                                                                                            } else {
                                                                                                                                echo "";
                                                                                                                            } ?>">
        </div>
    </div>
    <hr>
    <div class="form-group my-2">
        <div class="row">
            <div class="advanced-radio col-5 col-lg-2 ms-3" style-type="grid" style-color="light">
                <input type="radio" label="Eşyasız" name="furnished" value="Eşyasız" checked>
                <input type="radio" label="Eşyalı" name="furnished" value="Eşyalı">
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group my-2">
        <div class="advanced-radio col-6 col-lg-3" style-type="grid" style-color="light">
            <input label="Balkon var" type="radio" name="balcony" id="balcony" value="1" checked>
            <input label="Balkon yok" type="radio" name="balcony" id="balcony" value="0" <?php if ($resultx['balcony'] == "0") {
                                                                                                echo "checked";
                                                                                            } ?>>
        </div>
    </div>
    <hr>
    <div class="form-group my-2">
        <select class="custom-select selectpicker col-3 col-sm-2 col-md-2 col-lg-1" name="room" id="room" data-style="btn-primary">
            <option selected>Oda</option>
            <?php
            for ($i = 1; $i <= 6; $i++) {
                for ($j = 0; $j <= $i; $j++) {
                    if ($i . "+" . $j == $resultx['room']) {
                        echo "<option selected value='$i+$j'>$i+$j</option>";
                    }
                    echo "<option value='$i+$j'>$i+$j</option>";
                }
            }
            ?>
        </select>
    </div>
    <hr>
    <div class="form-group row my-2 justify-content-start">
        <div class="ps-1 col-4 col-md-2 col-xl-1"><label for="floors">Kat Sayısı</label><input class="form-control input-number w-100" type="number" name="floors" id="floors" placeholder="Kat sayısı" value="<?php if (!empty($resultx['floors'])) {
                                                                                                                                                                                                                    echo $resultx['floors'];
                                                                                                                                                                                                                } ?>"></div>
        <div class="ps-1 mt-1 mt-md-0 col-4 col-md-2 col-xl-1 "> <label for="floor">Kat</label><input class="form-control input-number w-100" type="number" name="floor" id="floor" placeholder="Bulunduğu kat" value="<?php if (!empty($resultx['floor'])) {
                                                                                                                                                                                                                            echo $resultx['floor'];
                                                                                                                                                                                                                        } ?>"></div>
        <div class="ps-1 mt-1 mt-md-0 col-4 col-md-2 col-xl-1 "> <label for="age">Bina yaşı</label><input class="form-control input-number w-100" type="number" name="age" id="age" placeholder="Bina yaşı" value="<?php if (!empty($resultx['age'])) {
                                                                                                                                                                                                                        echo $resultx['age'];
                                                                                                                                                                                                                    } ?>"></div>
        <div class="ps-1 mt-1 mt-md-0 col-4 col-md-2 col-xl-1 "> <label for="bathroom">Banyo sayısı</label><input class="form-control input-number w-100" type="number" name="bathroom" id="bathroom" placeholder="Banyo" value="<?php if (!empty($resultx['bathrooms'])) {
                                                                                                                                                                                                                                        echo $resultx['bathrooms'];
                                                                                                                                                                                                                                    } ?>"></div>
        <div class="ps-1 mt-1 mt-md-0 col-4 col-md-2 col-xl-1 "> <label for="fuel">Isıtma</label><input class="form-control input-number w-100" type="text" name="fuel" id="fuel" placeholder="Isıtma" value="<?php if (!empty($resultx['fuel_type'])) {
                                                                                                                                                                                                                    echo $resultx['fuel_type'];
                                                                                                                                                                                                                } ?>"></div>
        <div class="ps-1 mt-1 mt-md-0 col-4 col-md-2 col-xl-1 "> <label for="constructType">Yapı malz.</label><input class="form-control input-number w-100" type="text" name="constructType" id="constructType" placeholder="Yapı mlz." value="<?php if (!empty($resultx['construct_type'])) {
                                                                                                                                                                                                                                                    echo $resultx['construct_type'];
                                                                                                                                                                                                                                                } ?>"></div>
        <div class="ps-1 mt-1 mt-md-0 col-6 col-md-3 col-xl-2 "> <label for="deedCase">Tapu durumu</label><input class="form-control input-number w-100" type="text" name="deedCase" id="deedCase" placeholder="Tapu durumu" value="<?php if (!empty($resultx['deed_case'])) {
                                                                                                                                                                                                                                        echo $resultx['deed_case'];
                                                                                                                                                                                                                                    } ?>"></div>
    </div>
    <hr>
    <div class=" form-group row my-2">
        <label for="images">Resimler</label>
        <input type="file" class="form-control" id="images" name="images[]" multiple>
    </div>
    <hr>
    <button type="submit" name="submit" class="btn btn-primary mb-2">İlanı Yükle</button>


</form>

<?php
ob_flush();
?>