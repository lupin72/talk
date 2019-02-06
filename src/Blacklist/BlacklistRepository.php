<?php

namespace Nahid\Talk\Blacklist;

use SebastianBerc\Repositories\Repository;

class BlacklistRepository extends Repository
{
  /*
     * this method is default method for repository package
     *
     * @return  \Nahid\Talk\Conersations\Conversation
     * */
    public function takeModel()
    {
        return Blacklist::class;
    }

    public function isUserBlocked($user1, $user2)
    {
        $exists = Blacklist::
            where(function ($query) use ($user1, $user2) {
                $query->where('blocked_id', $user1)
                ->where('user_id', $user2);
            })
            ->orWhere(function ($query) use ($user1,$user2) {
              $query->where('blocked_id', $user2)
              ->where('user_id', $user1);
          })
            ->exists();

        return $exists;
    }

}