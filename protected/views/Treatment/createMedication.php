<?php
$this->pageTitle = Yii::app()->name . ' - Create Medication';
?>

<h1>Create Medication</h1>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'medication-form',
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
        <?php echo $form->labelEx($model, 'medication_name'); ?>
        <?php echo $form->textField($model, 'medication_name'); ?>
        <?php echo $form->error($model, 'medication_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'dosage'); ?>
        <?php echo $form->textField($model, 'dosage'); ?>
        <?php echo $form->error($model, 'dosage'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Create Medication'); ?>
    </div>

<?php $this->endWidget(); ?>
