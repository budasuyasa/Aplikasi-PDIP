<?php


use App\Models\Desa;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TokohController;
use App\Http\Controllers\BanjarController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KecamatanController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home',[
        "title"=>"Home Page"
    ]);
});


// Route Kabupaten
Route::get('/kabupaten',[KabupatenController::class,'index'])->name('Kabupaten');
Route::get('/tambahkab',[KabupatenController::class,'tambahkab'] )->name('tambahkab');
Route::post('/insertkab',[KabupatenController::class,'insertkab'] );
Route::get('/editkab/{id}',[KabupatenController::class, 'editkab'])->name('editkab');
Route::post('/updatekab/{id}',[KabupatenController::class, 'updatekab'])->name('updatekab');
Route::get('/hapuskab/{id}',[KabupatenController::class, 'hapuskab'])->name('hapuskab');
Route::get('/exportpdf',[KabupatenController::class,'exportpdf']);

//Route Kecamatan
Route::get('/kecamatan', [KecamatanController::class , 'index'])->name('kecamatan.index');
Route::get('/kabupaten/kecamatan/{kabupaten:id}', function(Kabupaten $kabupaten){
    
    return view('kecamatan',[
        'title'=> 'Kecamatan Of ' . $kabupaten->nama,
        'kec'=>$kabupaten->kecamatan->all(),
        'kab'=>$kabupaten->all(),
        Session::put('kab.kec',request()->fullUrl())
    ]);
})->name('kecamatan.kab');
Route::get('/kabupaten/desa/{kabupaten:id}', function(Kabupaten $kabupaten){
    
    return view('desa',[
        'title'=> 'Desa Of ' . $kabupaten->nama,
        'desa'=>$kabupaten->desa->all(),
        'kab'=>$kabupaten->all()
    ]);
})->name('desa.kab');
Route::get('/kabupaten/banjar/{kabupaten:id}', function(Kabupaten $kabupaten){
    
    return view('banjar',[
        'title'=> 'Banjar Of ' . $kabupaten->nama,
        'banjar'=>$kabupaten->banjar->all(),
        'kab'=>$kabupaten->all()
    ]);
})->name('banjar.kab');

Route::get('/listkec',[KecamatanController::class, 'index'])->name('listkec');  
Route::get('/filterlistkec',[KecamatanController::class, 'filterlistkec'])->name('filterliskec');           
Route::get('kecamatan/search',[KecamatanController::class,'search'])->name('kecamatan.search');

Route::get('/tambahkec/{kabupaten:id}',function(Kabupaten $kabupaten){
    return view('tambahkec',[
        'title'=>'Tambah Kecamatan ' . $kabupaten->nama,
        'data'=>$kabupaten
    ]);
} );
Route::get('/tambahlistkec',function(){
    return view('tambahlistkec',[
        'title'=>'Tambah Kecamatan ',
        'kec'=>Kecamatan::all(),
        'kab'=>Kabupaten::all()
    ]);
} );
Route::post('/insertlistkec',[KecamatanController::class, 'insertlistkec']);
Route::post('/insertkec',[KecamatanController::class, 'insertkec']);
Route::get('/desa/{kecamatan:nama}',function(Kecamatan $kecamatan){
    return view('desa',[
        'title'=>'Desa Of ' . $kecamatan->nama,
        'desa'=>$kecamatan->desa->all(),
        'data'=>$kecamatan->all()
    ]);
});
Route::get('/banjar/{kecamatan:nama}',function(Kecamatan $kecamatan){
    return view('banjar',[
        'title'=>'Banjar Of ' . $kecamatan->nama,
        'banjar'=>$kecamatan->banjar->all()
    ]);
});
Route::get('/hapuskec/{id}', [KecamatanController::class, 'deletekec']);
Route::get('/editkec/{id}',[KecamatanController::class, 'editkec'])->name('editkec');
Route::post('/updatekec/{id}',[KecamatanController::class, 'updatekec']);
Route::get('/kecdetail/{id}',[KecamatanController::class, 'kecdetail']);


// Desa
Route::get('/tambahdesa/{kecamatan:id}',function (Kecamatan $kecamatan){
        return view('tambahdesa',[
            'title'=> 'Tambah Desa Di Kecamatan ' . $kecamatan->nama,
            'data'=>$kecamatan
        ]);
});

Route::get('/desa/banjar/{desa:id}',function(Desa $desa){
    return view('banjar',[
        'title' => 'Banjar',
        'banjar'=>$desa->banjar->all()
    ]);
} )->name('desa.banjar');
Route::post('/insertdesa',[DesaController::class,'insertdesa']);
Route::get('/hapusdesa/{id}',[DesaController::class,'hapusdesa'])->name('hapusdesa');
Route::get('/editdesa/{id}',[DesaController::class, 'editdesa'])->name('editdesa');
Route::post('/updatedesa/{id}',[DesaController::class, 'updatedesa'])->name('updatedesa');

// LIST DESA
Route::get('/listdesa',[DesaController::class,'index'])->name('listdesa');
Route::get('/tambahlistdesa',[DesaController::class, 'tambahlistdesa'])->name('tambahlistdesa');
Route::post('/insertlistdesa',[DesaController::class, 'insertlistdesa'])->name('insertlistdesa');
Route::get('/editlistdesa/{id}',[DesaController::class, 'editlistdesa'])->name('editlistdesa');
Route::post('/updatelistdesa/{id}',[DesaController::class, 'updatelistdesa'])->name('updatelistdesa');
Route::get('/hapuslistdesa/{id}',[DesaController::class, 'hapuslistdesa'])->name('hapuslistdesa');

// Banjar
Route::get('/listbanjar',[BanjarController::class,'index'])->name('listbanjar');
Route::get('/tambahbanjar/{desa:id}',function(Desa $desa){
    return view('tambahbanjar',[
        'title'=>'Tambah Banjar',
        'data'=>$desa
    ]);
});
Route::post('/insertbanjar',[BanjarController::class,'insertbanjar']);
Route::get('/deletebanjar/{id}',[BanjarController::class,'deletebanjar']);
Route::get('/editbanjar/{id}',[BanjarController::class,'editbanjar']);
Route::post('/updatebanjar/{id}',[BanjarController::class,'updatebanjar']);


Route::get('/tambahlistbanjar',function (){
    return view('tambahlistbanjar',[
        'title'=> 'Tambah Banjar',
        'kab'=>Kabupaten::get(),
        'kec'=>Kecamatan::get(),
        'desa'=>Desa::get()
    ]);
});
Route::post('/insertlistbanjar',[BanjarController::class,'insertlistbanjar']);
Route::get('/deletelistbanjar/{id}',[BanjarController::class,'deletelistbanjar'])->name('deletelistbanjar');


// Tokoh
Route::get('/listtokoh',[TokohController::class,'index'])->name('listtokoh');
Route::get('/tambahlisttokoh',[TokohController::class,'tambahlisttokoh'])->name('tambahlisttokoh');
Route::post('/insertlisttokoh',[TokohController::class,'insertlisttokoh'])->name('insertlisttokoh');
Route::get('/deletelisttokoh/{id}',[TokohController::class,'deletelisttokoh'])->name('deletelisttokoh');
Route::get('/editlisttokoh/{id}',[TokohController::class,'editlisttokoh'])->name('editlisttokoh');
Route::post('/updatelisttokoh/{id}',[TokohController::class,'updatelisttokoh'])->name('updatelisttokoh');



// AUTH
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); //middleware untuk mencegah user yg sudah terauthentikasi untuk login lagi
Route::post('/login', [LoginController::class, 'loginauth']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');//middleware untuk mencegah user yg sudah terauthentikasi untuk register lagi
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LoginController::class, 'logout']);