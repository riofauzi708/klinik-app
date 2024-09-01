<?php
$this->pageTitle = Yii::app()->name . ' - View Medication';
?>

<h1>View Medication</h1>

<div>
    <p><strong>Medication Name:</strong> <?php echo CHtml::encode($model->medication_name); ?></p>
    <p><strong>Dosage:</strong> <?php echo CHtml::encode($model->dosage); ?></p>
    <p><strong>Medication Date:</strong> <?php echo CHtml::encode($model->medication_date); ?></p>
</div>
