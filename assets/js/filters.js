let filters = {
    type: "",
    room: Array(),
    roomJSON: "",
    city: "",
    district: "",
    quarter: "",
    costMin: "",
    costMax: "",
    areaMin: "",
    areaMax: "",
    prop_case: "",
    offset: 1
};

//handle url params
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

filters.type = urlParams.get('type');
filters.city = urlParams.get('city');
filters.district = urlParams.get('district');
filters.prop_case = urlParams.get('case');


getProperties();
function getProperties() {
    $.ajax({
        url: "ajax/get-properties.php",
        method: "POST",
        data: {
            prop_case: filters.prop_case,
            type: filters.type,
            room: filters.roomJSON,
            city: filters.city,
            district: filters.district,
            quarter: filters.quarter,
            areaMin: filters.areaMin,
            areaMax: filters.areaMax,
            costMin: filters.costMin,
            costMax: filters.costMax,
            offset: filters.offset
        },
        success: (data) => {
            $("#properties").html(data);
            // createPageSelectorOptions();
            // changeSelectedPageNumber();
        }
    })
}


$("input[name='prop_case']").change(e => {
    filters.prop_case = e.target.value;
    getProperties();
});

$("input[name='type']").change(e => {
    filters.type = e.target.value;
    getProperties();
});

$("select[name='city']").change(e => {
    filters.city = e.target.value;
    getProperties();
});

$("select[name='district']").change(e => {
    filters.district = e.target.value;
    getProperties();
});

$("select[name='quarter']").change(e => {
    filters.quarter = e.target.value;
    getProperties();
});

$("select[name='quarter']").change(e => {
    filters.quarter = e.target.value;
    getProperties();
});

$("input#costMin").keyup(e => {
    filters.costMin = e.target.value;
    getProperties();
});

$("input#costMax").keyup(e => {
    filters.costMax = e.target.value;
    getProperties();
});


$("input#areaMin").keyup(e => {
    filters.areaMin = e.target.value;
    getProperties();
});

$("input#areaMax").keyup(e => {
    filters.areaMax = e.target.value;
    getProperties();
});

let rooms = document.querySelectorAll(".checkbox-room");

rooms.forEach(e => {
    e.addEventListener("change", () => {
        if (e.checked) {
            filters.room.push(e.value);
        } else {
            filters.room = filters.room.filter(r => r !== e.value);

        }

        filters.roomJSON = JSON.stringify(filters.room);
        // console.log(filters.roomJSON)
        // filters.room.forEach(w => {
        //     console.log(w);
        // })
        getProperties();

    })
})






