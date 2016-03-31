<?php
/**
 * Created by PhpStorm.
 * User: dkukobin
 * Date: 07.09.2015
 * Time: 15:25
 */

namespace app\models\tariff;

use Yii;
use yii\base\Exception;
use app\models\tariff\config\Config;
use app\models\tariff\discount\DiscountPercent;
use app\models\tariff\discount\DiscountValue;
use app\models\tariff\discount\DiscountMonth;

class Helper
{
    // TODO: replace this with DiscountHolder
    public static function getDiscountById($id, $value)
    {
        $discounts = [
            1 => DiscountPercent::className(),
            2 => DiscountValue::className(),
            3 => DiscountMonth::className()
        ];
        return new $discounts[ $id ]( $value );
    }

}