<?php

class BillController extends Controller
{
    // Action untuk menampilkan laporan pembayaran dengan pencarian
    public function actionPembayaran()
    {
        // Ambil nilai pencarian dari query parameter
        $searchKeyword = Yii::app()->request->getParam('search', '');

        // Mengambil data pasien dengan pencarian
        $criteria = new CDbCriteria();
        
        if (!empty($searchKeyword)) {
            $criteria->compare('name', $searchKeyword, true);
        }

        $patients = Patient::model()->with('actions', 'medications')->findAll($criteria);

        // Menginisialisasi array untuk menyimpan data laporan
        $reportData = array();

        // Loop melalui setiap pasien dan kumpulkan data yang dibutuhkan
        foreach ($patients as $patient) {
            $patientId = $patient->id;
            $patientName = $patient->name;
            $address = $patient->address; // Ambil alamat pasien

            // Menghitung total biaya tindakan dan obat-obatan
            $totalTreatmentCost = 0;
            $totalMedicationCost = 0;

            // Menghitung total biaya tindakan
            foreach ($patient->actions as $action) {
                $totalTreatmentCost += $action->price;
            }

            // Menghitung total biaya obat-obatan
            foreach ($patient->medications as $medication) {
                $totalMedicationCost += $medication->price;
            }

            // Menghitung total harga
            $totalPrice = $totalTreatmentCost + $totalMedicationCost;

            // Menyimpan data ke array reportData
            $reportData[] = array(
                'patient_id' => $patientId,
                'patient_name' => $patientName,
                'address' => $address,
                'total_treatment_cost' => $totalTreatmentCost,
                'total_medication_cost' => $totalMedicationCost,
                'total_price' => $totalPrice,
            );
        }

        // Pastikan $reportData dikirimkan ke view
        $this->render('pembayaran', array(
            'reportData' => $reportData,
            'searchKeyword' => $searchKeyword,
        ));
    }
}
