<?php require_once "init.php";
?>
<div class="filter-modal">
    <div class="filters">
        <div class="modal-header">
            <h3>Filtre</h3>
        </div>
        <div class="modal-body">
            <div class="type-select d-flex">
                <div class="radio-row bg-primary"><label for="type-konut">Konut</label> <input class="radio-type" name="type" type="radio"></div>
                <div class="radio-row bg-primary"><label for="type-isyeri">İşyeri</label> <input class="radio-type" name="type" type="radio"></div>
                <div class="radio-row bg-primary"><label for="type-arsa">Arsa</label> <input class="radio-type" name="type" type="radio"></div>
                <div class="radio-row bg-primary"><label for="type-bina">Bina</label> <input class="radio-type" name="type" type="radio"></div>
            </div>
            <div class="filter-area">
                <div class="form-group d-flex flex-column bg-white p-1 rounded">
                    <select id="select-city" class="my-1" name="city" data-live-search="true" title="İl" data-style="btn-primary">
                        <?php

                        $queryGetCities = "SELECT * FROM tblcity ORDER BY city_name COLLATE utf8_turkish_ci ASC";
                        $result = $connect->read($queryGetCities);

                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <option value="<?php echo $row['city_name'] ?>"><?php echo $row['city_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <select id="select-district" class="selectpicker my-1" name="district" data-live-search="true" title="İlçe" data-style="btn-primary">
                        
                    </select>
                    <select id="select-quarter" class="selectpicker my-1" name="quarter" data-live-search="true" title="Mahalle" data-style="btn-primary">
                        
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer"></div>
    </div>
</div>