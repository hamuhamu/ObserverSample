<?php

class Coupon
{
    public function discount($amount)
    {
        return (int)ceil($amount * 0.9);
    }
}
