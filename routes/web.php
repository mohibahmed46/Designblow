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
|
*/

Route::get('/', 'authController@index');
Route::get('/signin', 'authController@signin');
Route::post('/signin', 'authController@signinSubmit');
Route::get('/logout', 'authController@logout');
Route::get('logout', 'authController@logout')->name('logout');

//Admin

    Route::middleware('adminAuth')->prefix('admin')->namespace('admin')->group(function(){

        Route::get('/', 'adminController@index')->name('admin.dashboard');

        Route::prefix('leads')->group(function(){
            Route::get('/', 'leadsController@index')->name('admin.leads');
            Route::get('/add', 'leadsController@add')->name('admin.leads.add');
            Route::post('/add', 'leadsController@addSubmit');
            Route::get('pending', 'leadsController@pendingLead')->name('admin.leads.pending');
            Route::get('mark/{id}', 'leadsController@markLead')->name('admin.leads.mark');
            Route::get('marked', 'leadsController@markedLead')->name('admin.leads.marked');
            Route::get('pegination', 'leadsController@pegination')->name('admin.leads.pegination');
            Route::get('filter', 'leadsController@filterLead')->name('admin.leads.filter');
            Route::post('filter', 'leadsController@filterLeadSubmit')->name('admin.leads.filter');

            Route::get('fresh', 'leadsController@freshLead')->name('admin.leads.fresh');
            Route::post('assignfresh', 'leadsController@assignfreshLead')->name('admin.leads.assign');
            Route::get('import', 'leadsController@importLead')->name('admin.leads.import');
            Route::post('importLead', 'leadsController@importedLead')->name('adminImport');

            Route::get('/details/{id}', 'leadsController@details');

            Route::get('/viewRemarks/{id}', 'leadsController@viewRemarks');
            Route::post('remarks', 'leadsController@viewRemarksSubmit')->name('admin.leads.response.remarks');

            Route::prefix('widget')->group(function(){

                Route::get('pending', 'leadsController@pendingWidget')->name('admin.leads.widget.pending');
                Route::get('marked', 'leadsController@markedWidget')->name('admin.leads.widget.marked');
                Route::get('total', 'leadsController@totalWidget')->name('admin.leads.widget.total');
            });

            Route::prefix('analytics')->group(function(){
                Route::get('analytics', 'analyticsController@analytics')->name('admin.leads.analytics');
            });

            Route::prefix('followup')->group(function(){
                Route::get('upcoming', 'leadsController@upcomingView')->name('admin.leads.followup.upcoming');
                Route::get('missed', 'leadsController@missedView')->name('admin.leads.followup.missed');
                Route::get('/followView/{id}', 'leadsController@followView');
                Route::post('followupDetailsSubmit', 'leadsController@followupDetailsSubmit')->name('admin.leads.response.followupDetails');
            });
        });

        //Categories
        Route::prefix('categories')->group(function(){

            Route::get('/', 'settingController@categories')->name('admin.setting.categories');
            Route::post('/add', 'settingController@addCatogery')->name('admin.settings.categories.add');
            Route::get('edit/{id}', 'settingController@editCatogery')->name('admin.settings.categories.edit');

            Route::post('/update', 'settingController@updateCatogery')->name('admin.settings.categories.update');
            Route::get('/delete/{id}', 'settingController@deleteCategory')->name('admin.settings.categories.delete');

        });

        //Users
        Route::prefix('users')->group(function(){
            Route::get('/', 'userController@index')->name('admin.users.alluser');
            Route::get('/delete/{id}', 'userController@deleteUser')->name('admin.users.alluser.delete');
            Route::get('addnew', 'userController@addNew')->name('admin.users.addnew');
            Route::post('/add', 'userController@addnewSubmit')->name('admin.users.post');
            Route::get('edit/{id}', 'userController@editUser')->name('admin.users.updateuser');
            // Route::post('/edit',[UserController::class,'updateUser'])->name('admin.users.updateUser');
            Route::post('edit', 'userController@updateUser')->name('admin.users.updateUser');
        });

    });

//Agent1

    Route::middleware('agent1Auth')->prefix('agent1')->namespace('agent1')->group(function(){

        Route::get('/', 'agentController@index')->name('agent1.leads.dashboard');

        Route::prefix('leads')->group(function(){
            Route::get('/details/{id}', 'leadsController@details');
            Route::get('add', 'leadsController@addLead')->name('agent1.leads.add');
            Route::post('/add', 'leadsController@addleadSubmit');
            Route::get('fresh', 'leadsController@agent1freshLead')->name('agent1.leads.fresh');
            Route::get('/viewRemarks/{id}', 'leadsController@viewRemarks');
            Route::post('remarks', 'leadsController@viewRemarksSubmit')->name('agent1.leads.response.remarks');
            Route::get('import', 'leadsController@importLead')->name('agent1.leads.import');
            Route::post('importLead', 'leadsController@importedLead')->name('agentImport');

            Route::prefix('widget')->group(function(){

                Route::get('total', 'leadsController@totalWidget')->name('agent1.leads.widget.total');
                Route::get('pending', 'leadsController@pendingWidget')->name('agent1.leads.widget.pending');
                Route::get('marked', 'leadsController@markedWidget')->name('agent1.leads.widget.marked');
                Route::get('fresh', 'leadsController@freshWidget')->name('agent1.leads.widget.fresh');
            });

        });
    });



//Agent2

    Route::middleware('agent2Auth')->prefix('agent2')->namespace('agent2')->group(function(){

        Route::get('/', 'agentController@index')->name('agent2.leads.dashboard');

        Route::prefix('leads')->group(function(){
            Route::get('/details/{id}', 'leadsController@details');
            Route::get('pending', 'leadsController@agent2pendingLead')->name('agent2.leads.pending');
            Route::get('/viewRemarks/{id}', 'leadsController@viewRemarks');
            Route::post('remarks', 'leadsController@viewRemarksSubmit')->name('agent2.leads.response.remarks');
            Route::get('marked', 'leadsController@markedLead')->name('agent2.leads.marked');
            Route::get('mark/{id}', 'leadsController@markLead')->name('agent2.leads.mark');

            Route::prefix('widget')->group(function(){

                Route::get('pending', 'leadsController@pendingWidget')->name('agent2.leads.widget.pending');
                Route::get('marked', 'leadsController@markedWidget')->name('agent2.leads.widget.marked');
                Route::get('total', 'leadsController@totalWidget')->name('agent2.leads.widget.total');
            });

            Route::prefix('analytics')->group(function(){
                Route::get('analytics', 'analyticsController@analytics')->name('agent2.leads.analytics');
            });

            Route::prefix('followup')->group(function(){
                Route::get('upcoming', 'followupController@upcomingView')->name('agent2.leads.followup.upcoming');
                Route::get('missed', 'followupController@missedView')->name('agent2.leads.followup.missed');
                Route::get('/followView/{id}', 'followupController@followView');
                Route::post('followupDetailsSubmit', 'followupController@followupDetailsSubmit')->name('agent2.leads.response.followupDetails');
            });


        });
    });