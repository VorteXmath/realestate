<div class="wrapper-filter">
    <div class="side-filters background-white p-2">
        <div class="advanced-radio" style-type="grid">
            <input label="Tümü" type="radio" name="prop_case" value="all" checked>
            <input label="Satılık" type="radio" name="prop_case" value="onSale">
            <input label="Kiralık" type="radio" name="prop_case" value="onHire">
        </div>

        <div class="advanced-radio my-1" style-type="grid">
            <input label="Tümü" type="radio" name="type" value="all" checked>
            <input label="Konut" type="radio" name="type" value="house">
            <input label="İşyeri" type="radio" name="type" value="business">
            <input label="Arsa" type="radio" name="type" value="land">
        </div>

        <select id="select-city" class="selectpicker dropdown-location w-100 mb-1" name="city" data-live-search="true" title="İl" data-style="btn-primary">
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
            <select id="select-district" class="selectpicker dropdown-location w-100 mb-1" name="district" data-live-search="true" title="İlçe" data-style="btn-primary">

            </select>
        </div>
        <div class="">
            <select id="select-quarter" class="selectpicker dropdown-location w-100 mb-1" name="quarter" data-live-search="true" title="Mahalle" data-style="btn-primary">

            </select>
        </div>
        <div class="filter-card price mt-2 bg-faded active">
            <div>
                <h6 class="bg-primary text-white">
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
                <h6 class="bg-primary text-white">
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
    </div>
</div>