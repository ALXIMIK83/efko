<div>

    <p><a href="<?= \yii\helpers\Url::to(['site/create']) ?>">Новый отпуск</a></p

    <? foreach ($vocations as $vocation) { ?>
        <p><?= $vocation->user->username ?>
        <?= $vocation->vocation_start ?>
        <?= $vocation->vocation_finish ?>
        <? if ($vocation->allow_edit && \Yii::$app->user->can('updateOwnPost', ['model' => $vocation]) ||
            \Yii::$app->user->can('updatePost')): ?>
            <a href="<?= \yii\helpers\Url::to(['site/update', 'id' => $vocation->id]) ?>">Редактировать отпуск</a></p>
        <? else: ?>
            </p>
        <? endif; ?>
    <? } ?>
</div>

