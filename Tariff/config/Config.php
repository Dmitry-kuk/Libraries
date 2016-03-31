<?php
/**
 * Created by PhpStorm.
 * User: dkukobin
 * Date: 07.09.2015
 * Time: 15:25
 */

namespace app\models\tariff\config;

use Yii;
use yii\base\Exception;

class Config
{

    private static $tariffs = [
        'expert' => [
            'id' => '4',
            'name' => 'Эксперт',
            'eng_name' => 'expert',
            'start_price' => 3990,
            'start_license' => 1,
            'added_user_price' => 3990
        ],
        'company' => [
            'id' => '5',
            'name' => 'Компания',
            'eng_name' => 'company',
            'start_price' => 9900,
            'start_license' => 3,
            'added_user_price' => 3000
        ],
        'agency' => [
            'id' => '6',
            'name' => 'Агентство',
            'eng_name' => 'agency',
            'start_price' => 28000,
            'start_license' => 10,
            'added_user_price' => 990
        ]
    ];

    public static function get()
    {
        return static::$tariffs;
    }

    public static function getTariffConfig($name)
    {
        if (in_array($name, [4,5,6])) { // by id
            $config = static::get();
            foreach ($config as $item) {
                if ($item['id'] == $name) {
                    return $item;
                    break;
                }
            }

        } else {
            return static::get()[$name]; // by name
        }
    }

    public static function getDiscountType($id)
    {
        $types =  [
            '1' => [
                'name' => 'Проценты',
            ],
            '2' => [
                'name' => 'Количество',
            ],
            '3' => [
                'name' => 'Месяцы',
            ]
        ];
        return $types[ $id ];
    }

}