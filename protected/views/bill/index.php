// protected/views/bill/index.php
<?php
$this->pageTitle = Yii::app()->name . ' - Payment Information';
?>

<h1>Payment Information</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $dataProvider,
    'columns' => array(
        'id',
        'patient_id',
        'amount',
        array(
            'name' => 'status',
            'value' => function($data) {
                return $data->status === 'unpaid' ? 'Unpaid' : 'Paid';
            },
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{view} {pay}',
            'buttons' => array(
                'pay' => array(
                    'label' => 'Pay',
                    'url' => 'Yii::app()->createUrl("bill/update", array("id" => $data->id))',
                    'imageUrl' => Yii::app()->baseUrl.'/images/pay.png',
                    'visible' => '$data->status === "unpaid"',
                ),
            ),
        ),
    ),
));
?>
