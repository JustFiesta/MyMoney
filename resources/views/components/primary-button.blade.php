<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 rounded-full loginButton welcomeFont ']) }}>
    {{ $slot }}
</button>
