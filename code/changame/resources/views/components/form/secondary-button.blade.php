<button {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded-lg text-md px-4 p-2.5 m-2 text-center hover:text-blue-950 border border-green-600 bg-green-600 hover:bg-white focus:ring-1 focus:outline-none focus:ring-white dark:border-green-500 dark:text-blue-950 dark:hover:text-white dark:hover:bg-green-500 dark:focus:ring-green-600 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
