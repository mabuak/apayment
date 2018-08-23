<div class="form-group @if($errors->has($name)) has-error @endif">
    @if($label != '')
        <label class="control-label" for="{{$name}}">{!! $label !!} {!! $required ? '
        <span style="color: red">*</span>' : '' !!}</label>
    @endif
    <div class="input-group input-group-sm date">
        <input type="text" name="{{$name}}" id="{{$name}}" value="{{$value}}" class="form-control input-sm" placeholder="{!! $label !!} {{$required ? '...*' : ''}}" readonly>
        <label class="input-group-addon input-sm" for="{{$name}}">
            <i class="fa fa-calendar"></i>
        </label>
        {!! $errors->first($name, '<em for="'. $name .'" class="text-danger">:message</em>') !!}
    </div>
</div>