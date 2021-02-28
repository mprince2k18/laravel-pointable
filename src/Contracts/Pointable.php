<?php

namespace Mprince\Pointable\Contracts;

use Illuminate\Database\Eloquent\Model;

interface Pointable
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function transactions();

    /**
     *
     * @return mix
     */
    public function countTransactions();


    /**
     * @param $amount
     * @param $message
     * @param $data
     *
     * @return static
     */
    public function addPoints($amount, $message, $data = null);
}
