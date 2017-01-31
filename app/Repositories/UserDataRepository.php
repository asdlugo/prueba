<?php

namespace App\Repositories;

use App\Models\UserData;
use InfyOm\Generator\Common\BaseRepository;

class UserDataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'document_type',
        'id_number',
        'name',
        'birthdate',
        'phone_number',
        'direction'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserData::class;
    }
}
