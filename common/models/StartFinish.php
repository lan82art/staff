<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "start_finish".
 *
 * @property integer $id_sf
 * @property integer $empl_id
 * @property integer $start_at
 * @property integer $finish_at
 */
class StartFinish extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'start_finish';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['empl_id'], 'required'],
            [['notes'], 'string'],
            [['fio'], 'safe'],
            [['department'],'safe'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function getUser()
    {
        return $this->hasOne(User::className(),['id' => 'empl_id']);
    }

    public function getFio()
    {
        return $this->user->fio;
    }

    public function getDepartments()
    {
        return $this->hasOne(Departments::className(),['id_dep' => 'emp_dep'])->via('user');
    }

    public function getDepartment()
    {
        return $this->departments->department;
    }
    public function attributeLabels()
    {
        return [
            'id_sf' => 'Id события',
            'department' => 'Отдел',
            'empl_id' => 'Сотрудник',
            'created_at' => 'Пришел на работу',
            'updated_at' => 'Ушел с работы',
            'fio' => 'ФИО',
            'notes' => 'Примечания (причина опоздания/раннего ухода)',
        ];
    }
}
