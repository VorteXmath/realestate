<div class="header-content d-flex flex-column justify-content-center align-items-center h-100 text-white">


    <form style="-webkit-filter: drop-shadow(10px 10px 10px #222);filter: drop-shadow(10px 10px 10px #222);z-index:5" class="d-flex flex-column" action="ilanlar.php" method="GET">
        <div class="advanced-radio my-1 w-50" style-type="grid">
            <input label="Tümü" type="radio" name="type" value="all" checked>
            <input label="Konut" type="radio" name="type" value="house">
            <input label="İşyeri" type="radio" name="type" value="business">
            <input label="Arsa" type="radio" name="type" value="land">
        </div>
        <div class="form-group flex-column flex-sm-row d-flex">
            <select id="select-city" class="selectpicker dropdown-location" name="city" data-live-search="true" title="İl" data-style="btn-light">
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
            <select style="border-left:2px solid black" id="select-district" class="selectpicker dropdown-location" name="district" data-live-search="true" title="İlçe" data-style="btn-light">

            </select>
            <button type="submit"><i class="fa-solid fa-magnifying-glass search"></i></button>
        </div>

    </form>
    <div class="header-head mt-5 text-center">
        <h4 style="-webkit-filter: drop-shadow(10px 10px 10px #222);filter: drop-shadow(10px 10px 10px #222);">HIZLI, GÜVENİLİR, PROFESYONEL ÇÖZÜM ORTAĞINIZ
        </h4>
    </div>
</div>