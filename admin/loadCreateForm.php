<form action="action-property.php?action=create" method="POST" enctype="multipart/form-data">
    <div class="form-group m-2">
        <div class="row">
            <div class="advanced-radio col-6 col-sm-4 col-xl-2" style-type="grid" style-color="light">
                <input type="radio" label="Satılık" name="prop_case" value="Satılık" checked>
                <input type="radio" label="Kiralık" name="prop_case" value="Kiralık">
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group my-2">
        <label class="me-1" for="type">Emlak Türü:</label><br>
        <select class="selectpicker" name="type" id="type" data-style="btn-secondary">
            <option value="Konut">Konut</option>
            <option value="İşyeri">İşyeri</option>
            <option value="Arsa">Arsa</option>
        </select>
    </div>
    <hr>
    <div class="form-group mt-2">
        <label class="mb-2" for="title">İlan Başlığı</label>
        <input type="text" class="form-control col-12 col-xl-6" id="title" name="title" placeholder="İlan Başlığı">
    </div>
    <div class="form-group my-1">
        <label class="mt-2" for="comment">İlan Açıklaması</label>
        <textarea class="form-control col-6 mt-0" id="comment" name="comment" rows="4"></textarea>
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
                <option value="<?php echo $row['city_name'] ?>"><?php echo $row['city_name'] ?></option>
            <?php
            }
            ?>
        </select>
        <select id="select-district" class="selectpicker me-2 mt-1" name="district" data-live-search="true" title="İlçe" data-style="btn-primary">

        </select>
        <select id="select-quarter" class="selectpicker mt-1" name="quarter" data-live-search="true" title="Mahalle" data-style="btn-primary">

        </select>
    </div><!-- bootstrap select dropdowns end-->
    <hr>
    <div class="form-group my-2">
        <input class="form-control" name="cost" id="cost" type="number" placeholder="Fiyat (TL)">
    </div>
    <hr>
    <div class="form-group d-flex">
        <input class="form-control col-4 col-md-3 col-lg-2 col-xl-1 me-1" name="area" id="area" type="number" placeholder="m² (Net)">
        <input class="form-control col-4 col-md-3 col-lg-2 col-xl-1" name="areaGross" id="areaGross" type="number" placeholder="m² (Brüt)">
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
            <input label="Balkon yok" type="radio" name="balcony" id="balcony" value="0">
        </div>
    </div>
    <hr>
    <div class="form-group my-2">
        <select class="custom-select selectpicker col-3 col-sm-2 col-md-2 col-lg-1" name="room" id="room" data-style="btn-primary">
            <option selected>Oda</option>
            <?php
            for ($i = 1; $i <= 6; $i++) {
                for ($j = 0; $j <= $i; $j++) {
                    echo "<option value='$i+$j'>$i+$j</option>";
                }
            }
            ?>
        </select>
    </div>
    <hr>
    <div class="form-group row my-2 justify-content-start">
        <input class="form-control input-number col-4 col-md-2 col-xl-1 mx-1" type="number" name="floors" id="floors" placeholder="Kat sayısı">
        <input class="form-control input-number col-4 col-md-3 col-xl-2 mx-1" type="number" name="floor" id="floor" placeholder="Bulunduğu kat">
        <input class="form-control input-number mt-1 mt-md-0 col-4 col-md-2 col-xl-1 mx-1" type="number" name="age" id="age" placeholder="Bina yaşı">
        <input class="form-control input-number mt-1 mt-md-0 col-4 col-md-2 col-xl-1 mx-1" type="number" name="bathroom" id="bathroom" placeholder="Banyo">
        <input class="form-control input-number mt-1 mt-md-0 col-4 col-md-2 col-xl-1 mx-1" type="text" name="fuel" id="fuel" placeholder="Isıtma">
        <input class="form-control input-number mt-1 mt-md-0 col-4 col-md-2 col-xl-1 mx-1" type="text" name="constructType" id="constructType" placeholder="Yapı mlz.">
        <input class="form-control input-number mt-1 mt-md-0 col-6 col-md-3 col-xl-2 mx-1" type="text" name="deedCase" id="deedCase" placeholder="Tapu durumu">
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