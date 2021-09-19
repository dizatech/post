<input type="hidden" name="post_type" value="{{ $post->post_type }}">
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label class="text-danger">*</label>
            <label for="title"><strong>عنوان</strong></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"
                   value="{{ old('title', $post->title) }}"
                   name="title" id="title">

            @error('title')
            <span class="invalid-feedback"> <strong>{{$message}}</strong></span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="sub_title"><strong>زیر‌عنوان</strong></label>
            <input type="text" class="form-control" id="sub_title" name="sub_title"
                   value="{{old('sub_title', $post->sub_title)}}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="slug"><strong>url</strong></label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug', $post->slug)}}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="study_time"><strong>زمان مطالعه</strong></label>
            <div class="input-group">
                <input type="text" class="form-control @error('study_time') is-invalid @enderror" name="study_time"
                       id="study_time"
                       value="{{old('study_time', $post->study_time)}}">
                <div class="input-group-prepend">
                    <div class="input-group-text">دقیقه</div>
                </div>
                @error('study_time')
                <span class="invalid-feedback"><strong>{{$message}}</strong></span>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="creator_id"><strong>نویسنده</strong></label>
            <select type="text" class="form-control select2" id="creator_id" name="creator_id"
                    value="">
                <option value="">انتخاب کنید</option>

                @foreach($users as $user)
                    <option value="{{$user->id}}"
                            @if(old('creator_id', (isset($post->creator) ? "{$post->creator->id}" : '')  )== $user->id) selected="selected" @endif>
                        {{(isset($user->full_name) ? "{$user->full_name}" : '')}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="published_at"><strong>تاریخ انتشار</strong></label>
            <div class="input-group datepicker" data-has-time>
                <input type="hidden" class="dp_date" id="publish_date_post_dp_date"
                       name="publish_date" value="{{ old('publish_date', $post->published_at) }}">
                <input type="text"
                       class="form-control dp_text @error('publish_date_post_dp_text') is-invalid @enderror"
                       value="{{ old('publish_date', $post->published_at) }}"
                       id="publish_date_post_dp_text" dir="ltr">
                <div class="input-group-prepend">
                    <span class="input-group-text cursor-pointer dp_handle"
                          id="publish_date_post_date_dp"><i class="fa fa-calendar"></i>
                    </span>
                </div>
                <span class="invalid-feedback d-none" role="alert">
                    <strong></strong>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group has-primary">
            <label for="publish_status"><strong>وضعیت انتشار</strong></label>
            <select name="publish_status" id="publish_status"
                    class="form-control select2 @error('publish_status') is-invalid @enderror">

                <option
                        value="draft" {{old('publish_status', $post->publish_status) == 'draft' ? 'selected' : ''}}>
                    پیش‌نویس
                </option>
                <option
                        value="published" {{old('publish_status', $post->publish_status) == 'published' ? 'selected' : ''}}>
                    منتشر شده
                </option>
                <option
                        value="private" {{old('publish_status', $post->publish_status) == 'private' ? 'selected' : ''}}>
                    خصوصی
                </option>
            </select>

            @error('publish_status')
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <x-attachment type="image"
                      multiple="false"
                      page="edit"
                      name="featured_image"
                      label="تصویر شاخص"
                      tooltip-title="حداقل عرض ۷۰۰ پیکسل، حداقل ارتفاع ۴۰۰ پیکسل و نسبت عرض به ارتفاع ۱.۶۵ باشد. بعنوان مثال، عرض ۷۲۶ پیکسل و ارتفاع ۴۴۰ پیکسل."
                      data="{{ $post->getMedia('featured_image')->pluck('id') }}"
                      validation="['mimes:png,jpg,jpeg', 'dimensions:ratio=1.65,min_width=700,min_height=400']"
        >
        </x-attachment>
    </div>
</div>
<div class="row">
    <div class="row">
        <div class="col-md-12">
            <x-attachment
                type="video"
                multiple="true"
                page="edit"
                name="video"
                label="ویدیوها"
                data="{{ $post->getMedia('video')->pluck('id') }}">
            </x-attachment>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="category"><strong>دسته‌بندی</strong></label>
            <div class="border overflow-auto p-2" style="max-height: 155px">
                <x-category-checkboxes type="{{ $post->post_type }}Category" page="edit" checked="{{ $post->categories->pluck('id') }}"></x-category-checkboxes>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="lead"><strong>چکیده</strong></label>
            <textarea name="lead" id="" cols="30" rows="10"
                      class="form-control tinymce full">{{old('lead', $post->lead)}}</textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="description"><strong>متن</strong></label>
            <textarea name="description" id="description" cols="30" rows="10"
                      class="form-control tinymce full">{{old('description', $post->description)}}</textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="meta_title"><strong>عنوان سئو</strong></label>
            <input type="text" id="meta_title" name="meta_title"
                class="form-control"
                value="{{old('meta_title', $post->meta_title)}}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="meta_description"><strong>توضیحات سئو</strong></label>
            <textarea id="meta_description" name="meta_description"
                class="form-control">{{old('meta_description', $post->meta_description)}}</textarea>
        </div>
    </div>
</div>

<div class="py-3">
    <button type="submit" class="btn btn-success">ثبت</button>
</div>
