<nav class="navbar container d-flex justify-content-between">
    <div class="btn-toggle-sidebar"><i class="fa-solid fa-bars"></i></div>
    <div class="logo">
        <a href="index.php">
            <h1>Emlak<span>hub</span></h1>
        </a>
    </div>
    <ul class="navbar-list d-flex h-100">
        <li><a class="nav-link-item px-4" href="index.php">Ana Sayfa</a></li>
        <li class="nav-item dropdown">
            <a class="nav-link-item dropdown-toggle px-4" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Satılık</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Daire</a></li>
                <li><a class="dropdown-item" href="#">Bina</a></li>
                <li><a class="dropdown-item" href="#">Arsa</a></li>
                <li><a class="dropdown-item" href="#">İşyeri</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link-item dropdown-toggle px-4" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Kiralık</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Daire</a></li>
                <li><a class="dropdown-item" href="#">Bina</a></li>
                <li><a class="dropdown-item" href="#">Arsa</a></li>
                <li><a class="dropdown-item" href="#">İşyeri</a></li>
            </ul>
        </li>
        <li><a class="nav-link-item px-4" href="index.php">Proje</a></li>
        <li><a class="nav-link-item px-4" href="hakkimizda.php">Hakkımızda</a></li>
        <li><a class="tel-link nav-link-item px-4" href="tel:+90 (541) 505 4991"><i class="tel-icon fa-solid fa-phone-volume mr-1"></i> <span><i>+90 (541) 505 4991</i></span></a></li>
    </ul>
    <div class="sidebar-wrapper">
        <div class="sidebar position-fixed d-flex">
            <div class="sidebar-header d-flex justify-content-end mb-4">
                <button class="btn-close-sidebar"><i class="fa-solid fa-chevron-left w-100 h-100 p-2"></i></button>
            </div>
            <div class="btn-sidebar-item">
                <a href="index.php">Ana Sayfa</a>
            </div>
            <div class="sidebar-accordion-wrapper">
                <div onclick="accordionToggle(this)" class="btn-accordion">
                    <h2>Satılık</h2><i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="accordion-content">
                    <li>
                        <ul><a href="ilan.php?prop_case=&type=daire">Satılık Daire</a></ul>
                        <ul><a href="ilan.php?prop_case=&type=arsa">Satılık Arsa</a></ul>
                        <ul><a href="ilan.php?prop_case=&type=bina">Satılık Bina</a></ul>
                        <ul><a href="ilan.php?prop_case=&type=isyeri">Satılık İşyeri</a></ul>
                    </li>
                </div>
            </div>
            <div class="sidebar-accordion-wrapper">
                <div onclick="accordionToggle(this)" class="btn-accordion">
                    <h2>Satılık</h2><i class="fa-solid fa-chevron-down"></i>
                </div>
                <div class="accordion-content">
                    <li>
                        <ul><a href="ilan.php?prop_case=&type=daire">Satılık Daire</a></ul>
                        <ul><a href="ilan.php?prop_case=&type=arsa">Satılık Arsa</a></ul>
                        <ul><a href="ilan.php?prop_case=&type=bina">Satılık Bina</a></ul>
                        <ul><a href="ilan.php?prop_case=&type=isyeri">Satılık İşyeri</a></ul>
                    </li>
                </div>
            </div>
        </div>
    </div>
</nav>