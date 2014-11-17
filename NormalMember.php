<?php

require_once 'Member.php';

class NormalMember extends Member
{
    public function payment($itemId)
    {
        return parent::payment($itemId);
    }
}
