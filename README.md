# Aplikasi Point of Sale

Aplikasi ini dibuat menggunakan :
1. Codeigniter 4.0.4
2. Boostrap 4
3. Fontawesome

Lalu ada beberapa fitur yang digunakan :
1. Manajemen User beserta hak akses
2. Fitur data pelanggan
3. Fitur data pemasok
4. fitur data produk
5. fitur transaksi
6. fitur laporan
7. fitur print, pdf, excel, csv menggunakan datatabels
8. fitur table menggunakan datatables
9. fitur menggunakan databales 
10. fitur searching
11. fitur filtering
12. fitur pie chart pada halaman dashboard admin

Untuk menggunakan database silahkan bisa menggunakan perintah berikut :
1. php spark migrate
2. Lalu ke folder app/Filters/Login.php
3. Lalu matikan perintah berikut ini :
if (!session()->has('isLoggedIn')) {
            return redirect()->to(site_url('login/index'));
        }
 pada function before, matikan terlebih dahulu fitur filtering
 4. Lalu silahkan arahkan url kalian ke localhost:8080/user
 5. Silahkan tambah data user untuk menggunakan fitur login 
 6. setelah ditambahkan data user untuk login silahkan kembali nyalakan perintah pada filter tadi.
 
 
 Aplikasi ini cocok untuk referensi sebagai pembelajaran. terimakasih
