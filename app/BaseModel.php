<?php


namespace App;


use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticates;

class BaseModel extends Authenticates {

    public $incrementing = false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'created_by_id', 'last_modified_by_id', 'created_at', 'updated_at'
    ];

    protected static function boot(){
        parent::boot();
        static::creating(function ($model) {
            if ($model->id != null) {
                $model->setAttribute('last_modified_by_id', $model->id);
                $model->setAttribute('last_modified_at', Carbon::now());
            } else {
                $model->setAttribute($model->getKeyName(), Str::uuid());
                $model->setAttribute('created_by_id', $model->id);
                $model->setAttribute('created_at', Carbon::now());
            }
        });
    }
}
