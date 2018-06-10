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
 * @property int $reward
 * @property string $reward_details
 * @property int $status
 */
class GameScratchCard extends \yii\db\ActiveRecord
{
    const LOSE = 0;
    const WIN = 1;

    public $date_created_vn;

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
            [['status', 'reward'], 'integer'],
            [['identity_date_created', 'reward_details'], 'safe'],
            [['id_member', 'fullname', 'email', 'date_created', 'date_created_vn'], 'string', 'max' => 255],
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
            'reward_details' => 'Giải thưởng'
        ];
    }

    /*
     *
     */
    public static function getRewards(){
        return [
            [
                'name' => 'Bóng đá WC khâu tay Futsal',
                'points' => 279000,
                'img' => 'bong_da_futsal.png'
            ],
            [
                'name' => 'Bánh Coffee Joy 180g',
                'points' => 24400,
                'img' => 'banh_cf_joy_180.png'
            ],
            [
                'name' => 'Lốc 5 gói mì lẩu thái tôm Acecook 80g',
                'points' => 26900,
                'img' => 'loc_5_goi_mi_lau_thai_tom_acecook_80.png'
            ],
            [
                'name' => 'Khô bò tứ xuyên TK 35g',
                'points' => 25700,
                'img' => 'kho_bo_tu_xuyen_35.png'
            ],
            [
                'name' => 'Khô gà cay CBV 50g',
                'points' => 18900,
                'img' => 'kho_ga_cay_cbv_50.png'
            ],
            [
                'name' => 'Lốc 3 cá nục sốt cà seacrown 155g*3',
                'points' => 32000,
                'img' => 'loc_3_ca_nuc_sot_ca_seacrown_155.png'
            ],
            [
                'name' => 'Mực Bento thái gói 24g',
                'points' => 22000,
                'img' => 'muc_bento_thai_24.png'
            ],
            [
                'name' => 'Đào vàng Nongwoo hộp 340g',
                'points' => 30000,
                'img' => 'dao_vang_nongwoo_hop_340.png'
            ],
            [
                'name' => 'Snack rong biển nướng bibigo t.thống 10g',
                'points' => 20400,
                'img' => 'snack_rong_bien_nuong_bibigo_10.png'
            ],
            [
                'name' => 'Bánh AFC ngũ cốc vị bắp 158g',
                'points' => 23400,
                'img' => 'banh_afc_ngu_coc_vi_bap_158.png'
            ],
            [
                'name' => 'Coca vị café chai 390ml',
                'points' => 7900,
                'img' => 'coca_vi_cafe_chai_390.png'
            ],
            [
                'name' => 'Bia BECKS 500ml',
                'points' => 16600,
                'img' => 'bia_becks_500.png'
            ],
            [
                'name' => 'Strongbow 330ml',
                'points' => 16000,
                'img' => 'strongbow_330.png'
            ],
            [
                'name' => 'Bia Heineken lon sleek 330ml ',
                'points' => 16900,
                'img' => 'bia_heineken_lon_330.png'
            ],
            [
                'name' => 'Bia Sapporo Premium lon 330ml',
                'points' => 16100,
                'img' => 'bia_sapporo_pre_330.png'
            ],
            [
                'name' => 'Big Cola 3,1L',
                'points' => 24900,
                'img' => 'big_cola_3_1.png'
            ],
            [
                'name' => 'Café sữa đá Highland lon 235ml',
                'points' => 9500,
                'img' => 'cafe_sua_da_highland_235.png'
            ],
            [
                'name' => 'NGK Moutain dew 390ml',
                'points' => 6400,
                'img' => 'ngk_moutain_dew_390.png'
            ],
            [
                'name' => 'NTL Monster 355ml',
                'points' => 25900,
                'img' => 'ntl_monster_355.png'
            ],
            [
                'name' => 'Nước tăng lực Redbull lon 250ml',
                'points' => 9200,
                'img' => 'nuoc_tang_luc_redbull_250.png'
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

    public function getDateCreatedText($value)
    {
        $date = DateTime::createFromFormat('Y-m-d', $value);
        $this->date_created = $date->format('d-m-Y');
    }


    public function setDateCreatedText($value)
    {
        $date = DateTime::createFromFormat('d-m-Y', $value);
        $this->date_created = $date->format('Y-m-d');
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

//    public function afterFind()
//    {
//        parent::afterFind();
//
//        $date = DateTime::createFromFormat('Y-m-d', $this->date_created);
//        $this->date_created_vn = $date->format('d-m-Y');
//
//    }
}
