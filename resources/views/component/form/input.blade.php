@php
    $attribute = rtrim(preg_replace('/\[|\]/', '_', $name), '_');
@endphp

<div class="form-group @if($errors->has($attribute)) has-error @endif">

    @if($label != '')
        <label for="{{$attribute}}" class="control-label">{!! $label !!} {!! $required ? '
        <span style="color: red">*</span>' : '' !!}</label>
    @endif

    <input type="text" name="{{$name}}" id="{{$attribute}}" value="{{$value}}" class="form-control input-sm" placeholder="{!! $label !!} {{$required ? '...*' : ''}}" @if(isset($readonly)) readonly @endif>
    {!! $errors->first($attribute, '<em for="'. $attribute .'" class="text-danger">:message</em>') !!}
</div>