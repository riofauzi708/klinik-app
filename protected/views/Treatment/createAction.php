<?php
$this->pageTitle = Yii::app()->name . ' - Create Action';
?>

<h1>Create Action</h1>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'action-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'patient_id'); ?>
        <?php echo $form->dropDownList($model, 'patient_id', CHtml::listData(Patient::model()->findAll(), 'id', 'name')); ?>
        <?php echo $form->error($model, 'patient_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'action_type'); ?>
        <?php echo $form->textField($model, 'action_type'); ?>
        <?php echo $form->error($model, 'action_type'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description'); ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Create Action'); ?>
    </div>

<?php $this->endWidget(); ?>
