

@aware(['color' => 'blue'])

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-'.$color.'-300 border border-transparent rounded-md font-semibold text-xs text-blue uppercase tracking-widest hover:bg-'.$color.'-200 active:bg-'.$color.'-900 focus:outline-none focus:border-'.$color.'-900 focus:ring ring-'.$color.'-300 disabled:opacity-25 transition ease-in-out duration-150 mt-3']) }}>
    {{ $slot }}
</button>
