//dynamic header
function dynamicHeader() {
    var header = document.querySelector("header.header-wrap");
    var height = window.innerHeight + 'px';
    header.style.height = height;

    window.addEventListener('resize', () => {
        height = window.innerHeight + 'px';
        header.style.height = height;
    });
}


//dynamic navbar
let dynamicNavbar = () => {
    let navbar = document.querySelector(".container-wrapper");
    window.addEventListener("scroll", () => {
        let scrollY = window.scrollY;
        if (scrollY > 100) {
            if (!navbar.classList.contains("scrolled")) {
                navbar.classList.add("scrolled");
            }
        }
        else if (scrollY <= 200) {
            if (navbar.classList.contains("scrolled")) {
                navbar.classList.remove("scrolled")
            }
        }
    })
}

function getSelectPicker() {
    let createFilters = {
        city: "",
        district: ""
    }

    let citySelect = document.querySelector("#select-city");
    let districtSelect = document.querySelector("#select-district");

    citySelect.addEventListener("change", (e) => {
        createFilters.city = e.target.value
        $.ajax({
            url: "ajax/get-districts.php",
            method: 'POST',
            data: {
                city: createFilters.city
            },
            success: (data) => {
                $("#select-district").html(data).selectpicker('refresh');
            }
        })
    })
    districtSelect.addEventListener("change", (e) => {
        createFilters.district = e.target.value
        $.ajax({
            url: "ajax/get-quarters.php",
            method: 'POST',
            data: {
                district: createFilters.district
            },
            success: (data) => {
                $("#select-quarter").html(data).selectpicker('refresh');
            }
        })
    })

    $("#select-city").selectpicker()
    $("#select-district").selectpicker()
    $("#select-quarter").selectpicker()
}

// toggle sidebar
toggleSidebar()
function toggleSidebar() {
    let sidebar = document.querySelector(".sidebar");
    let togglebutton = document.querySelector(".btn-toggle-sidebar");
    let closeButton = document.querySelector(".btn-close-sidebar")
    let wrapper = document.querySelector(".sidebar-wrapper");

    togglebutton.addEventListener("click", () => {
        toggleSidebar();
    })
    window.addEventListener("resize", () => {
        if (window.innerWidth > 992 && isActive()) {
            wrapper.classList.remove("sidebar-active")
        }
    })

    wrapper.addEventListener("click", (e) => {
        if (e.target.classList.contains("sidebar-wrapper") | e.target.classList.contains("btn-close-sidebar") | e.target.classList.contains("fa-chevron-left")) {
            toggleSidebar();
        } else {
            console.log(e.target)
        }
    })

    function toggleSidebar() {
        wrapper.classList.toggle("sidebar-active")
    }

    function isActive() {
        if (wrapper.classList.contains("sidebar-active")) {
            return true;
        }
        return false;
    }
}

// sidebar accordion 

function accordionToggle(e) {
    let accordionWrapper = e.parentElement;
    accordionWrapper.classList.toggle("accordion-active");
}

// filter card toggle


function filterToggle() {
    let filterCards = document.querySelectorAll(".filter-card");

    Array.from(filterCards).forEach(function (e) {
        let cardHeader = e.querySelector("h6");
        cardHeader.addEventListener("click", () => toggleFunction(e))
    })

    function toggleFunction(filterCard) {

        filterCard.classList.toggle("active");
    }
}
 
// toggle filter
$(".btn-toggle-filter").on("click", () => {
    $(".wrapper-filter").addClass("filter-on");
})

$(".wrapper-filter").on("click", (e) => {
    if (e.target.classList.contains("wrapper-filter")) {
        $(".wrapper-filter").removeClass('filter-on');
    }
})

// toggle sort
$(".btn-toggle-sort").on("click", () => {
    $(".wrapper-sort").addClass("sort-on");
})

$(".wrapper-sort").on("click", (e) => {
    if (e.target.classList.contains("wrapper-sort")) {
        $(".wrapper-sort").removeClass('sort-on');
    }
})
