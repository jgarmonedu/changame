<div class="grid lg:grid-cols-1 lg:gap-8 text-start pb-10 justify-content-center">
    <h2 class="text-xl fond-semibold ms-32 text-blue-950 pb-3">Nuestros objetivos</h2>
    <div class="grid gap-6 justify-items-center place-content-center lg:grid-cols-2 lg:gap-8 lg:ps-10">
        <div class="lg:ms-24">
            <div id="carouselObjetives" class="carousel slide bg-blue-950"
                 style="height: 380px; width: 500px;" data-bs-ride="carousel">
                <div class="carousel-indicators text-blue-950">
                    @foreach ($goals as $key=>$goal)
                        @if($key==0)
                            <button type="button" data-bs-target="#carouselObjetives" data-bs-slide-to="{{ $key }}"
                                    class="active" aria-current="true" aria-label="Slide {{ $key }}"></button>
                        @else
                            <button type="button" data-bs-target="#carouselObjetives" data-bs-slide-to="{{ $key }}"
                                    aria-current="true" aria-label="Slide {{ $key }}"></button>
                        @endif
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($goals as $key=>$goal)
                        @if($key==0)
                            <div class="carousel-item active text-center p-4 text-white">
                                <h2 class="text-3xl pt-10 pb-4">{{ $goal->title }}</h2>
                                <p class="pb-12">{{ $goal->description }}</p>
                            </div>
                        @else
                            <div class="carousel-item text-center p-4 text-white">
                                <h2 class="text-3xl pt-10 pb-4">{{ $goal->title }}</h2>
                                <p class="pb-12">{{ $goal->description }}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="w-4/6 lg:me-24">
            <img src="/images/banner-1.png" alt="objetivos">
        </div>
    </div>
</div>
