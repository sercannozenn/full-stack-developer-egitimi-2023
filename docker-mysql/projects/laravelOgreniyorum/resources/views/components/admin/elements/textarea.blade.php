@php
    if (empty($id))
        {
            $id = uniqid('input-');
        }
@endphp
<div class="{{ $parentClasses ?? '' }}">
    @if((isset($isLabelAfter) && !$isLabelAfter) || !isset($isLabelAfter))
        @isset($label)
            <label for="{{ $id }}" class="mb-2 {{ $labelClasses ?? '' }}">{{ $label }}</label>
        @endisset
    @endif
        <textarea
            cols="{{ $cols ?? '30' }}"
            rows="{{ $rows ?? '10' }}"
            id="{{ $id }}"
            class="form-control {{ $inputClasses ?? '' }}"
            placeholder="{{ isset($placeholder) ? $placeholder : ( isset($label) ? $label : '' ) }}"
            {{ isset($isDisabled) && $isDisabled ? "disabled" : "" }}
{{--            style="{{ $style ?? '' }}"--}}
            style="{{ $attributes->offsetGet("style") }}"
        >{{ $defaultValue ?? '' }}</textarea>

        @if(isset($isLabelAfter) && $isLabelAfter)
            @isset($label)
                <label for="{{ $id }}" class="mb-2 {{ $labelClasses ?? '' }}">{{ $label }}</label>
            @endisset
        @endif
</div>
