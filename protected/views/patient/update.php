<?php
/* @var $this PatientController */
/* @var $model Patient */

$this->pageTitle = 'Update Patient - ' . CHtml::encode($model->name);
?>

<h1>Update Patient <?php echo CHtml::encode($model->name); ?></h1>

<div>
    <?php $form = $this->beginWidget('CActiveForm'); ?>

    <div>
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name'); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model, 'address'); ?>
        <?php echo $form->textField($model, 'address'); ?>
        <?php echo $form->error($model, 'address'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model, 'phone'); ?>
        <?php echo $form->textField($model, 'phone'); ?>
        <?php echo $form->error($model, 'phone'); ?>
    </div>

    <div>
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email'); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div>
        <?php echo CHtml::submitButton('Update'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
