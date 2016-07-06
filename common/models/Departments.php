<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property integer $id_dep
 * @property string $department
 *
 * @property User $idDep
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['department'], 'string', 'max' => 255],
            [['department'], 'safe'],
        ];
    }

    public function getStartFinish()
    {
        return $this->hasMany(StartFinish::className(),['empl_id' => 'id_dep']);
    }
    public function getUser()
    {
        return $this->hasMany(User::className(),['emp_dep'=>'id_dep']);
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dep' => 'Id',
            'department' => 'Отдел',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
}