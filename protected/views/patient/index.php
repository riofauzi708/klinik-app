<?php
/* @var $this PatientController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = 'Patient List';
?>

<h1>Patient List</h1>

<div>
    <form method="get" action="<?php echo $this->createUrl('index'); ?>">
        <input type="text" name="search" placeholder="Search by name..." value="<?php echo CHtml::encode(Yii::app()->request->getParam('search')); ?>" onchange="this.form.submit()">
        <input type="submit" value="Search">
    </form>
</div>

<?php if($dataProvider->getItemCount() > 0): ?>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dataProvider->getData() as $patient): ?>
                <tr>
                    <td><?php echo CHtml::encode($patient->name); ?></td>
                    <td><?php echo CHtml::encode($patient->address); ?></td>
                    <td><?php echo CHtml::encode($patient->phone); ?></td>
                    <td><?php echo CHtml::encode($patient->email); ?></td>
                    <td>
                    <?php echo CHtml::button('View', array(
                            'onclick' => 'location.href="' . $this->createUrl('view', array('id' => $patient->id)) . '"',
                            'class' => 'btn btn-primary',
                        )); ?>

                        <?php echo CHtml::button('Update', array(
                            'onclick' => 'location.href="' . $this->createUrl('update', array('id' => $patient->id)) . '"',
                            'class' => 'btn btn-warning',
                        )); ?>

                        <?php echo CHtml::beginForm($this->createUrl('delete', array('id' => $patient->id)), 'post', array('style' => 'display:inline')); ?>
                            <?php echo CHtml::submitButton('Delete', array('class' => 'btn btn-danger', 'onclick' => 'return confirm("Are you sure you want to delete this patient?");')); ?>
                        <?php echo CHtml::endForm(); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php $this->widget('CLinkPager', array(
        'pages' => $dataProvider->pagination,
    )); ?>
<?php else: ?>
    <p>No patients found.</p>
<?php endif; ?>
