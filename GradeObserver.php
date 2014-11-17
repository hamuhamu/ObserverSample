<?php

require_once 'MemberObserver.php';

class GradeObserver implements MemberObserver
{
    const GRADE_UP = 50;

    public function update(Member $member)
    {
        if ($member->getCameCount() == self::GRADE_UP) {
            // 会員ランクを昇格させる
            echo 'Grade Up';
        }
    }
}
