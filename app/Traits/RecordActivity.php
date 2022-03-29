<?php


namespace App\Traits;

use App\Events\ActivityLogged;
use App\Activity;
use App\Models\Follow;
use App\Models\LogFollows;
use ReflectionClass;

trait RecordActivity
{
    /**
     * Register the necessary event listeners.
     *
     * @return void
     */
    protected static function bootRecordActivity()
    {
        foreach (static::getModelEvents() as $event) {
            static::$event(function ($model) use ($event) {
                $model->recordActivity($event);
            });
        }
    }

    /**
     * Record activity for the model.
     *
     * @param  string $event
     * @return void
     */
    public function recordActivity($event)
    {
        $activity = new Activity();

        $activity->fill(
            [
                'subject_id' => $this->getKey(),
                'subject_type' => get_class($this),
                'name' => $this->getActivityName($this, $event),
                'user_id' => $this->fidUser
            ]
        );

        $activity->save();

        event(new ActivityLogged($activity));
        $followers = LogFollows::select('fidUser')->where('FollowingUser',$activity->user_id)->get();
        foreach ($followers as $follower){
            event(new ActivityLogged($activity,$follower->fidUser));
        }
    }


    protected function getActivityName($model, $action)
    {
        $name = strtolower((new ReflectionClass($model))->getShortName());

        return "{$action}_{$name}";
    }

    /**
     * Get the model events to record activity for.
     *
     * @return array
     */
    protected static function getModelEvents()
    {
        if (isset(static::$recordEvents)) {
            return static::$recordEvents;
        }

        return [
            'created'
        ];
    }
}
