<input type="hidden" name="post_type_category" value="{{ $postCategory->post_type }}">
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="text-danger">*</label>
            <label for="title"><strong>عنوان</strong></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"
                   value="{{old('title', $postCategory->title)}}" name="title" id="title">

            @error('title')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="slug"><strong>url</strong></label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug', $postCategory->slug)}}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group has-primary">
            <label for="parent_id"><strong>والد
                </strong></label>
            <select name="parent_id" class="form-control select2 @error('parent_id') is-invalid @enderror">
                <option value="0">--</option>
                <x-category-options page="edit" type="{{$categoryType}}" parent="{{$postCategory->parent_id }}"
                                    category="{{$postCategory->id}}"></x-category-options>
            </select>

            @error('parent_id')
            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
            @enderror
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <label class="text-danger">*</label>
        <label for="description"><strong>توضیحات</strong></label>
        <textarea name="description"
                  class="form-control tinymce @error('description') is-invalid @enderror"
                  id="description" cols="30" rows="10">{!! old('description', $postCategory->description) !!}</textarea>
        @error('description')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

</div>
<div class="py-3">
    <button class="btn btn-success" type="submit">ثبت</button>
</div>
