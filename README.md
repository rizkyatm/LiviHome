# Panduan Instalasi LiviHome

## Persyaratan
Sebelum memulai, pastikan Anda memiliki:
- **XAMPP** terinstal di komputer Anda
- **Database MySQL** yang berjalan melalui XAMPP
- **File proyek** LiviHome
- **File database** (`db_ecommerce.sql`)

## Langkah-langkah Instalasi
### 1. Menempatkan Folder Proyek
Pindahkan folder proyek **LiviHome** ke dalam direktori berikut:
```
C:\xampp\htdocs\LiviHome
```

### 2. Mengimpor Database
1. Buka **XAMPP Control Panel** dan pastikan **Apache** serta **MySQL** sudah berjalan.
2. Buka browser dan akses **phpMyAdmin** melalui:
```
http://localhost/phpmyadmin/
```
3. Buat database baru dengan nama **db_ecommerce**.
4. Klik **Import**, pilih file `db_ecommerce.sql`, lalu tekan **Go** untuk mengimpor database.

### 3. Menjalankan Proyek
Buka browser dan akses proyek melalui URL berikut:
```
http://localhost/LiviHome/index.php
```

Jika semua langkah di atas telah dilakukan dengan benar, proyek **LiviHome** seharusnya dapat berjalan di lingkungan lokal Anda.
akan tanyakan di forum atau repository GitHub proyek ini.
