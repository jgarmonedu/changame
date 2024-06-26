<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contribute') }}
        </h2>
    </x-slot>
    <form method="POST" action="/my/products/" enctype="multipart/form-data">
        @csrf

        <div class="shadow border-b border-gray-200 sm:rounded-lg p-4 w-3/4 m-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <!-- Name -->
                <div class="mt-2">
                    <x-form.input-label for="name" :value="__('Name').'*'"/>
                    <x-form.text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                       required
                                       autofocus autocomplete="name"/>
                    <x-form.input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>

                <!-- category -->
                <div class="mt-2">
                    <x-form.input-label for="category" :value="__('Category').'*'"/>
                        <select name="category_id" id="category" class="w-full rounded mt-1.5 border-gray-300 focus:border-green-600 focus:ring-green-600 rounded-md shadow-sm"  required>
                            @foreach (\App\Models\Category::all() as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                                >{{ ucwords($category->name) }}</option>
                            @endforeach
                        </select>
                    <x-form.input-error :messages="$errors->get('category')" class="mt-2"/>
                </div>

                <!-- Description -->
                <div class="mt-2 lg:col-span-2">
                    <x-form.input-label for="description" :value="__('Description')"/>
                    <x-form.text-textarea id="description" class="block mt-1 w-full" name="description"
                                          :value="old('description')"
                                          required autocomplete="description"/>
                    <x-form.input-error :messages="$errors->get('description')" class="mt-2"/>
                </div>

                <!-- Count from -->
                <div class="mt-2">
                    <x-form.input-label for="player_count_from" :value="__('Player from').'*'"/>
                    <x-form.text-input id="player_count_from" class="block mt-1 w-full" type="number" min="1"
                                       name="player_count_from" :value="old('player_count_from')" required
                                       autofocus autocomplete="player_count_from"/>
                    <x-form.input-error :messages="$errors->get('player_count_from')" class="mt-2"/>
                </div>

                <!-- Count to -->
                <div class="mt-2">
                    <x-form.input-label for="player_count_to" :value="__('Player to').'*'"/>
                    <x-form.text-input id="player_count_to" class="block mt-1 w-full" type="number" min="1"
                                       name="player_count_to" :value="old('player_count_to')" required
                                       autofocus autocomplete="player_count_to"/>
                    <x-form.input-error :messages="$errors->get('player_count_to')" class="mt-2"/>
                </div>

                <!-- From age -->
                <div class="mt-2">
                    <x-form.input-label for="from_age" :value="__('Player age').'*'"/>
                    <x-form.text-input id="from_age" class="block mt-1 w-full" type="number" min="0" max="99"
                                       name="from_age" :value="old('from_age')" required
                                       autofocus autocomplete="from_age"/>
                    <x-form.input-error :messages="$errors->get('from_age')" class="mt-2"/>
                </div>

                <!-- Play time -->
                <div class="mt-2">
                    <x-form.input-label for="play_time" :value="__('Play time')"/>
                    <x-form.text-input id="play_time" class="block mt-1 w-full" type="number" min="1"
                                       name="play_time" :value="old('play_time')"
                                       autofocus autocomplete="play_time"/>
                    <x-form.input-error :messages="$errors->get('play_time')" class="mt-2"/>
                </div>

                <!-- Year -->
                <div class="mt-2">
                    <x-form.input-label for="release_year" :value="__('Year')"/>
                    <x-form.text-input id="release_year" class="block mt-1 w-full" type="number"  min="1950"
                                       name="release_year" :value="old('release_year')"
                                       autofocus autocomplete="release_year"/>
                    <x-form.input-error :messages="$errors->get('release_year')" class="mt-2"/>
                </div>

                <!-- Difficulty -->
                <div class="mt-2">
                    <x-form.input-label for="difficulty" :value="__('Difficulties')['name'].'*'"/>
                    <select name="difficulty" id="difficulty" class="w-full rounded mt-1.5 border-gray-300 focus:border-green-600 focus:ring-green-600 rounded-md shadow-sm"  required>
                        @foreach (\App\Enums\Difficulty::cases() as $difficulty)
                            <option
                                value="{{ $difficulty->value }}"
                                {{ old('difficulty') == $difficulty->value ? 'selected' : '' }}
                            >{{ __('Difficulties')['types'][ucwords($difficulty->name)] }}</option>
                        @endforeach
                    </select>
                    <x-form.input-error :messages="$errors->get('difficulty')" class="mt-2"/>
                </div>

                <!-- Condition -->
                <div class="mt-2">
                    <x-form.input-label for="condition" :value="__('Conditions')['name'].'*'"/>
                    <select name="condition" id="condition" class="w-full rounded mt-1.5 border-gray-300 focus:border-green-600 focus:ring-green-600 rounded-md shadow-sm"  required>
                        @foreach (\App\Enums\Condition::cases() as $condition)
                            <option
                                value="{{ $condition->value }}"
                                {{ old('condition') == $condition->value ? 'selected' : '' }}
                            >{{ __('Conditions')['types'][ucwords($condition->name)] }}</option>
                        @endforeach
                    </select>
                    <x-form.input-error :messages="$errors->get('conditions')" class="mt-2"/>
                </div>

                <!-- Language -->
                <div class="mt-2">
                    <x-form.input-label for="language" :value="__('Languages')['name'].'*'"/>
                    <select name="language" id="language" class="w-full rounded mt-1.5 border-gray-300 focus:border-green-600 focus:ring-green-600 rounded-md shadow-sm"  required>
                        @foreach (\App\Enums\Language::cases() as $language)
                            <option
                                value="{{ $language->value }}"
                                {{ old('language') == $language->value ? 'selected' : '' }}
                            >{{ __('Languages')['types'][ucwords($language->name)] }}</option>
                        @endforeach
                    </select>
                    <x-form.input-error :messages="$errors->get('language')" class="mt-2"/>
                </div>

                <!-- Thumbnail -->
                <div class="mt-2 lg:col-span-2">
                    <x-form.input-label for="thumbnail" :value="__('Image')"/>
                    <x-form.text-input id="thumbnail"
                                       type="file"
                                       name="thumbnail[]"
                                       autocomplete="thumbnail" multiple/>
                    <x-form.input-error :messages="$errors->get('thumbnail')" class="mt-2"/>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-center mt-4">
            <a href="{{ route('my.products') }}">
                <x-form.danger-button class="ms-4" type="button">
                    {{  __('Cancel') }}
                </x-form.danger-button>
            </a>
            <x-form.default-button class="ms-4">
                {{ __('Create') }}
            </x-form.default-button>
        </div>
    </form>
</x-app-layout>
