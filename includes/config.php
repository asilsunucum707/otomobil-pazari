<?php
// Veritabanı bağlantı bilgileri
$host = "localhost";
$dbname = "otomobil_pazari";
$username = "otomobilpazari_user";
$password = "secure_password_here";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    error_log("Veritabanı bağlantı hatası: " . $e->getMessage());
}

// Site ayarları
$ayar = [
    'siteadres' => 'https://ayazcars.com/',
    'sayfa_baslik' => 'Ayaz Cars - Araç Alım Satım',
    'sayfa_anahtar' => 'otomobil, araç alım satım, ikinci el, ekspertiz, araç değerleme, ayaz cars',
    'firma_tel' => '+90 555 123 4567',
    'firma_email' => 'info@ayazcars.com',
    'firma_adres' => 'Merkez Mah. Otomobil Cad. No:123 Beşiktaş/İstanbul',
    'firma_whatsapp' => '+905551234567',
    'sosyal_facebook' => 'https://facebook.com/ayazcars',
    'sosyal_instagram' => 'https://instagram.com/ayazcars',
    'sosyal_twitter' => 'https://twitter.com/ayazcars',
    'sosyal_youtube' => 'https://youtube.com/ayazcars',
];

// Link Helper Function
function generateLink($localFile, $productionPath = '') {
    global $ayar;
    
    if (strpos($_SERVER['HTTP_HOST'] ?? '', 'localhost') !== false) {
        return $localFile;
    } else {
        $baseUrl = $ayar['siteadres'] ?? '/';
        return $baseUrl . $productionPath;
    }
}

// Fiyat formatlamak için helper fonksiyon
function formatPrice($price) {
    return number_format($price, 0, ',', '.') . ' ₺';
}
?>