<?php

namespace ubslum\lottegame\models;

use DateTime;
use Yii;

/**
 * This is the model class for table "game_guess".
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
 * @property string $answer_one
 * @property string $answer_two
 * @property int $status
 * @property int $assure
 */
class GameGuess extends \yii\db\ActiveRecord
{
    const LOSE = 0;
    const WIN = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'game_guess';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_member', 'pos_number', 'fullname', 'email', 'phone', 'identity_number', 'identity_date_created', 'assure'], 'required'],
            [['email'], 'email'],
            ['phone', 'trim'],
            ['phone', 'string', 'max' => 11],
            ['identity_number', 'string', 'max' => 9],
            ['assure', 'required', 'requiredValue' => 1, 'message' => 'Bạn chưa cam đoan.'],
            [['date_created', 'date_updated', 'identity_date_created'], 'safe'],
            [['status', 'assure'], 'integer'],
            [['id_member', 'fullname', 'email', 'answer_one', 'answer_two'], 'string', 'max' => 255],
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
            'date_updated' => 'Date Updated',
            'answer_one' => 'Trả lời câu 01',
            'answer_two' => 'Trả lời câu 02',
            'status' => 'Status',
            'assure' => 'Tôi xin cam đoan thông tin trên là đúng sự thật và sẽ được sử dụng làm căn cứ trao giải khi trúng thưởng.',
        ];
    }

    /*
     * list all team WC
     */
    public static function getTeamWC(){
        return [
            'Nga' => 'Nga',
            'Saudi Arabia' => 'Saudi Arabia',
            'Ai Cập' => 'Ai Cập',
            'Uruguay' => 'Uruguay',
            'Bồ Đào Nha' => 'Bồ Đào Nha',
            'Tây Ban Nha' => 'Tây Ban Nha',
            'Iran' => 'Iran',
            'Morocco' => 'Morocco',
            'Pháp' => 'Pháp',
            'Australia' => 'Australia',
            'Peru' => 'Peru',
            'Đan Mạch' => 'Đan Mạch',
            'Argentina' => 'Argentina',
            'Iceland' => 'Iceland',
            'Croatia' => 'Croatia',
            'Nigeria' => 'Nigeria',
            'Brazil' => 'Brazil',
            'Thuỵ Sỹ' => 'Thuỵ Sỹ',
            'Costa Rica' => 'Costa Rica',
            'Serbia' => 'Serbia',
            'Đức' => 'Đức',
            'Mexico' => 'Mexico',
            'Thuỵ Điển' => 'Thuỵ Điển',
            'Hàn Quốc' => 'Hàn Quốc',
            'Bỉ' => 'Bỉ',
            'Anh' => 'Anh',
            'Panama' => 'Panama',
            'Tunisia' => 'Tunisia',
            'Ba Lan' => 'Ba Lan',
            'Colombia' => 'Colombia',
            'Senegal' => 'Senegal',
            'Nhật Bản' => 'Nhật Bản'
        ];
    }

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
}
