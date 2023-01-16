<label for="{{$field}}">{{$label}}</label>
<textarea name="{{$field}}"
          id="{{$field}}"
          class="form-control"
          cols="20" rows="5" placeholder="{{$placeholder}}">{{old($field,$value)}}</textarea>
@error("$field")
<span class="text-danger">{{$message}}</span>
@enderror
