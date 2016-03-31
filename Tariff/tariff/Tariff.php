<?php
/**
 * Created by PhpStorm.
 * User: dkukobin
 * Date: 07.09.2015
 * Time: 15:25
 */

namespace app\models\tariff\tariff;

use app\models\tariff\discount\DiscountAbstract;
use Yii;
use app\models\tariff\config\Config;

class Tariff
{
    private $config;
    private $count_month;
    private $count_month_paid = null;
    private $count_user;
    private $cost;
    private $total_cost;

    public function __construct($name)
    {
        $this->config = Config::getTariffConfig($name);
    }


    // pattern Visitor
    // https://en.wikipedia.org/wiki/Visitor_pattern
    public function applyDiscount(DiscountAbstract $discount)
    {
        $discount->calculate($this);
    }

    public function calculate()
    {
        if ($this->count_user <= $this->config['start_license']) {
            $added_price = 0;
        } else {
            $added_price = ($this->count_user - $this->config['start_license']) * $this->config['added_user_price'];
        }
        $this->total_cost = $this->cost = $this->count_month * ($this->config['start_price'] + $added_price);

        return $this;
    }

    public function setCountUser($count)
    {
        $this->count_user = $count;
        return $this;
    }

    public function setCountMonth($count)
    {
        $this->count_month = $count;
        return $this;
    }

    public function setCountMonthPaid($count)
    {
        $this->count_month_paid = $count;
        return $this;
    }

    public function setTotalCost($cost)
    {
        $this->total_cost = ($cost < 0) ? 0 : $cost;
        return $this;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function getTotalCost()
    {
        return $this->total_cost;
    }

    public function getCountMonth()
    {
        return $this->count_month;
    }

    public function getCountMonthPaid()
    {
        return $this->count_month_paid ?: $this->count_month;
    }

    public function getName()
    {
        return $this->config['name'];
    }

    public function getId()
    {
        return $this->config['id'];
    }
}