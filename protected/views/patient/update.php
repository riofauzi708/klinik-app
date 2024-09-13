<?php
/* @var $this PatientController */
/* @var $model Patient */

$this->pageTitle = 'Update Patient - ' . CHtml::encode($model->name);
?>

<h1>Update Patient <?php echo CHtml::encode($model->name); ?></h1>

<div class="form"> <!-- Tambahkan kelas form di sini -->
    <?php $form = $this->beginWidget('CActiveForm'); ?>

    <div class="row"> <!-- Tambahkan kelas row -->
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name'); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row"> <!-- Tambahkan kelas row -->
        <?php echo $form->labelEx($model, 'address'); ?>
        <?php echo $form->textField($model, 'address'); ?>
        <?php echo $form->error($model, 'address'); ?>
    </div>

    <div class="row"> <!-- Tambahkan kelas row -->
        <?php echo $form->labelEx($model, 'phone'); ?>
        <?php echo $form->textField($model, 'phone'); ?>
        <?php echo $form->error($model, 'phone'); ?>
    </div>

    <div class="row"> <!-- Tambahkan kelas row -->
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email'); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row buttons"> <!-- Tambahkan kelas row dan buttons -->
        <?php echo CHtml::submitButton('Update', array('class' => 'btn btn-primary')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
