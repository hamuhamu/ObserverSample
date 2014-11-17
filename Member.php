<?php

abstract class Member
{
    private $_observers;
    private $_paymentCount;
    private $_coupon;

    public function __construct($paymentCount)
    {
        $this->_observers = [];
        $this->_paymentCount = $paymentCount;
        $this->_coupon = [];
    }

    public function addObserver(MemberObserver $observer)
    {
        $this->_observers[get_class($observer)] = $observer;
    }

    public function removeObserver(MemberObserver $observer)
    {
        $this->_observers[get_class($observer)] = $observer;
    }

    protected function payment($itemId)
    {
        // $itemIdを元に金額をDBから取得したものとする
        $amount = 500;
        $this->incrementPaymentCountByOne();
        $this->notify();
        if ($this->_coupon instanceof Coupon) {
            return $this->_coupon->discount($amount);
        }

        return $amount;
    }

    protected function notify()
    {
        foreach ($this->_observers as $observer) {
            $observer->update($this);
        }
    }

    public function setCoupon(Coupon $coupon)
    {
        $this->_coupon = $coupon;
    }

    protected function incrementPaymentCountByOne()
    {
        $this->_paymentCount++;
    }

    public function getCameCount()
    {
        return $this->_paymentCount;
    }
}
