<div class="grid lg:grid-cols-1 lg:gap-8 text-start pb-20 ">
    <h2 class="text-xl fond-semibold text-center text-blue-950 pb-8 lg:pb-3">Últimas incorporaciones</h2>
    @if ($products->count())
        <div class="container d-flex justify-content-center align-content-center">
            <div id="carouselLastProducts" class="carousel slide lg:w-screen d-flex flex-column justify-center items-center">
                <div class="carousel-inner"><!--The Carousel Container-->
                    @for ($i = 0; $i < count($products); $i += 3)
                        <div class="carousel-item {{ $i==0 ? 'active' : ' '  }}">
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                @for ($j = $i; $j < $i + 3 && $j < count($products); $j++)
                                <div class="col-md-4">
                                    <x-product-card :product="$products[$j]"/>
                                </div>
                                @endfor
                            </div>
                        </div>
                    @endfor
                </div><!--[End of Container]-->
                @if ($products->count()>=3)
                <div class="absolute top-0">
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselLastProducts" data-bs-slide="next">
                        <i class="fa-solid fa-arrow-right absolute left-4"></i>
                        <span class="carousel-control-next-icon visually-hidden" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselLastProducts" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon visually-hidden" aria-hidden="true"></span>
                        <i class="fa-solid fa-arrow-left absolute right-4"></i>
                        <span class="visually-hidden">Previous</span>
                    </button>
                </div>
                @endif
            </div>
        </div>
        <div class="text-center">
            <h2 class="text-xl text-center text-blue-950 fond-semibold p-4">Consulta más juegos de mesa</h2>
            <a href="/products">
                <x-form.primary-button
                    class="px-5 text-l uppercase outline outline-offset-2 outline-1 outline-blue-950">{{ __('Catalogue') }}</x-form.primary-button>
            </a>
        </div>
    @else
        <div class="flex flex-col items-center ">
            <div class="alert alert-warning w-50 text-center" role="alert">
                Aún no hay productos
            </div>
            <div class="text-center text-blue-950 ">
                <h2 class="text-xl text-center text-blue-950 fond-semibold p-4">¡Sé el primero en ofrecer un
                    producto!</h2>
                <a href="/products/my/new">
                    <x-form.primary-button
                        class="px-5 text-l uppercase outline outline-offset-2 outline-1 outline-blue-950">{{ __('Contribute') }}</x-form.primary-button>
                </a>
            </div>
        </div>
    @endif
</div>


