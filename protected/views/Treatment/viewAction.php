<?php
$this->pageTitle = Yii::app()->name . ' - View Action';
?>

<h1>View Action</h1>

<div>
    <p><strong>Action Type:</strong> <?php echo CHtml::encode($model->action_type); ?></p>
    <p><strong>Description:</strong> <?php echo CHtml::encode($model->description); ?></p>
    <p><strong>Action Date:</strong> <?php echo CHtml::encode($model->action_date); ?></p>
</div>
