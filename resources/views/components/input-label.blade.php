@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-lg text-gray-500 dark:text-gray-300 mb-2']) }}>
    {{ $value ?? $slot }}
</label>
