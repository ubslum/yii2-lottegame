<?php

namespace ubslum\lottegame\models;

use Yii;

/**
 * This is the model class for table "game_scratch_card".
 *
 * @property int $id
 * @property string $id_member
 * @property string $pos_number
 * @property string $date_created
 * @property string $date_updated
 * @property string $fullname
 * @property string $email
 * @property string $phone
 * @property string $identity_number
 * @property string $identity_date_created
 * @property int $reward
 * @property string $reward_details
 * @property int $status
 */
class GameScratchCardA extends \yii\db\ActiveRecord
{
    const LOSE = 0;
    const WIN = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game_scratch_card';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_updated', 'identity_date_created'], 'safe'],
            [['reward', 'status'], 'integer'],
            [['reward_details'], 'string'],
            [['id_member', 'date_created', 'fullname', 'email'], 'string', 'max' => 255],
            [['pos_number', 'phone', 'identity_number'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_member' => 'Id Member',
            'pos_number' => 'Pos Number',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
            'fullname' => 'Fullname',
            'email' => 'Email',
            'phone' => 'Phone',
            'identity_number' => 'Identity Number',
            'identity_date_created' => 'Identity Date Created',
            'reward' => 'Reward',
            'reward_details' => 'Reward Details',
            'status' => 'Status',
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        if($insert){
            $this->date_created = date('Y-m-d');
            $this->status = self::LOSE;
        }
        return true;
    }
}
