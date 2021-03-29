<?php


namespace App;


class Recipe extends BaseModel
{
    protected $table = 'recipe';
    protected $fillable = [
        'title', 'ingredients', 'cook_time', 'is_private', 'img_src', 'cook_time_type', 'user_id', 'source', 'instructions'
    ];
}
