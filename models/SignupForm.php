<?php
 
namespace app\models;
 
use Yii;
use yii\base\Model;
use borales\extensions\phoneInput\PhoneInputValidator;
 
/**
 * Signup form
 */
class SignupForm extends Model
{
 
    public $first_name;
    public $last_name;
    public $patronymic;
    public $username;
    public $email;
    public $password;
    public $phone;
    public $is_phone_hidden;
    public $bio;
    public $city;
    public $photo;
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['first_name', 'trim'],
            ['first_name', 'required'],
            ['first_name', 'string', 'max' => '191'],
            ['last_name', 'trim'],
            ['last_name', 'required'],
            ['last_name', 'string', 'max' => '191'],
            ['patronymic', 'trim'],
            ['patronymic', 'default', 'value' => null],
            ['patronymic', 'string', 'max' => '191'],
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 191],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 191],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'string', 'max' => 33],
            [['phone'], PhoneInputValidator::className()],
            ['phone', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This phone has already been used to register account.'],
            ['bio', 'trim'],
            ['bio', 'default', 'value' => null],
            ['bio', 'string', 'max' => '3000'],
            ['city', 'trim'],
            ['city', 'default', 'value' => null],
            ['city', 'string', 'max' => '191'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }
 
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
 
        if (!$this->validate()) {
            return null;
        }
 
        $user = new User();
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->patronymic = $this->patronymic;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->bio = $this->bio;
        $user->city = $this->city;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
 
}