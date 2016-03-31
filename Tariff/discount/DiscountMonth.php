<?php
/**
 * Created by PhpStorm.
 * User: dkukobin
 * Date: 07.09.2015
 * Time: 15:25
 */

namespace app\models\tariff\discount;

use Yii;
use app\models\tariff\tariff\Tariff;

class DiscountMonth extends DiscountAbstract
{

    public function calculate(Tariff $tariff)
    {
        $this->calculate_value = $tariff->getCost() // cost of tariff
            * ( $tariff->getCountMonth() - $tariff->getCountMonthPaid() + $this->getValue() ) // discount number of months
            / $tariff->getCountMonth(); // number of months

        $cost = $tariff->getTotalCost() // cost of tariff
            - $this->calculate_value; // value of discount

        $tariff->setTotalCost( $cost );

        return $this;
    }
}