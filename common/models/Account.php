<?php

namespace common\models;

use Yii;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "{{%account}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $dp
 * @property string|null $thumbnail
 * @property int $created_at
 * @property string|null $channel_description
 *
 * @property User $user
 */
class Account extends \yii\db\ActiveRecord
{
    /**
     * @var \yii\web\UploadedFile
     */
    public $thumbnail;

    /**
     * @var \yii\web\UploadedFile
     */
    public $dp;
    /**
     * @var \yii\web\UploadedFile
     */
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%account}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at'], 'required'],
            [['user_id', 'created_at'], 'integer'],
            [['dp', 'thumbnail', 'channel_description'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            ['thumbnail', 'image', ],
            ['dp', 'image', ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'dp' => 'Dp',
            'thumbnail' => 'Thumbnail',
            'created_at' => 'Created At',
            'channel_description' => 'Channel Description',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return AccountQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AccountQuery(get_called_class());
    }

    public function save($runValidation = true, $attributeNames = null) {
        $isInsert = $this->isNewRecord;
        if ($isInsert) {
            $this->thumbnail = Yii::$app->security->generateRandomString(8);
            $this->dp = Yii::$app->security->generateRandomString(8);
            $this->user_id = Yii::$app->user->id;
        }

        $saved = parent::save($runValidation, $attributeNames);
        if (!$saved) {
            return false;
        }

        if ($isInsert) {
            $thumbnailPath = Yii::getAlias('@frontend/web/storage/dp/' . $this->thumbnail . '.png');
            if (!is_dir(dirname($thumbnailPath))) {
                FileHelper::createDirectory(dirname($thumbnailPath));
            }
           
        }
        // if ($this->dp) {
        //     $dpPath = Yii::getAlias('@frontend/web/storage/dp/' . $this->dp . '.jpg');
        //     if (!is_dir(dirname($dpPath))) {
        //         FileHelper::createDirectory(dirname($dpPath));
        //     }
        //     $this->dp->saveAs($dpPath);
        //     // Image::getImagine()
        //     //     ->open($thumbnailPath)
        //     //     ->thumbnail(new Box(1280, 1280))
        //     //     ->save();
        // }
        return true;
    }
}
