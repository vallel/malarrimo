<?php

namespace Malarrimo\Entities;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class News extends \Eloquent
{
    use SoftDeletingTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

    /**
     * @var array
     */
    protected $fillable = array('title', 'content', 'language', 'keywords', 'user_id', 'image');

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = $value ? 'Publicado' : 'Borrador';
    }

    public function getStatusAttribute()
    {
        return $this->attributes['status'] == 'Publicado' ? 1 : 0;
    }

    public function user()
    {
        return $this->belongsTo('Malarrimo\Entities\User');
    }

} 