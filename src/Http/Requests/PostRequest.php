<?php

namespace Modules\Post\Http\Requests;

use App\Facades\ValidationCommonHelperFacade;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Post\Models\Post;

class PostRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title'        => ['required'],
            'slug'         => ['nullable','string'],
            'published_at' => ['nullable'],
            'study_time'   => ['nullable', 'integer','min:0']
        ];
    }

    public function messages()
    {
        return [
            'title.required'     => 'لطفا عنوان مقاله را وارد کنید.',
            'study_time.integer' => 'شما فقط مجاز به وارد کردن اعداد هستید.',
            'study_time.min' => 'شما فقط مجاز به وارد کردن اعداد مجاز هستید.'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'slug' => ValidationCommonHelperFacade::prepareSlug(request()->slug, request()->title, Post::class)
        ]);
    }
}
