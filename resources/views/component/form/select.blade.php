<div class="form-group @if($errors->has($name)) has-error @endif">
    @if($label != '')
        <label for="{{$name}}" class="control-label">{!! $label !!} {!! $required ? '
        <span style="color: red">*</span>' : '' !!}</label>
    @endif

    <select name="{{$name}}@if(isset($multiple))[]@endif" id="{{$name}}" class="form-control input-sm" data-placeholder="{!! $label !!} {{$required ? '...*' : ''}}" @if(isset($multiple)) multiple @endif>
        <option value="{{$value}}" {{ $value ? 'selected="selected"' : ''}}></option>

        @foreach($options as $option)
            @if ($value == $option['id'])
                <option value="{{$option['id']}}" selected="selected">{{$option['name']}}</option>
            @else
                <option value="{{$option['id']}}" @if(isset($option['selected'])) selected="selected" @endif>{{$option['name']}}</option>
            @endif
        @endforeach
    </select>

    {!! $errors->first($name, '<em for="'. $name .'" class="text-danger">:message</em>') !!}
</div>