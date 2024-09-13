<?php
$this->pageTitle = Yii::app()->name . ' - Update Medication';
?>

<h1>Update Medication</h1>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'medication-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>

<div class="form">
    <div class="row">
        <?php echo $form->labelEx($model, 'patient_id'); ?>
        <?php echo $form->dropDownList($model, 'patient_id', $patients, array('prompt' => 'Select Patient')); ?>
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

    <div class="row">
        <?php echo $form->labelEx($model, 'medication_date'); ?>
        <?php echo $form->textField($model, 'medication_date', array('id' => 'medication_date')); ?>
        <?php echo $form->error($model, 'medication_date'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'price'); ?>
        <?php echo $form->textField($model, 'price', array('id' => 'price', 'placeholder' => 'Rp 0')); ?>
        <?php echo $form->error($model, 'price'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-primary')); ?>
    </div>
</div>

<?php $this->endWidget(); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

<script>
$(document).ready(function() {
    // Initialize Datepicker for medication_date
    $('#medication_date').datepicker({
        dateFormat: 'yy-mm-dd' // Format date as YYYY-MM-DD
    });

    // Initialize MaskMoney for price
    $('#price').maskMoney({
        prefix: 'Rp ',
        allowNegative: false,
        thousands: '.',
        decimal: ',',
        affixesStay: true
    });

    // Clean price format before submitting the form
    $('#medication-form').on('submit', function() {
        var price = $('#price').maskMoney('unmasked')[0]; // Get the numeric value
        $('#price').val(price); // Set it back to the field before submitting
    });
});
</script>
