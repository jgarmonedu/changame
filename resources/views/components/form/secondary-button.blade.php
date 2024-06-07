<button {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded-md text-md px-4 p-2.5 text-center text-green-50 border-green-600 border hover:text-green-600 font-semibold  bg-green-600 hover:bg-white focus:ring-1 focus:outline-none focus:ring-white dark:border-green-500 dark:text-green-950 dark:hover:text-green-50 dark:hover:bg-green-500 dark:focus:ring-green-600 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
