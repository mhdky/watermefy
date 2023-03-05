@props(['value'])

<label {{ $attributes->merge(['class' => 'text-sm text-slate-600 block']) }}>
    {{ $value ?? $slot }}
</label>
