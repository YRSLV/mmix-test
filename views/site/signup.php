<?php
 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use borales\extensions\phoneInput\PhoneInput;
 
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    

    <div class="row">
        <div class="col-lg-6">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>Please fill out the following fields to signup:</p>

            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <div class="row">
                    <div class="col-md-4">
                        <?= $form->field($model, 'first_name')->textInput(['autofocus' => true]) ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'last_name')->textInput() ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'patronymic')->textInput() ?>
                    </div>
                </div>
                
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'phone')->widget(PhoneInput::className(), [
                                    'jsOptions' => [
                                        'preferredCountries' => ['ua'],
                                    ]
                                ]);
                        ?>
                    </div>
                    
                    <div class="col-md-6"> 
                        <?= $form->field($model, 'city')->textInput() ?>
                    </div>
                </div>

                <?= $form->field($model, 'bio')->textarea() ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
 
        </div>
    </div>
</div>