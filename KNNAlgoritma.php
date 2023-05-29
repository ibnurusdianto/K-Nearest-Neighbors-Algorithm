<?php
// membuat fungsi hitung jarak atau untuk menghitung jarak
function hitung_jarak ($data1, $data2){
    // inisialisasi jarak = 0
    $jarak = 0;

    // dimensi untuk menghitung jumlah keseluruhan dari data1
    $dimensi = count($data1);

    // perulangan akan terus berjalan selama $i lebih kecil dari $dimensi
    for ($i = 0; $i < $dimensi; $i++){
        // dipangkatkan 2 dengan fungsi pow
        $jarak += pow($data1[$i] - $data2[$i], 2);
    }

    // menambahkan ke variable $jarak
    return sqrt($jarak);
}

// membuat fungsi dimana fungsi ini melakukan klasifikasi
function knn_classification($query, $training_set, $k){
    $jarak = [];

    // fucntion perulangan untuk menghitung jarak antara query dan data training set.
    foreach ($training_set as $data){
        $jarak [] = ['label' => $data['label'],  'distance' => hitung_jarak($query, $data['features'])];
    };

    // melakukan ascending urutan jarak
    usort($jarak, function ($a, $b){
        return $a['distance'] <=> $b ['distance'];
    });

    // kita akan mengambil nilai K yang tetangga terdekat
    $tetangga = array_slice($jarak, 0, $k);

    // menghitung jumlah kemunculan setiap label pada nilai K tetangga
    $jumlah_label = [];
    //melakukan perulangan
    foreach ($tetangga as $neighbor){
        $label = $neighbor['label'];
        if (!isset($jumlah_label[$label])){
            $jumlah_label[$label] = 0;
        }
        $jumlah_label[$label]++;
    }

    // mencari label kemunculan yg terbanyak
    $label_terbanyak = '';
    $jumlah_terbanyak = 0;
    foreach ($jumlah_label as $label => $jumlah){
        if ($jumlah > $jumlah_terbanyak){
            $jumlah_terbanyak = $jumlah;
            $label_terbanyak = $label;
        }
    }

    return $label_terbanyak;
}

// data set 1
$query1 = [5,2];
$training_set1 = [
    ['features' => [2,3], 'label' => 'A'],
    ['features' => [4,2], 'label' => 'A'],
    ['features' => [1,1], 'label' => 'B'],
    ['features' => [6,5], 'label' => 'B'],
    ['features' => [4,4], 'label' => 'A'],
    ['features' => [2,2], 'label' => 'B'],
    ['features' => [1,3], 'label' => 'A']
];
$k1 = 3;

// data set 2
$query2 = [42,420];
$training_set = [
    ['features' => [40,400], 'label' => 'A'],
    ['features' => [45,450], 'label' => 'A'],
    ['features' => [50,500], 'label' => 'B'],
    ['features' => [35,300], 'label' => 'B'],
    ['features' => [42,400], 'label' => 'A'],
    ['features' => [38,350], 'label' => 'B'],
    ['features' => [39,380], 'label' => 'A']
];
$k2 = 3;

// data set 3
$query3 = [8,8,8,8];
$training_set = [
    ['features' => [7,8,7,8], 'label' => 'A'],
    ['features' => [8,9,7,7], 'label' => 'B'],
    ['features' => [9,7,9,8], 'label' => 'B'],
    ['features' => [8,8,8,9], 'label' => 'B'],
    ['features' => [7,7,8,8], 'label' => 'A'],
    ['features' => [9,8,7,7], 'label' => 'A'],
    ['features' => [8,7,8,8], 'label' => 'B']
];
$k3 = 7;

// melakukan clasifikasi KNN untuk setiap query
$hasil_query1 = knn_classification($query1, $training_set, $k1);
$hasil_query2 = knn_classification($query2, $training_set, $k2);
$hasil_query3 = knn_classification($query3, $training_set, $k3);

// output hasil
echo "Nama : Ibnu Rusdianto" . PHP_EOL;
echo "Nrp : 203040012" . PHP_EOL;
echo "Kelas : B" . PHP_EOL;

echo "===== OUTPUT HASIL ===== \n";
echo "Hasil Query 1 adalah : " . $hasil_query1 . PHP_EOL;
echo "Hasil Query 2 adalah : " . $hasil_query2 . PHP_EOL;
echo "Hasil Query 3 adalah : " . $hasil_query3 . PHP_EOL;


