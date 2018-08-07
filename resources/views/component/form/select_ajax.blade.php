<div class="form-group @if($errors->has($name)) has-error @endif">
    @if($label != '')
        <label for="{{$name}}" class="control-label">{!! $label !!} {!! $required ? '
        <span style="color: red">*</span>' : '' !!}</label>
    @endif

    <select name="{{$name}}" id="{{$name}}" class="form-control input-sm" data-placeholder="{!! $label !!} {{$required ? '...*' : ''}}" @if(isset($disable)) disabled @endif>
        <option value=""></option>
    </select>

    {!! $errors->first($name, '<em for="'. $name .'" class="text-danger">:message</em>') !!}
</div>

