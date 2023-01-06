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
var hcontainer = document.querySelector(".container-header");
var navLink = document.querySelectorAll("ul > li > a");
var navLogo = document.querySelector(".logo-navigator");

function dynamicNavbar() {
    window.addEventListener("scroll", (e) => {

        if (window.scrollY == 0) {
            hcontainer.classList.remove("scrolled");
        }
        if (window.scrollY >= 300) {
            navLogo.classList.remove("d-none");
        }
        if (window.scrollY < 300) {
            if (!navLogo.classList.contains("d-none")) {
                navLogo.classList += " d-none";
            }
        }
        if (window.scrollY > 0) {
            if (!hcontainer.classList.contains("scrolled")) {
                hcontainer.classList += " scrolled";
            }
        }
    })
}

//filter prop
// let filters = {
//     type: "",
//     city: "",
//     district: "",
//     quarter: "",
//     room: "",
//     m2min: "",
//     m2max: "",
//     priceMin: "",
//     priceMax: "",
//     offset: 1
// }

// //handle url params
// const queryString = window.location.search;
// const urlParams = new URLSearchParams(queryString);
// filters.type = urlParams.get('emlaktipi');
// filters.city = urlParams.get('city');
// filters.district = urlParams.get('district');


// //get properties
// function getItems() {
//     $.ajax({
//         url: "ajax/get-properties.php",
//         method: "POST",
//         data: {
//             type: filters.type,
//             room: filters.room,
//             city: filters.city,
//             district: filters.district,
//             quarter: filters.quarter,
//             m2min: filters.m2min,
//             m2max: filters.m2max,
//             priceMin: filters.priceMin,
//             priceMax: filters.priceMax,
//             offset: filters.offset
//         },
//         success: (data) => {
//             $("#properties").html(data);
//             // createPageSelectorOptions();
//             // changeSelectedPageNumber();
//         }
//     })
// }

// // creates options of dropdown selector page
// function createPageSelectorOptions() {
//     const selectPageItem = document.querySelector("#select-page");
//     selectPageItem.innerHTML = "";
//     for (let i = 1; i < totalPageCount() + 1; i++) {
//         const optionItem = document.createElement("option");
//         optionItem.textContent = i;
//         optionItem.className = "pageOption";
//         selectPageItem.appendChild(optionItem);
//     }
// }

// changes selected page number on the dropdown

// function changeSelectedPageNumber() {
//     let options = document.querySelectorAll(".pageOption");
//     for (const option of options) {
//         if (option.value == currentPageNumber) {
//             option.selected = "selected";
//         }
//     }
// }

// function totalPageCount() {  //returns total page count
//     const pageCount = parseInt(document.querySelector("#pageCount").textContent);

//     return pageCount;
// }

// //change page
// const pageSelector = document.querySelector("#select-page");
// let currentPageNumber = 1;

// function changePage() {
//     pageSelector.addEventListener("change", (e) => {
//         filters.offset = pageSelector.value;
//         getItems();
//         currentPageNumber = e.target.value;
//     })
// }

// //next page button
// function nextPage() {
//     const btnNextPage = document.querySelector("#btn-next-page");

//     btnNextPage.addEventListener("click", () => {
//         if (totalPageCount() > filters.offset) {
//             filters.offset++;
//             currentPageNumber++;
//             getItems();
//         }
//     })
// }

// //previous page button
// function prevPage() {
//     const btnPrevPage = document.querySelector("#btn-prev-page");
//     btnPrevPage.addEventListener("click", () => {
//         if (filters.offset > 1) {
//             filters.offset--;
//             currentPageNumber--;
//             getItems();
//         }
//     })
// }


// // sliding images


// var slideIndex = 1;
// displaySlide(slideIndex);

// function moveSlides(n) {
//     displaySlide(slideIndex += n);
// }

// function activeSlide(n) {
//     displaySlide(slideIndex = n);
// }

// function displaySlide(n) {
//     let changeEvent = window.event;
//     var i;


//     if (changeEvent) {
//         var totalslides = changeEvent.target.parentElement.parentElement.getElementsByClassName("slide");
//     }

//     try {
//         if (n > totalslides.length) {
//             slideIndex = 1;
//         }
//     } catch (error) {

//     }

//     if (n < 1) {
//         slideIndex = totalslides.length;
//     }
//     try {
//         for (i = 0; i < totalslides.length; i++) {
//             totalslides[i].style.display = "none";
//         }
//         totalslides[slideIndex - 1].style.display = "block";
//     } catch (error) {

//     }
// }

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

let toggleFilterBtn = document.querySelector('.btn-toggle-filter')
let filterWrapper = document.querySelector(".wrapper-filter");
toggleFilterBtn.addEventListener('click',()=>{
    filterWrapper.classList.toggle('filter-on')
})
filterWrapper.addEventListener('click',e=>{
    if(e.target.classList.contains("wrapper-filter")){
        filterWrapper.classList.toggle('filter-on')
    }
})

window.addEventListener('scroll',()=>{
    if(window.scrollY > 70){
        $(".side-filters").css("position","fixed");
    }
    // if(window.scrollY > 1180){
    //     $(".side-filters").css("bottom","310px")
    // }
    else{
        $(".side-filters").css("position","relative");
        $(".side-filters").css("top","10px");
    }
})
