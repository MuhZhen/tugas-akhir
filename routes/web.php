<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|,'CekLevel:SuperAdmin,Relawan'
*/

Route::get('/', function () {
    return view('welcome');
})->name('halamandepan');

Route::get('/login-admin', 'LoginAdminController@TampilkanLogin');
Route::Post('/login-admin','LoginAdminController@postLogin');
Route::get('/login-admin/logout','loginAdminController@logout');

Route::group(['middleware'=>['auth:pengguna']],function(){
        Route::get('/admin-beranda','LoginAdminController@TampilkanAdmin');
        Route::get('admin/proses-alternatif','prosesAlternatifController@proses');
        Route::get('admin/proses-alternatif/detail','prosesAlternatifController@detailProses');
        
        Route::get('/admin/atur/kriteria','AdminKriteriaController@TampilkanKriteria');
        Route::get('/admin/atur/kriteria/tambah','AdminKriteriaController@TampilkanTambah');
        Route::post('/admin/atur/kriteria/tambah','AdminKriteriaController@TambahDataKriteria');
        Route::get('/admin/atur/kriteria/{id}/edit','AdminKriteriaController@TampilEditKriteria');
        Route::put('/admin/atur/kriteria/tambah/edit/{id}','AdminKriteriaController@UpdateKriteria');
        Route::delete('/admin/atur/kriteria/{id}','AdminKriteriaController@HapusKriteria');

        Route::get('/admin/atur/sub-kriteria','AdminSubKriteriaController@TampilkanSubKriteria')->name('sub');
        Route::get('/admin/atur/sub-kriteria/tambah','AdminSubkriteriaController@TampilkanTambahSubKriteria');
        Route::post('/admin/atur/sub-kriteria/tambah','AdminSubKriteriaController@TambahDataSubKriteria');
        Route::get('/admin/atur/sub-kriteria/{id}/edit','AdminSubKriteriaController@TampilEditSubKriteria');
        Route::put('/admin/atur/sub-kriteria/tambah/edit/{id}','AdminSubKriteriaController@UpdateSubKriteria');
        Route::delete('/admin/atur/sub-kriteria/{id}/hapus','AdminSubKriteriaController@HapusSubKriteria');


        Route::get('admin/atur/alternatif/relawan','alternatifCekController@TampilkanAlternatif')->name('nilai.verifikasi');
        Route::get('admin/atur/alternatif/{id}/editnilai/relawan','alternatifCekController@EditNilaiAlternatif');
        Route::post('admin/atur/alternatif/{id}/update/relawan','alternatifCekController@UpdateNilaiAlternatif')->name('nilai.relawan');

        Route::get('admin/atur/alternatif','AlternatifController@TampilkanAlternatif')->name('tambah.alternatif');
        Route::get('admin/atur/alternatif/tambah','AlternatifController@TampilkanTambahAlternatif');
        Route::post('admin/atur/alternatif/tambah','AlternatifController@TambahDataAlternatif');
        Route::get('admin/atur/alternatif/{id}/edit','AlternatifController@TampilEditAlternatif');
        Route::put('admin/atur/alternatif/tambah/edit/{id}','AlternatifController@UpdateAlternatif');
        Route::delete('admin/atur/alternatif/{id}/hapus','AlternatifController@HapusAlternatif');
        Route::post('admin/atur/alternatif/hapus/{id}', 'AlternatifController@destroy')->name('alternatif.hapus');
        Route::post('admin/atur/alternatif/semua/hapus','AlternatifController@hapusSemua');
        Route::get('admin/atur/alternatif/cari','AlternatifController@cari');

        Route::get('admin/atur/alternatif/{id}/nilaialternatif','NilaiAlternatifController@TambahNilaiAlternatif')->name('nilai.tambah');
        Route::post('admin/atur/alternatif/{id}/simpanalternatif','NilaiAlternatifController@SimpanNilai')->name('nilai.simpan');
        Route::get('admin/atur/alternatif/{id}/editnilai','NilaiAlternatifController@EditNilaiAlternatif');
        Route::post('admin/atur/alternatif/{id}/update','NilaiAlternatifController@UpdateNilaiAlternatif')->name('nilai.update');

        Route::get('admin/sekolah','prosesSekolahController@sekolah');
        Route::get('admin/sekolah/tambah','prosesSekolahController@tampiltambah');
        Route::post('admin/sekolah/tambah','prosesSekolahController@tambahdata');
        Route::delete('admin/sekolah/delete/{id}','prosesSekolahController@hapusdata');
        Route::get('admin/sekolah/edit/{id}','prosesSekolahController@editdata');
        Route::get('admin/sekolah/edit/password/{id}','prosesSekolahController@editpassword');
        Route::put('admin/sekolah/edit/simpan/{id}','prosesSekolahController@updatedata');
        Route::put('admin/sekolah/edit/simpan/password/{id}','prosesSekolahController@passwordsimpan');
        Route::get('admin/sekolah/cari','prosesSekolahController@cari');

        Route::get('admin/periode','periodeBantuan@tampilperiode');
        Route::delete('admin/periode/delete/{id}','periodeBantuan@hapusdata');
        Route::get('admin/periode/tampilEdit/{id}','periodeBantuan@tampilEdit');
        Route::post('admin/periode/tambahperiode','periodeBantuan@tambahdata');
        Route::put('admin/periode/tambahperiode/{id}','periodeBantuan@updatedata');

        Route::get('admin/permintaan','prosesPermintaanController@permintaan');
        Route::get('admin/permintaan/tampiltambah/{id}','prosesPermintaanController@tampiltambah');
        Route::post('admin/permintaan/tambah','prosesPermintaanController@tambahdata');
        Route::delete('admin/permintaan/delete/{id}','prosesPermintaanController@hapus');
        Route::get('admin/permintaan/tampilEdit/{id}','prosesPermintaanController@tampilEdit');
        Route::put('admin/permintaan/edit/simpan/{id}','prosesPermintaanController@updatedata');
        Route::get('admin/permintaan/tambah/tabel','prosesPermintaanController@tampilTambahTabel');
        Route::get('admin/permintaan/tambah/tabel/cari','prosesPermintaanController@cari');
        Route::get('admin/permintaan/cari','prosesPermintaanController@carisekolah');
        Route::post('admin/permintaan/semua/hapus','prosesPermintaanController@hapusSemua');
        Route::get('admin/permintaan/tampiltambahsemua','prosesPermintaanController@tambahSemua');
        Route::post('admin/permintaan/tambahSemua/simpan','prosesPermintaanController@simpanSemua');
    

        Route::get('admin/dataLokasi','dataLokasiController@lokasi');
        Route::get('admin/home/tampilmarker_detail', 'dataLokasiController@tampilmarker');

        Route::get('admin/{nama_sekolah}', 'dataLokasiController@detail_sekolah');
        
        Route::get('admin/lokasi/{id}/edit','dataLokasiController@edit');
        Route::put('admin/lokasi/ubahstatus','dataLokasiController@ubahStatus');


        Route::get('admin/atur/admin','adminController@tampiladmin');
        Route::get('admin/atur/tambah','adminController@tampiltambah');
        Route::post('admin/atur/tambah','adminController@tambahData');
        Route::delete('admin/atur/delete/{id}','adminController@hapusData');
        Route::get('admin/atur/edit/{id}','adminController@editData');
        Route::put('admin/atur/simpan/{id}','adminController@updateData');
        Route::get('admin/atur/edit/password/{id}','adminController@editpassword');
        Route::put('admin/atur/edit/simpan/password/{id}','adminController@passwordsimpan');
});

Route::get('/login-sekolah','LoginSekolahController@TampilkanLogin')->name('login');
Route::post('/postlogin','LoginSekolahController@postlogin');
Route::get('/logout','loginSekolahController@logout');

Route::get('/sekolah/daftar','LoginSekolahController@tampildaftar');

Route::post('/sekolah/daftar/tambah','daftarSekolah@tambahdata');



Route::group(['middleware'=>'auth'],function(){

    Route::get('/kondisi-sekolah','dashboardSekolah@tampilkanDashboard');
    Route::get('/kondisi-sekolah/pengaturan','dashboardSekolah@atur');
    Route::post('/kondisi-sekolah/tambah','dashboardSekolah@tambahdata');
    Route::put('kondisi-sekolah/pengaturan/simpanpassword','dashboardSekolah@simpanPassword');

});


