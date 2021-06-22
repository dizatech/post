<?php

namespace Modules\Post\Models;

use App\Models\User;
use App\Services\Traits\Categorizable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Plank\Mediable\Mediable;

class Post extends Model
{
    use HasFactory, SoftDeletes, Mediable, Categorizable;
    protected $fillable = ['title', 'sub_title', 'post_type','publish_status', 'creator_id', 'study_time', 'lead', 'description'];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function getPostTypeLabelAttribute(){
        switch( $this->post_type ){
            case 'news':
                $label = 'خبر';
                break;
            case 'video':
                $label = 'ویدیو';
                break;
            case 'article':
                $label = 'مقاله';
                break;
            default:
                $label = 'نامشخص';
                break;
        }

        return $label;
    }

    public function getPostTypePluralLabelAttribute(){
        switch( $this->post_type ){
            default:
                $label = $this->post_type_label . "‌ها";
                break;
        }

        return $label;
    }
    public function getPublishStatusLabelAttribute()
    {
        switch ($this->publish_status) {

            case 'draft':
                $label = ' پیش‌نویس';
                break;
            case 'published':
                $label = ' منتشر شده';
                break;
            case 'private':
                $label = 'خصوصی';
                break;

            default:
                $label = 'نامشخص';
        }
        return $label;
    }
}
