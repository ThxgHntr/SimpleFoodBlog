@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'px-2 py-1 border-gray-300 focus:border-btncolor-hover rounded-md shadow-sm']) !!}>
