<h1>Payment Report</h1>

<!-- Form pencarian -->
<form method="get" action="<?php echo Yii::app()->createUrl('bill/pembayaran'); ?>">
    <label for="search">Search Patient:</label>
    <input type="text" id="search" name="search" value="<?php echo CHtml::encode($searchKeyword); ?>" />
    <input type="submit" value="Search" />
</form>

<table border="1">
    <thead>
        <tr>
            <th>Patient ID</th>
            <th>Patient Name</th>
            <th>Address</th>
            <th>Total Treatment Cost</th>
            <th>Total Medication Cost</th>
            <th>Total Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reportData as $data): ?>
            <tr>
                <td><?php echo CHtml::encode($data['patient_id']); ?></td>
                <td><?php echo CHtml::encode($data['patient_name']); ?></td>
                <td><?php echo CHtml::encode($data['address']); ?></td>
                <td><?php echo CHtml::encode(Yii::app()->numberFormatter->format('Rp #,##0.00', $data['total_treatment_cost'])); ?></td>
                <td><?php echo CHtml::encode(Yii::app()->numberFormatter->format('Rp #,##0.00', $data['total_medication_cost'])); ?></td>
                <td><?php echo CHtml::encode(Yii::app()->numberFormatter->format('Rp #,##0.00', $data['total_price'])); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
