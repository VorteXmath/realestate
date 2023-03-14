<?php
$case = isset($_GET['case']) ? $_GET['case'] : "all";
$type = isset($_GET['type']) ? $_GET['type'] : "all";
$city = isset($_GET['city']) ? $_GET['city'] : "all";
$district = isset($_GET['district']) ? $_GET['district'] : "all";
?>
<div class="wrapper-filter">
    <div class="ssss">
    <div class="advanced-radio" style-type="tab" style-color="light">
            <input label="Tümü" type="radio" name="prop_case" value="all" checked>
            <input label="Satılık" type="radio" name="prop_case" value="Satılık" <?php if ($case == "Satılık") echo "checked" ?>>
            <input label="Kiralık" type="radio" name="prop_case" value="Kiralık" <?php if ($case == "Kiralık") echo "checked" ?>>
        </div>
        <div class="side-filters background-white p-2">


            <select id="select-city" class="selectpicker dropdown-location w-100 mb-1 mt-3" name="city" data-live-search="true" title="<?php if (isset($_GET['city'])  && !empty($_GET['city'])) {
                                                                                                                                            echo $_GET['city'];
                                                                                                                                        } else {
                                                                                                                                            echo "İl";
                                                                                                                                        } ?>" data-style="btn-solid">
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
                <select id="select-district" class="selectpicker dropdown-location w-100 mb-1" name="district" data-live-search="true" title="<?php if (isset($_GET['district']) && !empty($_GET['district'])) {
                                                                                                                                                    echo $_GET['district'];
                                                                                                                                                } else {
                                                                                                                                                    echo "İlçe";
                                                                                                                                                } ?>" data-style="btn-solid">

                </select>
            </div>
            <div class="">
                <select id="select-quarter" class="selectpicker dropdown-location w-100 mb-1" name="quarter" data-live-search="true" title="Mahalle" data-style="btn-solid">

                </select>
            </div>
            <div class="advanced-radio my-1" style-type="grid" style-color=light>
                <input label="Tümü" type="radio" name="type" value="all" checked>
                <input label="Konut" type="radio" name="type" value="Konut" <?php if ($type == "Konut") echo "checked" ?>>
                <input label="İşyeri" type="radio" name="type" value="İşyeri" <?php if ($type == "İşyeri") echo "checked" ?>>
                <input label="Arsa" type="radio" name="type" value="Arsa" <?php if ($type == "Arsa") echo "checked" ?>>
            </div>
            <div class="filter-card price mt-2 active">
                <div>
                    <h6 class="filters-accordion">
                        Fiyat
                    </h6>
                </div>
                <div class="filter-card-content">
                    <input type="number" id="costMin" placeholder="Min TL">
                    <span>-</span>
                    <input type="number" id="costMax" placeholder="Max TL">
                </div>
            </div>
            <div class="filter-card price mt-2">
                <div>
                    <h6 class="filters-accordion">
                        m²(Brüt)
                    </h6>
                </div>
                <div class="filter-card-content">
                    <input type="number" id="areaMin" placeholder="Min">
                    <span>-</span>
                    <input type="number" id="areaMax" placeholder="Max">
                </div>
            </div>
            <div class="filter-card price mt-2">
                <div>
                    <h6 class="filters-accordion">
                        Oda Sayısı
                    </h6>
                </div>
                <div class="filter-card-content room-content">
                    <?php
                    for ($i = 1; $i <= 6; $i++) {
                        for ($j = 0; $j <= $i; $j++) {
                            echo "<div class='row-select-room'><input class='checkbox-room' type='checkbox' id='$i+$j' value='$i+$j'></input><label for='$i+$j'>$i+$j</label></div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>