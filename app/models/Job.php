<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Nuwave\Lighthouse\Support\Traits\RelayConnection;

/**
 * App\models\Job
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\models\Task[] $tasks
 * @property-read \App\models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Job getGraphQLConnection($args)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Job loadGraphQLConnection($args)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Job whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Job whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Job whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Job whereUserId($value)
 * @mixin \Eloquent
 */
class Job extends Model
{
    use RelayConnection;
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = ['title'];
    
        /**
         * The user who created the task.
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function user()
        {
            return $this->belongsTo(User::class);
        }
    
        /**
         * Items that belongs to the task.
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function tasks()
        {
            return $this->hasMany(Task::class);
        }
}
