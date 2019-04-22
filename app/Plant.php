<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class Plant extends Model
{


    protected  $fillable = ['owner_id', 'title', 'description', 'filename'];

    /**
     * Rate the plant.
     *
     * @param int       $rating
     * @param User|null $user
     */
    public function rate($rating, $user = null)
    {
        if ($rating > 5 || $rating < 1) {
            throw new InvalidArgumentException('Ratings must be between 1-5.');
        }
        $userId = $user ? $user->id : auth()->id();
        $this->ratings()->updateOrCreate(['user_id' => $userId], compact('rating'));
    }

    /**
     * Fetch the average rating for the article.
     *
     * @return int
     */
    public function rating()
    {
        return $this->ratings()->avg('rating');
    }

    /**
     * Fetch the rating for the given user.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function ratingFor(User $user)
    {
        return $this->ratings()->where('user_id', $user->id)->value('rating');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
