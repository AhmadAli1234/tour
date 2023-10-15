<div class="form-group">
    <label>Wesite Url</label>
    <input type="text" value="{{ $row->website_url ?? '' }}" placeholder="Paste website link here" name="website_url" class="form-control" >
</div>
<h5>OR</h5>
<div class="form-group">
    <textarea name="advertisement" class=" form-control" placeholder="Embed your video code"  cols="30" rows="10" >{{$row->advertisement ??''}}</textarea>
</div>
<h5>OR</h5>
<div class="form-group">
    <label class="control-label">Video</label>
    <div class="">
        <input type="file" name="video" class="form-control" accept="video/*" />
    </div>
</div>