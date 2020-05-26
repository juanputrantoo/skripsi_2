<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'c_general/home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['home'] = 'c_general/home';
$route['aboutus'] = 'c_general/aboutus';
$route['howitworks'] = 'c_general/howitworks';
$route['login'] = 'c_general/login';
$route['signup'] = 'c_general/signup';
$route['signup-PK'] = 'c_general/signupPK';
$route['signup-PL'] = 'c_general/signupPL';
$route['checkEmail'] = 'c_general/checkEmail';
$route['signup/pemberiKerja'] = 'c_general/createAkunPK';
$route['signup/pekerjaLepas'] = 'c_general/createAkunPL';
$route['signup/pekerjaLepas2'] = 'c_general/createAkunPL2';
$route['signup/pekerjaLepas3'] = 'c_general/createAkunPL3';
$route['signup/pekerjaLepas4'] = 'c_general/createAkunPL4';
$route['admin'] = 'c_general/loginAdmin';


$route['logout'] = 'c_login/logout';

// ----------------- ADMIN -----------------

$route['admin/login'] = 'c_login/loginAdmin';

$route['admin/daftarAdmin'] = 'c_admin/daftarAdmin';
$route['admin/daftarAdmin/tambah'] = 'c_admin/tambahAdmin';
$route['admin/daftarAdmin/delete/(:num)'] = 'c_admin/deleteAdmin/$1';

$route['admin/editAdmin/(:num)'] = 'c_admin/editAdmin/$1';
$route['admin/editAdmin/edit/(:num)'] = 'c_admin/submitEditAdmin/$1';

$route['admin/dashboard'] = 'c_admin/dashboard';
$route['admin/pengajuanAkunPK'] = 'c_admin/pengajuanAkunPK';
$route['admin/pengajuanAkunPK/detail/(:any)'] = 'c_admin/detailPengajuanAkunPK/$1';
$route['admin/validAkunPK'] = 'c_admin/validAkunPK';
$route['admin/validAkunPK/detail/(:any)'] = 'c_admin/detailValidAkunPK/$1';
$route['admin/suspendAkunPK'] = 'c_admin/suspendAkunPK';
$route['admin/suspendAkunPK/detail/(:any)'] = 'c_admin/detailSuspendAkunPK/$1';

$route['admin/pengajuanAkunBiodataPL'] = 'c_admin/pengajuanAkunBiodataPL';
$route['admin/pengajuanAkunBiodataPL/detail/(:any)'] = 'c_admin/detailPengajuanAkunBiodataPL/$1';
$route['admin/pengajuanAkunPekerjaanPL'] = 'c_admin/pengajuanAkunPekerjaanPL';
$route['admin/pengajuanAkunPekerjaanPL/detail/(:any)'] = 'c_admin/detailPengajuanAkunPekerjaanPL/$1';
$route['admin/validAkunPL'] = 'c_admin/validAkunPL';
$route['admin/validAkunPL/detail/(:any)'] = 'c_admin/detailValidAkunPL/$1';
$route['admin/suspendAkunPL'] = 'c_admin/suspendAkunPL';
$route['admin/suspendAkunPL/detail/(:any)'] = 'c_admin/detailSuspendAkunPL/$1';

$route['admin/kategoriPekerjaan'] = 'c_admin/kategoriPekerjaan';

$route['admin/penawaranPekerjaan'] = 'c_admin/penawaranPekerjaan';
$route['admin/penawaranPekerjaan/cariTanggal'] = 'c_admin/cariTanggalPenawaran';
$route['admin/kontrakPekerjaan'] = 'c_admin/kontrakPekerjaan';
$route['admin/kontrakPekerjaan/cariTanggal'] = 'c_admin/cariTanggalKontrak';

$route['admin/cetak/(:any)'] = 'c_admin/cetak/$1';


$route['admin/terimaPK/(:any)'] = 'c_admin/terimaPK/$1';
$route['admin/tolakPK/(:any)'] = 'c_admin/tolakPK/$1';
$route['admin/suspendPK/(:any)'] = 'c_admin/suspendPK/$1';
$route['admin/unSuspendPK/(:any)'] = 'c_admin/unSuspendPK/$1';

$route['admin/terimaPL/(:any)'] = 'c_admin/terimaPL/$1';
$route['admin/tolakPL/(:any)'] = 'c_admin/tolakPL/$1';
$route['admin/terimaPekerjaanPL/(:any)'] = 'c_admin/terimaPekerjaanPL/$1';
$route['admin/tolakPekerjaanPL/(:any)'] = 'c_admin/tolakPekerjaanPL/$1';
$route['admin/suspendPL/(:any)'] = 'c_admin/suspendPL/$1';
$route['admin/unSuspendPL/(:any)'] = 'c_admin/unSuspendPL/$1';


$route['admin/kategoriPekerjaan/create'] = 'c_admin/createKategoriPekerjaan';
$route['admin/kategoriPekerjaan/delete(:num)'] = 'c_admin/deleteKategoriPekerjaan/$1';




$route['user/login'] = 'c_login/login';

// ----------------- PEMBERI KERJA -----------------
$route['pk/home'] = 'c_pemberiKerja/home';

$route['pk/profile/(:any)'] = 'c_pemberiKerja/profile/$1';
$route['pk/profile/editFotoProfil/(:any)'] = 'c_pemberiKerja/editFotoProfil/$1';
$route['pk/profile/edit/(:any)'] = 'c_pemberiKerja/editProfile/$1';
$route['pk/profile/editAkun/(:any)'] = 'c_pemberiKerja/editAkun/$1';

$route['pk/riwayatPenawaran/(:any)'] = 'c_pemberiKerja/riwayatPenawaran/$1';
$route['pk/riwayatPenawaran/cariTanggal/(:any)'] = 'c_pemberiKerja/cariTanggalPenawaran/$1';
$route['pk/riwayatKontrak/(:any)'] = 'c_pemberiKerja/riwayatKontrak/$1';
$route['pk/riwayatKontrak/cariTanggal/(:any)'] = 'c_pemberiKerja/cariTanggalKontrak/$1';

$route['pk/cariPekerja'] = 'c_pemberiKerja/cariPekerja';
$route['pk/cariPekerja/(:any)'] = 'c_pemberiKerja/cariPekerja/$1';
$route['pk/searchCariPekerja'] = 'c_pemberiKerja/searchCariPekerja';

$route['pk/cariPekerja/overview/(:any)'] = 'c_pemberiKerja/detailOverview/$1';
$route['pk/cariPekerja/portofolio/(:any)'] = 'c_pemberiKerja/detailPortofolio/$1';
$route['pk/cariPekerja/pengalaman/(:any)'] = 'c_pemberiKerja/detailPengalaman/$1';
$route['pk/cariPekerja/komentar/(:any)'] = 'c_pemberiKerja/detailKomentar/$1';

$route['pk/penawaran/baru'] = 'c_pemberiKerja/penawaranBaru';
$route['pk/penawaran/terima'] = 'c_pemberiKerja/penawaranTerima';
$route['pk/penawaran/kontrak'] = 'c_pemberiKerja/penawaranKontrak';

$route['pk/penawaran/terima/buatKontrak/(:any)'] = 'c_pemberiKerja/buatKontrak/$1';

$route['pk/cariPekerja/createTawaran/(:any)'] = 'c_pemberiKerja/createTawaran/$1';
$route['pk/penawaran/cancelTawaran/(:num)'] = 'c_pemberiKerja/cancelTawaran/$1';

$route['pk/penawaran/createKontrak/(:any)/(:num)'] = 'c_pemberiKerja/createKontrak/$1/$2';

$route['pk/cetak/(:num)'] = 'c_pemberiKerja/cetak/$1';
$route['pk/riwayatKontrak/komentar/(:num)'] = 'c_pemberiKerja/createKomentar/$1';


// ----------------- PEKERJA LEPAS -----------------

// --- TEMP ---
$route['tempPL/home'] = 'c_tempPekerjaLepas/home';
$route['tempPL/already'] = 'c_tempPekerjaLepas/already';
$route['tempPL/suspend'] = 'c_tempPekerjaLepas/suspend';
$route['tempPL/home/isiPekerjaan'] = 'c_tempPekerjaLepas/isiPekerjaan';
$route['tempPL/createPekerjaan/(:any)'] = 'c_tempPekerjaLepas/createPekerjaan/$1';
$route['tempPL/home/isiHarga'] = 'c_tempPekerjaLepas/isiHarga';
$route['tempPL/createHarga/(:any)'] = 'c_tempPekerjaLepas/createHarga/$1';


// --- VALID ---
$route['pl/home'] = 'c_pekerjaLepas/home';

$route['pl/profileDiri/(:any)'] = 'c_pekerjaLepas/profile_diri/$1';
$route['pl/profileDiri/edit/(:any)'] = 'c_pekerjaLepas/profile_diri_edit/$1';
$route['pl/editFotoProfil/(:any)'] = 'c_pekerjaLepas/edit_foto_profil/$1';
$route['pl/editDiri/(:any)'] = 'c_pekerjaLepas/edit_diri/$1';

$route['pl/profileKategori/(:any)'] = 'c_pekerjaLepas/profile_kategori/$1';
$route['pl/deleteKategori/(:any)'] = 'c_pekerjaLepas/delete_kategori/$1';
$route['pl/profileKategori/edit/(:any)'] = 'c_pekerjaLepas/profile_kategori_edit/$1';
$route['pl/editHarga'] = 'c_pekerjaLepas/edit_harga';
$route['pl/tambahKategori'] = 'c_pekerjaLepas/tambah_kategori';

$route['pl/profilePortofolio/(:any)'] = 'c_pekerjaLepas/profile_portofolio/$1';
$route['pl/profilePortofolio/edit/(:any)'] = 'c_pekerjaLepas/profile_portofolio_edit/$1';
$route['pl/addPortofolio'] = 'c_pekerjaLepas/add_portofolio';
$route['pl/deletePortofolio/(:any)'] = 'c_pekerjaLepas/delete_portofolio/$1';

$route['pl/cariPekerja'] = 'c_pekerjaLepas/cariPekerja';
$route['pl/cariPekerja/(:any)'] = 'c_pekerjaLepas/cariPekerja/$1';
$route['pl/searchCariPekerja'] = 'c_pekerjaLepas/searchCariPekerja';

$route['pl/cariPekerja/overview/(:any)'] = 'c_pekerjaLepas/detailOverview/$1';
$route['pl/cariPekerja/portofolio/(:any)'] = 'c_pekerjaLepas/detailPortofolio/$1';
$route['pl/cariPekerja/pengalaman/(:any)'] = 'c_pekerjaLepas/detailPengalaman/$1';
$route['pl/cariPekerja/komentar/(:any)'] = 'c_pekerjaLepas/detailKomentar/$1';

$route['pl/riwayatPenawaran/(:any)'] = 'c_pekerjaLepas/riwayatPenawaran/$1';
$route['pl/riwayatPenawaran/cariTanggal/(:any)'] = 'c_pekerjaLepas/cariTanggalPenawaran/$1';
$route['pl/riwayatKontrak/(:any)'] = 'c_pekerjaLepas/riwayatKontrak/$1';
$route['pl/riwayatKontrak/cariTanggal/(:any)'] = 'c_pekerjaLepas/cariTanggalKontrak/$1';

$route['pl/tawaran/masuk'] = 'c_pekerjaLepas/tawaranMasuk';
$route['pl/tawaran/terima'] = 'c_pekerjaLepas/tawaranTerima';
$route['pl/tawaran/terima/cancel/(:num)'] = 'c_pekerjaLepas/cancelTawaran/$1';
$route['pl/tawaran/masuk/tolak/(:num)'] = 'c_pekerjaLepas/tolakTawaranMasuk/$1';
$route['pl/tawaran/masuk/terima/(:num)'] = 'c_pekerjaLepas/terimaTawaranMasuk/$1';
$route['pl/tawaran/kontrak'] = 'c_pekerjaLepas/tawaranKontrak';
$route['pl/tawaran/kontrak/terima/(:num)'] = 'c_pekerjaLepas/terimaKontrak/$1';

$route['pl/cetak/(:num)'] = 'c_pekerjaLepas/cetak/$1';