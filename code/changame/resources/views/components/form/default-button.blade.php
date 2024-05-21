<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center font-semibold text-sm px-3 py-2.5 text-blue-950 hover:text-white hover:bg-blue-950 border hover:border-transparent rounded-lg transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
