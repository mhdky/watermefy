<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-blue-500 w-20 h-10 mt-2 text-white text-sm rounded-md']) }}>
    {{ $slot }}
</button>
