<?php

use App\Http\Controllers\PenitipController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\HampersController;
use App\Http\Controllers\PembelianBahanBakuController;
use App\Http\Controllers\PengeluaranLainController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ProdukHomeController;
use App\Http\Controllers\DetilPesananController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\KonfirmasiProsesController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\KonfirmasiSaldoController;
use App\Http\Controllers\listBahanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PresensiKaryawanController;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


Route::get('/', function () {
    return view('/homePage');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');

Route::get('logout', [LoginController::class, 'actionLogout'])->name('actionLogout')->middleware('auth');
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionRegister'])->name('actionRegister');
Route::get('register/verify/{verify_key}', [RegisterController::class, 'verify'])->name('verify');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');


Route::get('/admin', function () {
    return view('admin/dashboardPage');
});

Route::get('/mo', function () {
    return view('mo/dashboardPage');
});

Route::get('/owner', function () {
    return view('owner/dashboardPage');
});

Route::get('/loginAdmin', function () {
    return view('admin/loginAdminPage');
});

Route::get('/produkHome', function () {
    return view('/produk');
});

Route::get('/gambar', function () {
    return view('customer/pembayaran/buktiUpload');
});

// Route::get('/customer_admin', function () {
//     return view('admin/dataCustomer/index');
// });

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

Route::get('/gantiPasswordview', function () {
    $currentUrl1 = URL::previous();
    $currentUrl = substr($currentUrl1, strrpos($currentUrl1, '/') + 1);
    return view('changeRolePassword', compact('currentUrl'));
});

Route::resource('/user', UserController::class);
Route::get('/userProfile', 'App\Http\Controllers\UserController@userProfile')->name('user.userProfile');
Route::get('/userProfile/{id}/HistoryPemesanan', 'App\Http\Controllers\UserController@historypesanan')->name('user.historypesanan');
Route::get('/userProfile/{id}/daftarpesanancust', 'App\Http\Controllers\UserController@daftarpesanancust')->name('user.daftarpesanancust');
Route::get('/userProfile/{id}/uploadPage', 'App\Http\Controllers\UserController@uploadPage')->name('user.uploadPage');
Route::post('/userProfile/{id}/uploadBukti', 'App\Http\Controllers\UserController@uploadBukti')->name('user.uploadBukti');

Route::post('/gantiPasswordview/gantiPassword/{role}', 'App\Http\Controllers\KaryawanController@changepassword')->name('karyawan.changepassword');


Route::get('/produk/createTitipan', 'App\Http\Controllers\ProdukController@createTitipan')->name('produk.createTitipan');
Route::resource('/customer_admin', DetilPesananController::class);
Route::resource('/produk', ProdukController::class);
Route::resource('/hampers', HampersController::class);
Route::resource('/beliBahan', PembelianBahanBakuController::class);
Route::resource('/bahan_baku', BahanBakuController::class);
Route::resource('/penitip', PenitipController::class);
Route::resource('/pengeluaran_lain', PengeluaranLainController::class);
Route::resource('/karyawan', KaryawanController::class);
Route::resource('/resep', ResepController::class);
Route::resource('/konfirmasiProses', KonfirmasiProsesController::class);
Route::resource('/produkHome', ProdukHomeController::class);
Route::resource('/detil_pesanan', DetilPesananController::class);
Route::resource('/terimaPesanan', KonfirmasiController::class);
Route::resource('/terimaPesanan1', listBahanController::class);
Route::resource('/pesanan', 'App\Http\Controllers\PesananController');
Route::get('/terimaPesanan/updateStatus/{id}', 'App\Http\Controllers\KonfirmasiController@updateStatus')->name('terimaPesanan.updateStatus');
Route::get('/terimaPesanan/updateStatusN/{id}', 'App\Http\Controllers\KonfirmasiController@updateStatusN')->name('terimaPesanan.updateStatusN');
Route::get('/pesanan/pesanProduk/{id}', 'App\Http\Controllers\PesananController@pesanProduk')->name('pesanan.pesanProduk');

Route::get('/inputjarak', 'App\Http\Controllers\PesananController@toInputJarakIndex')->name('inputJarakPesanan.index');
Route::get('/inputjarak/{id}/edit', 'App\Http\Controllers\PesananController@editjarak')->name('pesanan.inputJarakPesanan');
Route::put('/inputjarak/{id}/update', 'App\Http\Controllers\PesananController@updatejarak')->name('pesanan.updateJarakPesanan');


Route::get('/shopping-cart', [DetilPesananController::class, 'ProdukCart'])->name('shopping.cart');
Route::get('/product/{id}', [DetilPesananController::class, 'addProduktoCart'])->name('addproduk.to.cart');
Route::patch('/update-shopping-cart', [DetilPesananController::class, 'updateCart'])->name('update.sopping.cart');
Route::delete('/delete-cart-product', [DetilPesananController::class, 'deleteProduct'])->name('delete.cart.product');

Route::post('/process-order/{orderId}', 'App\Http\Controllers\KonfirmasiProsesController@processOrder')->name('process.order');

Route::get('/laporan/stokBahan', [LaporanController::class, 'stokBahan'])->name('laporan.stokBahan');
Route::get('/laporan/penjualanProduk', [LaporanController::class, 'penjualanProduk'])->name('laporan.penjualanProduk');
Route::get('/laporan/presensi', [LaporanController::class, 'presensi'])->name('laporan.presensi');
Route::get('/laporan/penitip', [LaporanController::class, 'penitip'])->name('laporan.penitip');
Route::get('/laporan/bulanan', [LaporanController::class, 'pemasukan'])->name('laporan.pemasukan');
Route::get('/laporan/penjualanKeseluruhan', [LaporanController::class, 'penjualanKeseluruhan'])->name('laporan.penjualanKeseluruhan');


Route::resource('/saldo', KonfirmasiSaldoController::class);
Route::get('/saldo/updateStatus/{id}', 'App\Http\Controllers\KonfirmasiSaldoController@updateStatus')->name('saldo.updateStatus');
Route::get('/saldo/updateStatusN/{id}', 'App\Http\Controllers\KonfirmasiSaldoController@updateStatusN')->name('saldo.updateStatusN');
