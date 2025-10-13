<select 
    name="{{ $name ?? 'client_status' }}" 
    id="{{ $id ?? 'clientLeadStatus' }}" 
class="{{ $class ?? 'form-select' }}" 
    {{ $required ?? '' }}
    @if(isset($data))
        @foreach($data as $key => $value)
            data-{{ $key }}="{{ $value }}"
        @endforeach
    @endif
>
    <option value="">
        {{ $default ?? 'Select ' . ucfirst(str_replace('_', ' ', $name ?? '')) }}
    </option>

    @foreach(clientTypes() as $option)
        @php
            $optionValue = $option['id'] ?? $option->id ?? '';
            $optionText  = $option['client_type'] ?? $option->client_type ?? '';
            $optionSlug  = $option['slug'] ?? $option->slug ?? null;
        @endphp
        <option 
            value="{{ $optionValue }}" 
            @if($optionValue == old($name ?? '')) selected @endif
            @if($optionSlug) data-slug="{{ $optionSlug }}" @endif
        >
            {{ $optionText }}
        </option>
    @endforeach
</select>
