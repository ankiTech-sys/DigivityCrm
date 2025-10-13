<select name="{{ $name ?? 'lead_source_id' }}" id="{{ $id ?? 'clientLeadSource' }}" class="{{ $class ?? 'form-select' }}"
    {{ $required ?? '' }}
    @if (isset($data)) @foreach ($data as $key => $value)
            data-{{ $key }}="{{ $value }}"
        @endforeach @endif>
    <option value="">
        {{ $default ?? 'Select ' . ucfirst(str_replace('_', ' ', $name ?? '')) }}
    </option>

    @foreach (leadSources() as $option)
        @php
            $optionValue = $option['id'] ?? ($option->id ?? '');
            $optionText = $option['lead_source_name'] ?? ($option->name ?? '');

            $optionselected = $selected ?? '';
        @endphp
        <option value="{{ $optionValue }}" {{ $optionValue == $optionselected ? 'selected' : '' }}
            @if ($optionValue == old($name ?? '')) selected @endif>
            {{ $optionText }}
        </option>
    @endforeach
</select>
