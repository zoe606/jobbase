<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_category}}".
 *
 * @property int $id
 * @property string $name
 * @property string $create_date
 *
 * @property TblJob[] $tblJobs
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tbl_category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['create_date'], 'safe'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'create_date' => 'Create Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblJobs()
    {
        return $this->hasMany(Job::className(), ['category_id' => 'id']);
    }

    public function getJobs()
    {
        return $this->hasMany(Job::className(), ['category_id' => 'id']);
    }
}
