<div class="text-dark my-4">
    <div class="container d-flex flex-column">
        <div class="d-flex align-items-center justify-content-between">
            <div class="breadcrumb-wrap">
                <nav class="text-dark">
                    <ol class="breadcrumb text-dark">
                        <li class="breadcrumb-item"><a class="text-primary" href="index.php">Ana Sayfa</a></li>
                        <li class="breadcrumb-item"><a class="text-primary" href="">İlanlar</a></li>
                        <li class="breadcrumb-item active"><a class="text-dark" href=""><?php echo $prop['title'] ?></a></li>
                    </ol>
                </nav>
            </div>
            <div class="icons">
                <span><i class="icon-share fa-solid fa-square-share-nodes border border-secondary rounded text-secondary"></i></span>
                <span><i class="icon-share fa-solid fa-print border border-secondary rounded text-secondary"></i></span>
            </div>
        </div>
        <div class="prop-title d-flex justify-content-between align-items-center">
            <h1><?php echo $prop['title'] ?></h1>
            <h2><?php echo number_format_unchanged_precision($prop['cost'], ',', '.') . " TL" ?></h2>
        </div>
        <div class="row">
            <div class="prop-case col-md-2"><span class="badge bg-primary"><?php echo $prop['prop_case'] ?></span></div>
        </div>
        <div class="d-flex my-2 align-items-center">
            <i class="fa-solid fa-location-dot mr-1"></i>
            <span class="prop-adress display-6"><?php echo $prop['city'] . " / " . $prop['district'] . " / " . $prop['quarter'] ?></span>
        </div>
    </div>
</div>