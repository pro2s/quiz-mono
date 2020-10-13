<?php

namespace Quiz\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quiz extends Model
{
    use HasTranslations;

    public $incrementing = false;

    public $keyType = 'string';

    public $translatable = ['name', 'description'];

    protected $casts = [
        'active' => 'integer',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'created_at', 'updated_at'
    ];

    protected $fillable = [
        'name', 'slug', 'image', 'description', 'active' ,'started_at', 'ended_at'
    ];

    protected $appends = ['is_finished', 'question'];

    const SLUG_LENGTH = 5;

    public function users()
    {
        return $this->belongsToMany(User::class)->using(UserQuiz::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class)->withTimestamps();
    }

    public function createSlug($lenght = self::SLUG_LENGTH)
    {
        return bin2hex(random_bytes($lenght));
    }

    public function getIsFinishedAttribute()
    {
        return $this->attributes['finished'] = false;
    }

    public function getQuestionAttribute()
    {
        return $this->attributes['question'] = $this->questions[0] ?? false;
    }
}
