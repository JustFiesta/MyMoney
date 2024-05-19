<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white rounded-full registerButton welcomeFont uppercase tracking-widest']) }}>
    {{ $slot }}
</button>
