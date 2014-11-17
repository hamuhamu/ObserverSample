<?php

require_once 'NormalMember.php';
require_once 'GoldMember.php';
require_once 'CouponObserver.php';
require_once 'GradeObserver.php';

class ObserverTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function Observerテスト()
    {
        // クーポン割引かつグレードアップ
        // ゴールド会員割引は次回から
        $paymentCount = 49;
        $normalMember = new NormalMember($paymentCount);
        $normalMember->addObserver(new CouponObserver());
        $normalMember->addObserver(new GradeObserver());

        $itemId = 'D1';
        $this->assertSame(450, $normalMember->payment($itemId));

        // ゴールド会員割引
        $paymentCount = 133;
        $goldMember = new GoldMember($paymentCount);
        $goldMember->addObserver(new CouponObserver());
        $goldMember->addObserver(new GradeObserver());

        $itemId = 'E1';
        $this->assertSame(400, $goldMember->payment($itemId));

        // ゴールド会員割引かつクーポン割引
        $paymentCount = 149;
        $goldMember = new GoldMember($paymentCount);
        $goldMember->addObserver(new CouponObserver());
        $goldMember->addObserver(new GradeObserver());

        $itemId = 'E1';
        $this->assertSame(350, $goldMember->payment($itemId));
    }
}
