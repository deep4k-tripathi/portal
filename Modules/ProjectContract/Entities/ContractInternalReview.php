<?php

namespace Modules\ProjectContract\Entities;

use Illuminate\Database\Eloquent\Model;

class ContractInternalReview extends Model
{
    protected $table = 'contract_internal_reviewer';

    protected $fillable = [
        'contract_id',
        'name',
        'email',
        'user_id'
    ];

    public function contractReviews()
    {
        return $this->morphMany(ContractReview::class, 'comment');
    }
}