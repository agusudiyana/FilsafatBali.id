@component('mail::message')
# Halo, {{ $name }}!

Terima kasih telah mendaftar sebagai **Penulis** di FilsafatBali.

Berikut adalah password acak untuk akun Anda:
@component('mail::panel')
**{{ $password }}**
@endcomponent

> **Catatan Penting:** Anda belum bisa langsung login. Akun Anda saat ini sedang dalam proses **verifikasi oleh Admin**. Anda akan menerima konfirmasi atau dapat mencoba login kembali setelah disetujui.

Salam,<br>
Tim FilsafatBali
@endcomponent