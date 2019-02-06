<?php


namespace Nahid\Talk\Blacklist;

use Illuminate\Database\Eloquent\Model;

class Blacklist extends Model
{
  protected $table = 'blacklists';
  public $timestamps = true;
  public $fillable = [
      'user_id',
      'blocked_id'
  ];

  public function blocked()
    {
        return $this->belongsTo(config('talk.user.model', 'App\User'),  'blocked_id');
    }

  public function user()
    {
        return $this->belongsTo(config('talk.user.model', 'App\User'));
    }

}
