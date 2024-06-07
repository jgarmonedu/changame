<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrusel de Productos</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-item {
            display: none;
            transition: 0.6s ease-in-out left;
        }
        .carousel-item.active {
            display: flex !important;
        }
        .carousel-item-next,
        .carousel-item-prev,
        .carousel-item.active {
            display: flex;
        }
        .carousel-inner {
            display: flex;
        }
        .carousel-inner > .carousel-item-next,
        .carousel-inner > .carousel-item-prev {
            display: flex;
        }
    </style>
</head>
<body>

<div id="productCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" id="carousel-inner">
        <?php
        $products = [
            ["name" => "Producto 1", "description" => "Descripción 1"],
            ["name" => "Producto 2", "description" => "Descripción 2"],
            ["name" => "Producto 3", "description" => "Descripción 3"],
            ["name" => "Producto 4", "description" => "Descripción 4"],
            ["name" => "Producto 5", "description" => "Descripción 5"],
            ["name" => "Producto 6", "description" => "Descripción 6"],
            ["name" => "Producto 7", "description" => "Descripción 7"]
        ];

        $activeClass = 'active';
        foreach ($products as $product) {
            echo '<div class="carousel-item ' . $activeClass . '">';
            echo '
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">' . $product['name'] . '</h5>
                            <p class="card-text">' . $product['description'] . '</p>
                        </div>
                    </div>
                </div>
                ';
            echo '</div>';
            $activeClass = '';
        }
        ?>
    </div>
    <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#productCarousel').on('slide.bs.carousel', function (e) {
            let $e = $(e.relatedTarget);
            let idx = $e.index();
            let itemsPerSlide = 3;
            let totalItems = $('.carousel-item').length;

            if (idx >= totalItems - (itemsPerSlide - 1)) {
                let it = itemsPerSlide - (totalItems - idx);
                for (let i = 0; i < it; i++) {
                    // append slides to end
                    if (e.direction == "left") {
                        $('.carousel-item').eq(i).appendTo('.carousel-inner');
                    } else {
                        $('.carousel-item').eq(0).appendTo('.carousel-inner');
                    }
                }
            }
        });

        // Force the display of three items at once
        $('.carousel-item').each(function () {
            let minPerSlide = 3;
            let next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (let i = 1; i < minPerSlide; i++) {
                next = next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }

                next.children(':first-child').clone().appendTo($(this));
            }
        });
    });
</script>
</body>
</html>
