<?php

namespace ubslum\lottegame\models;

use DateTime;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

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
 * @property int $status
 */
class GameScratchCard extends \yii\db\ActiveRecord
{
    const LOSE = 0;
    const WIN = 1;

    public $rewards = [
        [
            'name' => 'Bóng đá WC khâu tay Futsal',
            'points' => 279000
        ],
        [
            'name' => 'Bánh Coffee Joy 180g',
            'points' => 24400
        ],
        [
            'name' => 'Lốc 5 gói mì lẩu thái tôm Acecook 80g',
            'points' => 26900
        ],
        [
            'name' => 'Khô bò tứ xuyên TK 35g',
            'points' => 25700
        ],
        [
            'name' => 'Khô gà cay CBV 50g',
            'points' => 18900
        ],
        [
            'name' => 'Lốc 3 cá nục sốt cà seacrown 155g*3',
            'points' => 32000
        ],
        [
            'name' => 'Mực Bento thái gói 24g',
            'points' => 22000
        ],
        [
            'name' => 'Đào vàng Nongwoo hộp 340g',
            'points' => 30000
        ],
        [
            'name' => 'Snack rong biển nướng bibigo t.thống 10g',
            'points' => 20400
        ],
        [
            'name' => 'Bánh AFC ngũ cốc vị bắp 158g',
            'points' => 23400
        ],
        [
            'name' => 'Coca vị café chai 390ml',
            'points' => 7900
        ],
        [
            'name' => 'Bia BECKS 500ml',
            'points' => 16600
        ],
        [
            'name' => 'Strongbow 330ml',
            'points' => 16000
        ],
        [
            'name' => 'Bia Heineken lon sleek 330ml ',
            'points' => 16900
        ],
        [
            'name' => 'Bia Sapporo Premium lon 330ml',
            'points' => 16100
        ],
        [
            'name' => 'Big Cola  3,1L',
            'points' => 24900
        ],
        [
            'name' => 'Café sữa đá Highland lon 235ml',
            'points' => 9500
        ],
        [
            'name' => 'NGK Moutain dew 390ml',
            'points' => 6400
        ],
        [
            'name' => 'NTL Monster 355ml',
            'points' => 25900
        ],
        [
            'name' => 'Nước tăng lực Redbull lon 250ml',
            'points' => 9200
        ]
    ];
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
            [['fullname', 'email', 'phone', 'identity_number', 'identity_date_created'], 'required'],
            [['email'], 'email'],
            ['phone', 'trim'],
            ['phone', 'string', 'max' => 11],
            ['identity_number', 'string', 'max' => 9],
            [['status'], 'integer'],
            [['identity_date_created'], 'safe'],
            [['id_member', 'fullname', 'email', 'date_created'], 'string', 'max' => 255],
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
            'id_member' => 'Mã thành viên',
            'pos_number' => 'Số POS',
            'date_created' => 'Ngày tạo',
            'fullname' => 'Họ tên',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'identity_number' => 'CMND',
            'identity_date_created' => 'Ngày cấp',
            'status' => 'Tình trạng',
        ];
    }

    /*
     *
     */
    public static function getRewards(){
        return [
            [
                'name' => 'Bóng đá WC khâu tay Futsal',
                'points' => 279000
            ],
            [
                'name' => 'Bánh Coffee Joy 180g',
                'points' => 24400
            ],
            [
                'name' => 'Lốc 5 gói mì lẩu thái tôm Acecook 80g',
                'points' => 26900
            ],
            [
                'name' => 'Khô bò tứ xuyên TK 35g',
                'points' => 25700
            ],
            [
                'name' => 'Khô gà cay CBV 50g',
                'points' => 18900
            ],
            [
                'name' => 'Lốc 3 cá nục sốt cà seacrown 155g*3',
                'points' => 32000
            ],
            [
                'name' => 'Mực Bento thái gói 24g',
                'points' => 22000
            ],
            [
                'name' => 'Đào vàng Nongwoo hộp 340g',
                'points' => 30000
            ],
            [
                'name' => 'Snack rong biển nướng bibigo t.thống 10g',
                'points' => 20400
            ],
            [
                'name' => 'Bánh AFC ngũ cốc vị bắp 158g',
                'points' => 23400
            ],
            [
                'name' => 'Coca vị café chai 390ml',
                'points' => 7900
            ],
            [
                'name' => 'Bia BECKS 500ml',
                'points' => 16600
            ],
            [
                'name' => 'Strongbow 330ml',
                'points' => 16000
            ],
            [
                'name' => 'Bia Heineken lon sleek 330ml ',
                'points' => 16900
            ],
            [
                'name' => 'Bia Sapporo Premium lon 330ml',
                'points' => 16100
            ],
            [
                'name' => 'Big Cola  3,1L',
                'points' => 24900
            ],
            [
                'name' => 'Café sữa đá Highland lon 235ml',
                'points' => 9500
            ],
            [
                'name' => 'NGK Moutain dew 390ml',
                'points' => 6400
            ],
            [
                'name' => 'NTL Monster 355ml',
                'points' => 25900
            ],
            [
                'name' => 'Nước tăng lực Redbull lon 250ml',
                'points' => 9200
            ]
        ];
    }
//    public function behaviors()
//    {
////        return [
////            'timestamp' => [
////                'class' => TimestampBehavior::className(),
//////                'attributes' => [
//////                    ActiveRecord::EVENT_BEFORE_INSERT => 'date_created',
////////                    ActiveRecord::EVENT_BEFORE_UPDATE => 'update_time',
//////                ],
////                'createdAtAttribute' => 'date_created',
////                'updatedAtAttribute' => 'date_created',
////                'value' => function () {
////                    return '2018-01-01';
////                }
////            ],
////        ];
//
//    }
    public function getIndentityDateCreatedText($value)
    {
        $date = DateTime::createFromFormat('Y-m-d', $value);
        $this->identity_date_created = $date->format('d-m-Y');
    }


    public function setIndentityDateCreatedText($value)
    {
        $date = DateTime::createFromFormat('d-m-Y', $value);
        $this->identity_date_created = $date->format('Y-m-d');
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
