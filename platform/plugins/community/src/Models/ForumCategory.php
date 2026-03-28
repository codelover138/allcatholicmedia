<?php

namespace Acm\Community\Models;

use Botble\Base\Models\BaseModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ForumCategory extends BaseModel
{
    protected $table = 'forum_categories';

    protected $fillable = ['name', 'slug', 'description', 'order_column', 'topics_count'];

    protected $casts = ['topics_count' => 'integer'];

    public function topics(): HasMany
    {
        return $this->hasMany(ForumTopic::class, 'category_id');
    }
}
