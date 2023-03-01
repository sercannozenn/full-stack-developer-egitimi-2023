{{--<input type="{{ $type ?? 'text' }}" placeholder="{{ $placeholder ?? '' }}"--}}
{{--    {{ $attributes->merge(['class' => $attributes['class'] . $color]) }}--}}
{{-->--}}


<input type="{{ $type ?? 'text' }}" placeholder="{{ $placeholder ?? '' }}"
{{ $attributes->class(['bg-success' => $error, "text-white" => $error]) }}
>
