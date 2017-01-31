<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UserData
 * @package App\Models
 * @version January 31, 2017, 6:08 pm UTC
 */
class UserData extends Model
{
    use SoftDeletes;

    public $table = 'user_datas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'document_type',
        'id_number',
        'name',
        'birthdate',
        'phone_number',
        'direction'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'id' => 'integer',
        'document_type' => 'string',
        'id_number' => 'string',
        'name' => 'string',
        'birthdate' => 'date',
        'phone_number' => 'string',
        'direction' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
