@php
    $attribute = rtrim(preg_replace('/\[|\]/', '_', $name), '_');
@endphp

<div class="form-group @if($errors->has($attribute)) has-error @endif">
    <label for="{{$attribute}}" class="control-label">{!! $label !!} {!! $required ? '
        <span style="color: red">*</span>' : '' !!}</label>

    <textarea name="{{$name}}" id="{{$attribute}}" cols="{{$cols}}" rows="{{$rows}}" class="form-control">{!! $value !!}</textarea>
    {!! $errors->first($attribute, '<em for="'. $attribute .'" class="text-danger">:message</em>') !!}
</div>