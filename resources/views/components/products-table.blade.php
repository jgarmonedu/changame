<div class="flex flex-col py-6">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 table-auto">
                    <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('Contribution') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('Campaign') }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('Status') }}
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-blue-950">
                    @foreach ($products as $product)
                        <tr class="odd:bg-white even:bg-slate-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-400">
                                        <a href="/products/{{ $product->id }}" class="text-gray-900">
                                            {{ $product->name }}
                                        </a>
                                        <div>
                                            {{ $product->category->name}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="text-sm font-medium text-gray-400">
                                        <a href="" class="text-gray-900 italic">
                                            "{{ $campaigns->find($product->campaign)->name }}"
                                        </a>
                                        <div>
                                            {{ __('Campaign ends') .' '. \Carbon\Carbon::parse($campaigns->find($product->campaign)->date_to)->diffForHumans(['parts' => 2, 'join' => ', ']) }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div>
                                    @if($campaigns->find($product->campaign)->campaignActive())
                                        <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-2 text-xs font-semibold text-green-700">
                                            {{ __('Active')}}
                                            </span>
                                    @else
                                        <span class="inline-flex items-center rounded-full bg-red-100 px-3 py-2 text-xs font-semibold text-red-700">
                                            {{ __('Inactive')}}
                                            </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
