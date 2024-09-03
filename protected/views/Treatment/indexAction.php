<?php
$this->pageTitle = Yii::app()->name . ' - Action List';
?>

<h1>Action List</h1>

<p>
    <?php echo CHtml::link('Buat Tindakan', array('createAction'), array('class' => 'btn btn-primary')); ?>
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'action-grid',
    'dataProvider' => $dataProvider,
    'columns' => array(
        'patient_id',
        'action_type',
        'description',
        array(
            'name' => 'action_date',
            'value' => function($data) {
                return Yii::app()->dateFormatter->format('yyyy-MM-dd', strtotime($data->action_date));
            },
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{view} {update} {delete}',
            'buttons' => array(
                'view' => array(
                    'label' => 'View',
                    'url' => 'Yii::app()->createUrl("treatment/viewAction", array("id"=>$data->id))',
                ),
                'update' => array(
                    'label' => 'Update',
                    'url' => 'Yii::app()->createUrl("treatment/updateAction", array("id"=>$data->id))',
                ),
                'delete' => array(
                    'label' => 'Delete',
                    'url' => 'Yii::app()->createUrl("treatment/deleteAction", array("id"=>$data->id))',
                ),
            ),
        ),
    ),
)); ?>
