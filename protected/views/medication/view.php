<?php
$this->pageTitle = Yii::app()->name . ' - View Medication';
?>

<h1>View Medication</h1>

<div>
    <b>Medication Name:</b>
    <?php echo CHtml::encode($model->medication_name); ?>
</div>

<div>
    <b>Dosage:</b>
    <?php echo CHtml::encode($model->dosage); ?>
</div>

<div>
    <b>Medication Date:</b>
    <?php echo CHtml::encode(Yii::app()->dateFormatter->format('yyyy-MM-dd', strtotime($model->medication_date))); ?>
</div>

<div>
    <b>Price:</b>
    <?php echo CHtml::encode(Yii::app()->numberFormatter->format('Rp #,##0.00', $model->price)); ?>
</div>

<p>
    <?php echo CHtml::link('Update', array('update', 'id' => $model->id)); ?>
    <?php echo CHtml::link('Delete', array('delete', 'id' => $model->id), array('confirm' => 'Are you sure you want to delete this item?')); ?>
    <?php echo CHtml::link('Back to List', array('index')); ?>
</p>
