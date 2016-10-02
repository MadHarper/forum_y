<?php


namespace frontend\modules\forum\models;


use common\models\User;
use Yii;
use yii\base\Model;
use yii\base\InvalidParamException;

class AccountActivation extends Model
{
    private $_user;

    public function __construct($key, $config = [])
    {
        if(empty($key) || !is_string($key)){
            throw new InvalidParamException('Ключ не может быть пустым');
        }

        $this->_user = User::findByEmailConfirmToken($key);
        if(!$this->_user){
            throw new InvalidParamException('Не найден пользователь');
        }
        parent::__construct($config);
    }

    public function activateAccount()
    {
        $user = $this->_user;
        $user->status = User::STATUS_ACTIVE;
        $user->removeEmailConfirmToken();
        return $user->save();
    }

    public function getUsername()
    {
        $user = $this->_user;
        return $user->username;
    }
}