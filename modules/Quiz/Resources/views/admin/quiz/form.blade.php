<div class="form-group">
    <label>Question</label>
    <input type="text" value="{{ $row->question ?? '' }}" placeholder="Quiz title" name="question" class="form-control" required>
</div>
<div class="form-group">
    <label class="control-label">Answer</label>
    <div class="">
        <textarea name="answer" class="d-none has-ckeditor" cols="30" rows="10">{{$row->answer}}</textarea>
    </div>
</div>
 