<?php

namespace Mprince\Pointable\Traits;

use Mprince\Pointable\Models\Transaction;
use Illuminate\Database\Eloquent\Model;

trait Pointable
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function transactions($amount = null)
    {
        return $this->morphMany(Transaction::class, 'pointable')->orderBy('created_at','desc')->take($amount);
    }

    /**
     *
     * @return mix
     */
    public function countTransactions(){
      return $this->transactions()
          ->count();
    }

    /**
     *
     * @return double
     */
    public function currentPoints()
    {
        return (new Transaction())->getCurrentPoints($this);
    }

    /**
     * @param $amount
     * @param $message
     * @param $data
     *
     * @return static
     */
    public function addPoints($amount, $message, $data = null)
    {
        return (new Transaction())->addTransaction($this, $amount, $message, $data = null);
    }
}
