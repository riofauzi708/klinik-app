<?php
$this->pageTitle = Yii::app()->name . ' - Update Action';
?>

<h1>Update Action</h1>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'action-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'patient_id'); ?>
        <?php echo $form->dropDownList($model, 'patient_id', $patients, array('prompt' => 'Select Patient')); ?>
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

    <div class="row">
        <?php echo $form->labelEx($model, 'action_date'); ?>
        <?php echo $form->textField($model, 'action_date', array('id' => 'action_date')); ?>
        <?php echo $form->error($model, 'action_date'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'price'); ?>
        <?php echo $form->textField($model, 'price', array('id' => 'price', 'placeholder' => 'Rp 0')); ?>
        <?php echo $form->error($model, 'price'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Save'); ?>
    </div>

<?php $this->endWidget(); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<script>
$(document).ready(function() {
    // Initialize Datepicker for action_date
    $('#action_date').datepicker({
        dateFormat: 'yy-mm-dd' // Format date as YYYY-MM-DD
    });

    // Initialize MaskMoney for price
    $('#price').maskMoney({
        prefix: 'Rp ',
        allowNegative: false,
        thousands: '.',
        decimal: ',',
        affixesStay: true
    }).on('blur', function() {
        // Remove currency formatting for server submission
        var value = $(this).maskMoney('unmasked')[0];
        $(this).val(value);
    });
});
</script>
