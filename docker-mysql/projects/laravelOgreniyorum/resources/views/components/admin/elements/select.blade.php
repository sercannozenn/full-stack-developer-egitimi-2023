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
        <select
            name="{{ $name ?? '' }}"
            id="{{ $id }}"
            class="form-control {{ $inputClasses ?? '' }}"
            {{ isset($isDisabled) && $isDisabled ? "disabled" : "" }} >
            @foreach($options as $key => $value)
                <option {{ isset($defaultValue) && $defaultValue==$key ? "selected" : "" }} value="{{ $key }}">{{ $value }}</option>
            @endforeach

        </select>

        @if(isset($isLabelAfter) && $isLabelAfter)
            @isset($label)
                <label for="{{ $id }}" class="mb-2 {{ $labelClasses ?? '' }}">{{ $label }}</label>
            @endisset
        @endif
</div>
