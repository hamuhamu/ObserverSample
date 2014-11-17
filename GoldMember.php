<?php

require_once 'Member.php';

class GoldMember extends Member
{
    public function payment($itemId)
    {
        $amount = parent::payment($itemId);

        return $amount - 100;
    }
}
