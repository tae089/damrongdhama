<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace dektrium\user\models;

use dektrium\user\traits\ModuleTrait;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string  $name
 * @property string  $public_email
 * @property string  $gravatar_email
 * @property string  $gravatar_id
 * @property string  $location
 * @property string  $website
 * @property string  $bio
 * @property User    $user
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com
 */
class Profile extends ActiveRecord
{
    use ModuleTrait;

    protected $module;
    public $file; 
    /** @inheritdoc */
    public function init()
    {
        $this->module = \Yii::$app->getModule('user');
    }

    /**
     * Returns avatar url or null if avatar is not set.
     * @param  int $size
     * @return string|null
     */
    public function getAvatarUrl($size = 200)
    {
        $protocol = \Yii::$app->request->isSecureConnection ? 'https' : 'http';

        return $protocol . '://gravatar.com/avatar/' . $this->gravatar_id . '?s=' . $size;
    }

    /**
     * @return \yii\db\ActiveQueryInterface
     */
    public function getUser()
    {
        return $this->hasOne($this->module->modelMap['User'], ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bio'], 'string'],
            [['public_email', 'gravatar_email'], 'email'],
            ['website', 'url'],
            [['name', 'public_email','position', 'gravatar_email', 'location', 'website','tel'], 'string', 'max' => 255],
            [['file'], 'safe'], //public function rules()
            [['file'], 'file', 'extensions'=>'jpg, gif, jpeg, png','maxSize' => 1024 * 1024 * 2],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name'           => \Yii::t('user', 'ชื่อ-สกุล'),
            'position'           => "ตำแหน่ง",
            'public_email'   => \Yii::t('user', 'Email (public)'),
            'gravatar_email' => \Yii::t('user', 'Gravatar email'),
            'location'       => \Yii::t('user', 'Location'),
            'website'        => \Yii::t('user', 'Website'),
            'bio'            => \Yii::t('user', 'Bio'),
            'tel' => 'เบอร์โทร',
            'file' => 'Photo', // public function attributeLabels()
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if ($this->isAttributeChanged('gravatar_email')) {
            $this->setAttribute('gravatar_id', md5(strtolower(trim($this->getAttribute('gravatar_email')))));
        }

        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%profile}}';
    }


}
