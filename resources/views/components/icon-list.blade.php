<div class="flex-inline gap-2">
    <i class="fa-solid fa-clock-rotate-left"></i><span class="px-2">{{$product->play_time}}min</span>
    <i class="fa-solid fa-users"></i><span class="px-2">{{$product->player_count_from}}-{{$product->player_count_to}}</span>
    <i class="fa-solid fa-person-circle-plus"></i><span class="px-2">{{$product->from_age}}+</span>
    <i class="fa-solid fa-globe"></i><span class="px-2">{{$product->language}}</span>
    <i class="fa-solid fa-arrow-up-wide-short"></i><span class="px-2">{{ __('Difficulties')['types'][ucwords(\App\Enums\Difficulty::from($product->difficulty)->name)] }}</span>
    <i class="fa-solid fa-thumbs-up"></i><span class="px-2">{{ __('Conditions')['types'][ucwords(\App\Enums\Condition::from($product->condition)->name)] }}</span>
    <i class="fa-solid fa-calendar-check"></i><span class="px-2">{{$product->release_year}}</span>
</div>
