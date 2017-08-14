<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Nuwave\Lighthouse\Support\Traits\RelayConnection;

/**
 * App\models\Task
 *
 * @property int $id
 * @property int $job_id
 * @property int|null $completed_by
 * @property string $title
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\models\User $completedBy
 * @property-read \App\models\Job $job
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\models\User[] $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Task getGraphQLConnection($args)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Task loadGraphQLConnection($args)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Task whereCompletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Task whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Task whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Task whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Task extends Model
{
    use RelayConnection;
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = ['title'];
    
        /**
         * The task the item belongs to.
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function job()
        {
            return $this->belongsTo(Job::class);
        }
    
        /**
         * User who completed the item.
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function completedBy()
        {
            return $this->belongsTo(User::class);
        }
    
        /**
         * Users assigned to the item.
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
         */
        public function users()
        {
            return $this->belongsToMany(User::class);
        }
}
