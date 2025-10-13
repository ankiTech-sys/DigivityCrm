<select name="{{ $name ?? 'erp_company' }}" id="{{ $id ?? 'erpCompany' }}" class="{{ $class ?? 'form-select' }}"
    {{ $required ?? '' }}
    @if (isset($data)) @foreach ($data as $key => $value)
            data-{{ $key }}="{{ $value }}"
        @endforeach @endif>
    <option value="">
        {{ $default ?? 'Select ' . ucfirst(str_replace('_', ' ', $name ?? '')) }}
    </option>

    @foreach (leadStatus() as $option)
        @php
            $optionValue = $option['id'] ?? ($option->id ?? '');
            $optionText = $option['name'] ?? ($option->name ?? '');
            $optionSlug = $option['slug'] ?? ($option->slug ?? null);
            $optionselected = $selected ?? '';
        @endphp
        <option value="{{ $optionValue }}" {{ $optionValue == $optionselected ? 'selected' : '' }}
            @if ($optionValue == old($name ?? '')) selected @endif
            @if ($optionSlug) data-slug="{{ $optionSlug }}" @endif>
            {{ $optionText }}
        </option>
    @endforeach
</select>
