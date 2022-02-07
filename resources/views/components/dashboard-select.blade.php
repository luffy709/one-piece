<select class="dashboard-select" name="{{ $name }}" id="{{ $name }}">
    @foreach($options as $option)
        <option class="dashboard-select__option" value="{{ $option }}" @if($current->name === $option) selected @endif>{{ ucfirst($option) }}</option>
    @endforeach
</select>
