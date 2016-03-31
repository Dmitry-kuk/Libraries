<?php
/**
 * Created by PhpStorm.
 * User: dkukobin
 * Date: 07.09.2015
 * Time: 15:25
 */

namespace app\models\tariff\discount;

use Yii;
use yii\base\Exception;
use app\models\tariff\tariff\Tariff;

class DiscountHolder
{

    public static function get($type_id)
    {
        switch ($type_id) {
            case 1:
                $discount = new DiscountPercent();
                $discount->setTypeId($type_id);
                break;
            case 2:
                $discount = new DiscountValue();
                $discount->setTypeId($type_id);
                break;
            case 3:
                $discount = new DiscountMonth();
                $discount->setTypeId($type_id);
                break;
            default:
                $discount = null;
        }
        return $discount;
    }

}