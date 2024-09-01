// protected/views/bill/pembayaran.php

<?php
// Contoh penggunaan $model di view
if(Yii::app()->user->hasFlash('success')) {
    echo '<div class="flash-success">' . Yii::app()->user->getFlash('success') . '</div>';
}
?>

<h1>Pembayaran Tagihan</h1>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'bill-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'amount'); ?>
        <?php echo $form->textField($model, 'amount'); ?>
        <?php echo $form->error($model, 'amount'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Bayar'); ?>
    </div>

<?php $this->endWidget(); ?>
