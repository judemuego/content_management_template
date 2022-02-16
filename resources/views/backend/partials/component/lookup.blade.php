
<label>{{$label}} <span class="required">*</span></label>
<div class="input-group mb-3 {{$id}}">
    <input type="text" class="form-control" style="outline:none !important;" aria-label="{{$label}}" aria-describedby="basic-addon1" id="{{$id}}" name="{{$id}}">
    <div class="input-group-prepend">
        <span class="input-group-text bg-primary text-light" id="basic-addon1"  onclick="scion.lookup('{{$title}}', 'lookup', '{{$url}}', {{json_encode($data)}})"><i class="fas fa-search"></i></span>
    </div>
</div>