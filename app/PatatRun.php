<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PatatRun extends Model
{
    protected $fillable = [
        'owner_id',
        'deadline',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deadline',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo(User::class); // Perhaps this needs a 'owner_id' as second parameter?
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeActive(Builder $query)
    {
        return $query->where('deadline', '>', Carbon::now());
    }

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeInactive(Builder $query)
    {
        return $query->where('deadline', '<', Carbon::now());
    }
}
