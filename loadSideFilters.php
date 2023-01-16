<div class="wrapper-filter">
    <div class="side-filters background-white p-2">
        <div class="advanced-radio" style-type="grid" style-color="light">
            <input label="Tümü" type="radio" name="prop_case" value="all" checked>
            <input label="Satılık" type="radio" name="prop_case" value="Satılık">
            <input label="Kiralık" type="radio" name="prop_case" value="Kiralık">
        </div>

        <div class="advanced-radio my-1" style-type="grid" style-color=light>
            <input label="Tümü" type="radio" name="type" value="all" checked>
            <input label="Konut" type="radio" name="type" value="Konut">
            <input label="İşyeri" type="radio" name="type" value="İşyeri">
            <input label="Arsa" type="radio" name="type" value="Arsa">
        </div>

        <select id="select-city" class="selectpicker dropdown-location w-100 mb-1" name="city" data-live-search="true" title="İl" data-style="btn-blue">
            <option value="all">TÜM İLLER</option>
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
        <div class="">
            <select id="select-district" class="selectpicker dropdown-location w-100 mb-1" name="district" data-live-search="true" title="İlçe" data-style="btn-blue">

            </select>
        </div>
        <div class="">
            <select id="select-quarter" class="selectpicker dropdown-location w-100 mb-1" name="quarter" data-live-search="true" title="Mahalle" data-style="btn-blue">

            </select>
        </div>
        <div class="filter-card price mt-2 bg-faded active">
            <div>
                <h6 class="filters-accordion">
                    Fiyat
                </h6>
            </div>
            <div class="filter-card-content d-flex flex-column">
                <hr style="margin:0">
                <div class="xrow d-flex p-1">
                    <label class="align-middle mr-2" for="costMin">En Düşük</label>
                    <div><input type="number" id="costMin" placeholder="Min"><span>TL</span></div>
                </div>
                <div class="xrow d-flex p-1">
                    <label class="align-middle mr-1" for="costMax">En Yüksek</label>
                    <div><input type="number" id="costMax" placeholder="Maks"><span>TL</span></div>
                </div>
            </div>
        </div>
        <div class="filter-card area mt-1 bg-faded">
            <div>
                <h6 class="filters-accordion">
                    m²(Brüt)
                </h6>
            </div>

            <div class="filter-card-content d-flex flex-column">
                <div class="xrow d-flex p-1">
                    <label class="align-middle mr-2" for="areaMin">En Düşük</label>
                    <div><input type="number" id="areaMin" placeholder="Min"><span>m²</span></div>
                </div>
                <div class="xrow d-flex p-1">
                    <label class="align-middle mr-1" for="areaMax">En Yüksek</label>
                    <div><input type="number" id="areaMax" placeholder="Maks"><span>m²</span></div>
                </div>
            </div>
        </div>
        <div class="filter-card area mt-1 bg-faded">
            <div>
                <h6 class="filters-accordion">
                    Oda Sayısı
                </h6>
            </div>
            <div class="filter-card-content room-content">
                <hr class="m-0">

                <div class="d-flex flex-column">
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="1+0" value="1+0"></input><label for="1+0">1+0</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="1+1" value="1+1"></input><label for="1+1">1+1</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="2+0" value="2+0"></input><label for="2+0">2+0</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="2+1" value="2+1"></input><label for="2+1">2+1</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="2+2" value="2+2"></input><label for="2+2">2+2</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="3+0" value="3+0"></input><label for="3+0">3+0</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="3+1" value="3+1"></input><label for="3+1">3+1</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="3+2" value="3+2"></input><label for="3+2">3+2</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="3+3" value="3+3"></input><label for="3+3">3+3</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="4+0" value="4+0"></input><label for="4+0">4+0</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="4+1" value="4+1"></input><label for="4+1">4+1</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="4+2" value="4+2"></input><label for="4+2">4+2</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="4+3" value="4+3"></input><label for="4+3">4+3</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="4+4" value="4+4"></input><label for="4+4">4+4</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="5+0" value="5+0"></input><label for="5+0">5+0</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="5+1" value="5+1"></input><label for="5+1">5+1</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="5+2" value="5+2"></input><label for="5+2">5+2</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="5+3" value="5+3"></input><label for="5+3">5+3</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="5+4" value="5+4"></input><label for="5+4">5+4</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="5+5" value="5+5"></input><label for="5+5">5+5</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="6+0" value="6+0"></input><label for="6+0">6+0</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="6+1" value="6+1"></input><label for="6+1">6+1</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="6+2" value="6+2"></input><label for="6+2">6+2</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="6+3" value="6+3"></input><label for="6+3">6+3</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="6+4" value="6+4"></input><label for="6+4">6+4</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="6+5" value="6+5"></input><label for="6+5">6+5</label></div>
                    <div class="row d-flex align-items-center"><input class="checkbox-room" type="checkbox" id="6+6" value="6+6"></input><label for="6+6">6+6</label></div>
                </div>
            </div>
        </div>
    </div>
</div>