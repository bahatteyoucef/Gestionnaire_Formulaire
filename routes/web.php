<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\POSController;

use App\Http\Controllers\Auth\LogoutController;

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\StatsController;

// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 

Route::get('clear_cache', function () {
	/* php artisan migrate */
    Artisan::call('cache:clear');
    dd("Done");
});

// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 

// Auth

    Auth::routes();

    Route::get('/admin_login'   ,   function()  {   return view('auth.admin_login');   });    
    Route::post('/admin_login'  ,   [LoginController::class, 'authenticate'])                           ->name('admin_login');

    Route::get('/user'          ,   function()  {   dd(Auth::user());   });
    Route::get('/logout'        ,   [LogoutController::class, 'logout_user'])                           ->name('logout_user');

    // Google URL
    Route::get('public/login/google'           ,   [GoogleController::class, 'redirectToGoogle'])       ->name('google_login');
    Route::get('public/login/google/callback'  ,   [GoogleController::class, 'handleGoogleCallback']);

//

// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 

//

// Android
    Route::get('mobile'  ,   [MobileController::class, 'index'])                                        ->name('mobile_index');
//

// // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // 

//Dashboard

Route::group(['middleware' => ['auth']], function() {

    //Home
    Route::get('/'      ,   [FormulaireController::class, 'index']);
    Route::get('/home'  ,   [FormulaireController::class, 'index']);

    //Evaluations
    Route::resource('evaluations'                       ,   EvaluationController::class);
    Route::get('evaluations/{id_evaluation}/{valeur}'   ,   [EvaluationController::class,'addEvaluation'])  ->name('add_evaluation');

    //Stats
    Route::get('/stats/formulaire/{id_formulaire}'      ,   [StatsController::class,'statistiques'])        ->name('formulaire.stats');
    Route::get('/stats/questions/{id_question}'           ,   [StatsController::class,'questionStats'])       ->name('get_stats');
    
    //Formulaires
    Route::resource('formulaires', FormulaireController::class);

    Route::prefix('formulaires/{id_formulaire}')->group(function () {
        
        //Activer Disactiver formulaire
        Route::get('/activateDesactivate'           ,   [FormulaireController::class, 'formulaireActivateDisactivate'])         ->name('formulaire.activateDisactivate');
        
        //Visualiser
        Route::get('/visualisation'                 ,   [FormulaireController::class, 'visualisation'])                         ->name('formulaire.visualisation');
        
        //Reponses
        Route::get('/reponses'                      ,   [FormulaireController::class, 'reponses'])                              ->name('formulaire.reponses');

        //Visualiser
        Route::get('/mobilevisualisation'           ,   [FormulaireController::class, 'mobileVisualisation'])                   ->name('formulaire.mobilevisualisation');

        //CRUD Groupe
        Route::get('/groupes'           ,   [FormulaireController::class, 'formulaireGroupes'])         ->name('formulaire_groupes.index');
        Route::get('/groupes/create'    ,   [FormulaireController::class, 'formulaireGroupesCreate'])   ->name('formulaire_groupes.create');
        Route::post('/groupes/store'    ,   [FormulaireController::class, 'formulaireGroupesStore'])    ->name('formulaire_groupes.store');

        //CRUD Question
        Route::get('/questions'                                         ,   [FormulaireController::class, 'formulaireQuestions'])                       ->name('formulaire_questions.index');
        Route::get('/questions/create'                                  ,   [FormulaireController::class, 'formulaireQuestionsCreate'])                 ->name('formulaire_questions.create');
        Route::post('/questions/store'                                  ,   [FormulaireController::class, 'formulaireQuestionsStore'])                  ->name('formulaire_questions.store');
        Route::get('/questions/{id_question}/activateDesactivate'       ,   [FormulaireController::class, 'formulaireQuestionsActivateDisactivate'])  ->name('formulaire_questions.activateDisactivate');

        Route::prefix('groupes/{id_groupe}')->group(function () {
            
            //CRUD Groupe
            Route::get('/edit'                  ,   [FormulaireController::class, 'formulaireGroupesEdit'])                 ->name('formulaire_groupes.edit');
            Route::post('/update'               ,   [FormulaireController::class, 'formulaireGroupesUpdate'])               ->name('formulaire_groupes.update');
            Route::post('/destory'              ,   [FormulaireController::class, 'formulaireGroupesDestroy'])              ->name('formulaire_groupes.destroy');
            
            //Activer Disactiver Groupe
            Route::get('/activateDesactivate'   ,   [FormulaireController::class, 'formulaireGroupesActivateDisactivate'])  ->name('formulaire_groupes.activateDisactivate');

            //CRUD Question
            Route::get('/questions'             ,   [FormulaireController::class    , 'formulaireGroupesQuestions'])                ->name('formulaire_groupes_questions.index');
            Route::get('/questions/create'      ,   [FormulaireController::class    , 'formulaireGroupesQuestionsCreate'])          ->name('formulaire_groupes_questions.create');
            Route::post('/questions/store'      ,   [FormulaireController::class    , 'formulaireGroupesQuestionsStore'])           ->name('formulaire_groupes_questions.store');
            Route::get('/questions/edit'        ,   [FormulaireController::class    , 'formulaireGroupesQuestionsEdit'])            ->name('formulaire_groupes_questions.edit');
            Route::post('/questions/update'     ,   [FormulaireController::class    , 'formulaireGroupesQuestionsUpdate'])          ->name('formulaire_groupes_questions.update');
            Route::post('/questions/destory'    ,   [FormulaireController::class    , 'formulaireGroupesQuestionsDestroy'])         ->name('formulaire_groupes_questions.destroy');
        });
    });

    Route::prefix('POS')->group(function () {

        Route::post('/store'                ,   [POSController::class, 'store'])                 ->name('POS.store');
        Route::get('/edit'                  ,   [POSController::class, 'edit'])                  ->name('POS.edit');
        Route::post('/update'               ,   [POSController::class, 'update'])                ->name('POS.update');
        Route::post('/destory'              ,   [POSController::class, 'destroy'])               ->name('POS.destroy');

        Route::prefix('/{id_pos}')->group(function () {
            Route::get('/achats'            ,   [POSController::class, 'achats'])               ->name('POS.achats');
            Route::get('/facings'           ,   [POSController::class, 'facings'])              ->name('POS.facings');
            Route::get('/frigos'            ,   [POSController::class, 'frigos'])               ->name('POS.frigos');
            Route::get('/plvinterieurs'     ,   [POSController::class, 'plvInterieurs'])        ->name('POS.plvInterieurs');
            Route::get('/plvexterieurs'     ,   [POSController::class, 'plvExterieurs'])        ->name('POS.plvExterieurs');
        });
    });

});

// 