<div class="form-group">
    <label>Name</label>
    <input type="text" value="{{ $row->name ?? '' }}" placeholder="Interest Name" name="name" class="form-control" required>
</div>
<div class="form-group">
    <label class="control-label">Image</label>
    <div class="">
        <input type="file" name="image" class="form-control" />
    </div>
</div>
 