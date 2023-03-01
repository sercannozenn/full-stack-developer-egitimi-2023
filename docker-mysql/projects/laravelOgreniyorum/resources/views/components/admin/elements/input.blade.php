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

    @switch($type)
        @case('text')
            @php($class ='form-control' )
        @break
    @endswitch

    <input
        type="{{ $type ?? 'text' }}"
        name="{{ $name ?? '' }}"
        id="{{ $id }}"
{{--        class="{{ $type != 'submit' && $type != 'button' && $type != 'checkbox' ? 'form-control' : '' }} {{ $inputClasses ?? '' }}"--}}
        class="{{ $class }} {{ $inputClasses ?? '' }}"
        placeholder="{{ isset($placeholder) ? $placeholder : ( isset($label) ? $label : '' ) }}"
        value="{{ $defaultValue ?? '' }}"
        {{ isset($isDisabled) && $isDisabled ? "disabled" : "" }}>

        @if(isset($isLabelAfter) && $isLabelAfter)
            @isset($label)
                <label for="{{ $id }}" class="mb-2 {{ $labelClasses ?? '' }}">{{ $label }}</label>
            @endisset
        @endif
</div>
