<?php
// Fungsi untuk menerima input array dan target dari pengguna
function inputArrayAndTarget() {
    // Meminta input panjang array
    echo "Masukkan panjang array: ";
    $length = (int) trim(fgets(STDIN));
    
    // Inisialisasi array
    $arr = [];
    
    // Meminta input untuk setiap elemen array
    for ($i = 0; $i < $length; $i++) {
        echo "Masukkan array $i: ";
        $arr[$i] = (int) trim(fgets(STDIN));
    }
    
    // Meminta input target
    echo "Masukkan target: ";
    $target = (int) trim(fgets(STDIN));
    
    return [$arr, $target];
}

// Fungsi untuk menemukan pasangan indeks yang menjumlahkan target
function findPairs($arr, $target) {
    // Inisialisasi array untuk menyimpan hasil pasangan indeks
    $result = [];
    
    // Loop untuk menemukan pasangan yang menjumlahkan target
    for ($i = 0; $i < count($arr); $i++) {
        for ($j = $i + 1; $j < count($arr); $j++) {
            if ($arr[$i] + $arr[$j] == $target) {
                $result[] = [$i, $j];  // Simpan pasangan indeks
            }
        }
    }
    
    // Jika tidak ada pasangan yang ditemukan
    if (empty($result)) {
        return "Tidak ada pasangan indeks yang menghasilkan penjumlahan target.";
    }
    
    // Mengembalikan hasil
    return $result;
}

// Main Program
list($arr, $target) = inputArrayAndTarget();  // Mendapatkan input dari pengguna
$result = findPairs($arr, $target);           // Mencari pasangan indeks

// Menampilkan hasil
if (is_array($result)) {
    foreach ($result as $pair) {
        echo "[" . implode(", ", $pair) . "]\n";
    }
} else {
    echo $result;  // Menampilkan pesan jika tidak ada pasangan ditemukan
}
?>
