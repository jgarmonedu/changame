<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-4 py-2 min-w-32 border border-transparent rounded-md font-semibold uppercase text-xs text-white bg-blue-950 hover:bg-sky-900 border hover:border-transparent rounded-lg transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
