<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property string $id
 * @property string $woj_id
 * @property string $pow_id
 * @property string $gmi_id
 * @property string $name
 * @property string $created_at
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['woj_id', 'pow_id', 'gmi_id'], 'integer'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'woj_id' => 'Woj ID',
            'pow_id' => 'Pow ID',
            'gmi_id' => 'Gmi ID',
            'name' => 'Name',
            'created_at' => 'Created At',
        ];
    }

    public function getCities($name) {
        $name = str_replace(",", " ", $name);
        $nameParts = explode(" ", $name);
        $cities = [];
        
        foreach($nameParts as $value) {
            $cities = City::find()
                ->asArray()
                ->select('city.name AS n, g.name AS g, p.name AS p, lower(w.name) AS w')
                ->rightJoin('gmi AS g', '`g`.`id` = `city`.`gmi_id`')
                ->leftJoin('pow AS p', '`p`.`id` = `city`.`pow_id`')
                ->leftJoin('woj AS w', '`w`.`id` = `city`.`woj_id`')
                ->andFilterWhere(['like', 'city.name', $value])
                ->limit(100)
                ->all();
            if(count($cities) > 0) {
                break;
            }
        }
        return $cities;
    }
}