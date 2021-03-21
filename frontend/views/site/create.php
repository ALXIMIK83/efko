<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\Vocations */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'vocation-form']); ?>

            <?= $form->field($model, 'vocation_start') ?>

            <?= $form->field($model, 'vocation_finish') ?>

            <? if (\Yii::$app->user->can('changeAllowEdit')) { ?>
                <?= $form->field($model, 'allow_edit')->checkbox() ?>
            <? } ?>

            <div class="form-group">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary', 'name' => 'vocation-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
