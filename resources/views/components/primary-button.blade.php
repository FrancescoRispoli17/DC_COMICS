<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-white inline-flex items-center px-4 py-2 mt-3 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest bg-primary']) }}>
    {{ $slot }}
</button>
