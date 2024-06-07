@props(['products'])
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 table-auto">
                    <tbody class="bg-white divide-y divide-gray-200 text-blue-950">
                    @foreach ($products as $product)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-900">
                                        <a href="/products/{{ $product->id }}">
                                            {{ $product->name }}
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-700">
                                     {{ $product->category->name}}
                                </span>
                            </td>
                            <td class="px-6 py-4 hidden md:table-cell">
                                <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-yellow-600">
                                     {{ $product->created_at }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm max-lg:hidden">
                                <div class="flex-inline gap-2">
                                    <i class="fa-solid fa-clock-rotate-left"></i><span class="px-2">{{$product->play_time}}min</span>
                                    <i class="fa-solid fa-users"></i><span class="px-2">{{$product->player_count_from}}-{{$product->player_count_to}}</span>
                                    <i class="fa-solid fa-person-circle-plus"></i><span class="px-2">{{$product->from_age}}+</span>
                                    <i class="fa-solid fa-globe"></i><span class="px-2">{{$product->language}}</span>
                                    <i class="fa-solid fa-arrow-up-wide-short"></i><span class="px-2">{{ __('Difficulties')['types'][ucwords(\App\Enums\Difficulty::from($product->difficulty)->name)] }}</span>
                                    <i class="fa-solid fa-thumbs-up"></i><span class="px-2">{{ __('Conditions')['types'][ucwords(\App\Enums\Condition::from($product->condition)->name)] }}</span>
                                    <i class="fa-solid fa-calendar-check"></i><span class="px-2">{{$product->release_year}}</span>å
                                </div>
                            </td>
                            <td class="flex flex-inline gap-4 px-6  py-4 whitespace-nowrap text-right text-sm font-medium">
                                <form method="post" action="/my/product/{{ $product->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500" title="{{__('Delete')}}"><i class="fa-regular fa-lg fa-trash-can"></i></button>
                                </form>
                                <a href="/my/product/{{ $product->id }}/edit" class="text-blue-950 hover:text-navy-900" title="{{__('Edit')}}"><i class="fa-regular fa-lg fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
