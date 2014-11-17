<?php

require_once 'MemberObserver.php';
require_once 'Coupon.php';

class CouponObserver implements MemberObserver
{
    public function update(Member $member)
    {
        if (($member->getCameCount() % 5) === 0) {
            $member->setCoupon(new Coupon);
        }
    }
}
