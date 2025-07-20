<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Exports\LeadExport;
use Maatwebsite\Excel\Facades\Excel;
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

//-------------------------------------HOME ROUTES---------------------------
Route::get('/login', [HomeController::class, 'Login'])->name('login');
Route::get('/', [HomeController::class, 'Home'])->name('home');
Route::post('add-leads', [HomeController::class,'AddLeads'])->name('home.add');
//-------------------------------------LEADS ROUTE-----------------------------
Route::middleware(['admin'])->group(function () {

//-------------------Export Lead Data-------------------------
    Route::get('/export-leads', function () {
        return Excel::download(new LeadExport, 'Leads.xlsx');
    })->name('lead.export');

    Route::get('/add-leads', [LeadsController::class,'Home'])->name('lead.form');
    Route::post('/add-leads-data', [LeadsController::class,'AddLeads'])->name('lead.insert');
    Route::get('/lead-list', [LeadsController::class,'LeadsList'])->name('lead.list');
    Route::get('/edit-lead/{id}', [LeadsController::class,'EditLead'])->name('lead.edit');
    Route::get('/delete-lead/{id}', [LeadsController::class,'delete'])->name('lead.delete');
    Route::post('/filter', [LeadsController::class,'filter'])->name('lead.filter');
    Route::put('/edit/{id}', [LeadsController::class,'Edit'])->name('lead.Edit');
    Route::post('/add-comment', [LeadsController::class,'addComment'])->name('lead.addComment');
});

//---------------------------------COMMENT ROUTE----------------------------------------
Route::middleware(['admin'])->group(function () {

    Route::delete('comment-delete/{id}', [CommentController::class,'destroy'])->name('comment.destroy');
    Route::put('/edit-comment/{id}', [CommentController::class,'edit'])->name('comment.edit');
});


//----------------------ADMIN ROUTES---------------------------------------------
Route::post('/verify', [AdminController::class, 'LoginVerify'])->name('adminVerify');

Route::middleware(['admin'])->group(function () {
    Route::get('/system', [AdminController::class, 'Home'])->name('system');
    Route::post('/add-admin',[AdminController::class,'AddData'])->name('adminAdd');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/security/{id}', [AdminController::class, 'DelAdmin'])->name('deladmin');
});
