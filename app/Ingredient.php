<?php


namespace App;


class Ingredient extends BaseModel
{
    protected $table = 'ingredient';
    protected $fillable = [
        'name', 'amount', 'unit', 'user_id'
    ];
}
