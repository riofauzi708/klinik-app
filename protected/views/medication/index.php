<?php
$this->pageTitle = Yii::app()->name . ' - Medication List';
?>

<h1>Medication List</h1>

<p>
    <?php echo CHtml::link('Buat Obat', array('create')); ?>
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'medication-grid',
    'dataProvider' => $dataProvider,
    'columns' => array(
        'patient_id',
        'medication_name',
        'dosage',
        array(
            'name' => 'medication_date',
            'value' => function($data) {
                return Yii::app()->dateFormatter->format('yyyy-MM-dd', strtotime($data->medication_date));
            },
        ),
        array(
            'name' => 'price',
            'value' => function($data) {
                return Yii::app()->numberFormatter->format('Rp #,##0.00', $data->price);
            },
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{view} {update} {delete}',
            'buttons' => array(
                'view' => array(
                    'label' => 'View',
                    'url' => 'Yii::app()->createUrl("medication/view", array("id"=>$data->id))',
                ),
                'update' => array(
                    'label' => 'Update',
                    'url' => 'Yii::app()->createUrl("medication/update", array("id"=>$data->id))',
                ),
                'delete' => array(
                    'label' => 'Delete',
                    'url' => 'Yii::app()->createUrl("medication/delete", array("id"=>$data->id))',
                ),
            ),
        ),
    ),
)); ?>
