<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 25.10.17
 * Time: 14:18
 */

namespace app\models;


use yii\db\ActiveRecord;

class Transaction extends ActiveRecord
{
    public static function tableName()
    {
        return 'transactions'; // TODO: Change the autogenerated stub
    }
}