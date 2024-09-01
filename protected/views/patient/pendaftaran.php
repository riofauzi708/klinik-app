<?php
$this->pageTitle = Yii::app()->name . ' - Pendaftaran Pasien';
?>

<h1>Pendaftaran Pasien</h1>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'patient-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name'); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'address'); ?>
        <?php echo $form->textArea($model, 'address'); ?>
        <?php echo $form->error($model, 'address'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'phone'); ?>
        <?php echo $form->textField($model, 'phone'); ?>
        <?php echo $form->error($model, 'phone'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email'); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Register', array('class' => 'btn btn-primary')); ?>
    </div>

<?php $this->endWidget(); ?>

<h1>Patient List</h1>

<div>
    <form method="get" action="<?php echo $this->createUrl('pendaftaran'); ?>">
        <input type="text" name="search" placeholder="Search by name..." value="<?php echo CHtml::encode(Yii::app()->request->getParam('search')); ?>" onchange="this.form.submit()">
        <input type="submit" value="Search">
    </form>
</div>

<?php if ($dataProvider->getItemCount() > 0): ?>
    <table class="table table-striped">
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
            <?php foreach ($dataProvider->getData() as $patient): ?>
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
