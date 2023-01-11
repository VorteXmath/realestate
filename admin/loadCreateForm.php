<?php require_once("init.php") ?>

<form action="create-action.php" method="POST" enctype="multipart/form-data">
    <div class="form-group my-2">
        <label class="me-1" for="type">Emlak Türü:</label>
        <select class="selectpicker" name="type" id="type" data-style="btn-secondary">
            <option value="konut" selected>Konut</option>
            <option value="isyeri">İşyeri</option>
            <option value="arsa">Arsa</option>
            <option value="bina">Bina</option>
        </select>
    </div>
    <hr>
    <div class="form-group my-2">
        <label for="title">İlan Başlığı</label>
        <input type="text" class="form-control col-6" id="title" name="title" placeholder="İlan Başlığı">
    </div>
    <hr>
    <div class="form-group my-2">
        <label for="comment">İlan Açıklaması</label>
        <textarea class="form-control col-6" id="comment" name="comment" rows="4"></textarea>
    </div>
    <hr>
    <!-- bootstrap select dropdowns -->
    <div class="form-group d-flex my-2">
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
        <select id="select-district" class="selectpicker me-2" name="district" data-live-search="true" title="İlçe" data-style="btn-primary">

        </select>
        <select id="select-quarter" class="selectpicker" name="quarter" data-live-search="true" title="Mahalle" data-style="btn-primary">

        </select>
    </div><!-- bootstrap select dropdowns end-->
    <hr>
    <div class="form-group my-2">
        <div class="d-flex justify-content-start">
            <div class="custom-control custom-radio custom-control-inline border p-1">
                <input value="Satılık" type="radio" id="onSale" name="prop_case" class="custom-control-input" checked>
                <label class="custom-control-label" for="onSale">Satılık</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline border p-1 ms-1">
                <input value="Kiralık" type="radio" id="onHire" name="prop_case" class="custom-control-input">
                <label class="custom-control-label" for="onHire">Kiralık</label>
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group my-2">
        <label class="ms-1" for="cost">Fiyat</label>
        <input name="cost" id="cost" type="number">
    </div>
    <hr>
    <div class="form-group">
        <label class="ms-1" for="area">Metrekare(m²)</label>
        <input class="col-sm-2 col-md-1" name="area" id="area" type="number">
    </div>
    <hr>
    <div class="form-group my-2">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="notfurnished" name="furnished" class="custom-control-input" checked>
            <label class="custom-control-label" for="notfurnished">Eşyasız</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="isfurnished" name="furnished" class="custom-control-input">
            <label class="custom-control-label" for="isfurnished">Eşyalı</label>
        </div>
    </div>
    <hr>
    <div class="form-group my-2">
        <h4 class="font-size-1">Balkon</h4>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="213" name="balcony" class="custom-control-input" checked>
            <label class="custom-control-label" for="213">Var</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="313" name="balcony" class="custom-control-input">
            <label class="custom-control-label" for="313">Yok</label>
        </div>
    </div>
    <hr>
    <div class="form-group col-xs-6 col-sm-3 col-md-2 col-xl-2 col-sm-1 my-2">
        <label for="type">Oda</label>
        <select class="custom-select" name="room" id="room">
            <option value="1+0">1+0</option>
            <option value="1+1">1+1</option>
            <option value="2+1">2+1</option>
            <option value="2+2">2+2</option>
            <option value="3+1">3+1</option>
            <option value="3+2">3+2</option>
            <option value="4+1">4+1</option>
            <option value="4+2">4+2</option>
            <option value="5+1">5+1</option>
            <option value="5+2">5+2</option>
            <option value="6+2">6+2</option>
            <option selected>Oda</option>
        </select>
    </div>
    <hr>
    <div class="form-group d-flex my-2 justify-content-start">
        <div class="d-flex">
            <label for="age">Bina Yaşı</label>
            <input class="form-control input-number" type="number" name="age" id="age">
        </div>
        <div class="d-flex ms-3">
            <label for="floors">Kat Sayısı</label>
            <input class="form-control input-number" type="number" name="floors" id="floors">
        </div>
        <div class="d-flex ms-3">
            <label for="floor">Bulunduğu Kat</label>
            <input class="form-control input-number" type="number" name="floor" id="floor">
        </div>
        <div class="d-flex ms-3">
            <label for="bathroom">Banyo</label>
            <input class="form-control input-number" type="number" name="bathroom" id="bathroom">
        </div>
    </div>
    <hr>
    <div class=" form-group row my-2">
            <label for="images">Resimler</label>
            <input type="file" class="form-control-file" id="images" name="images[]" multiple>
        </div>
        <hr>
        <button type="submit" name="submit" class="btn btn-primary mb-2">İlanı Yükle</button>


</form>

<?php
ob_flush();
?>