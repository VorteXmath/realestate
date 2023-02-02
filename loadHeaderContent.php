<div class="header-content">
    <h4 class="header-subtitle">HIZLI, GÜVENİLİR, PROFESYONEL ÇÖZÜM ORTAĞINIZ
    </h4>

    <form class="index-filter-form" class="d-flex flex-column" action="ilanlar.php" method="GET">
        <div class="advanced-radio w-75 sm-w-50 mx-auto" style-type="grid" style-color="light">
            <input label="Tümü" type="radio" name="type" value="" checked>
            <input label="Konut" type="radio" name="type" value="Konut">
            <input label="İşyeri" type="radio" name="type" value="İşyeri">
            <input label="Arsa" type="radio" name="type" value="Arsa">
        </div>
        <div class="form-group form-group-city-dropdown-index flex-column flex-sm-row d-flex align-items-center">
            <select id="select-city" class="selectpicker dropdown-location mx-1 my-1" name="city" data-live-search="true" title="İl" data-style="btn-bordered">
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
            <select style="border-left:2px solid black" id="select-district" class="selectpicker dropdown-location mx-1 my-1" name="district" data-live-search="true" title="İlçe" data-style="btn-bordered">

            </select>
            <button class="btn btn-primary btn-header-search ml-1" type="submit"><i class="fa-solid fa-magnifying-glass search"></i></button>
        </div>

    </form>
</div>