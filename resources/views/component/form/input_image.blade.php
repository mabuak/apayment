<div class="fileupload {{$value ? 'fileupload-exists' : 'fileupload-new'}} " data-provides="fileupload">
    <div class="fileupload-preview thumbnail mb20">
        @if($value)
            <img src="{{url('storage/' . $value)}}" alt="holder">
        @else
            <img data-src="holder.js/100%x145" alt="holder">
        @endif
    </div>
    <div class="row">
        <div class="col-xs-12">
        <span class="btn btn-system btn-file btn-block">
            <span class="fileupload-new btn-block">Select</span>
            <span class="fileupload-exists">Change</span>
            <input type="file" name="image_upload">
        </span>
        </div>
    </div>
</div>