<?php

namespace App\models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Nuwave\Lighthouse\Support\Traits\RelayConnection;

/**
 * App\models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\models\Job[] $jobs
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\models\Task[] $tasks
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\User getGraphQLConnection($args)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\User loadGraphQLConnection($args)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable, RelayConnection;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Jobs user has created.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
     public function jobs()
     {
         return $this->hasMany(Job::class);
     }
 
     /**
      * Tasks assigned to user.
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
      */
     public function tasks()
     {
         return $this->belongsToMany(Task::class)->withTimestamps();
     }
}
