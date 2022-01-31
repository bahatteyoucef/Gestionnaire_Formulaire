<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\GroupeQuestionController;
use App\Http\Controllers\FormulaireGroupeQuestionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\POSController;

Route::get('/', [FormulaireController::class, 'index']);

Route::resource('formulaires', FormulaireController::class);

Route::prefix('formulaires/{id_formulaire}')->group(function () {
    Route::get('/activateDesactivate'           ,   [FormulaireController::class, 'formulaireActivateDisactivate'])         ->name('formulaire.activateDisactivate');
    Route::get('/visualisation'                 ,   [FormulaireController::class, 'visualisation'])                         ->name('formulaire.visualisation');
    Route::get('/mobilevisualisation'           ,   [FormulaireController::class, 'mobileVisualisation'])                         ->name('formulaire.mobilevisualisation');

    Route::get('/groupes'           ,   [FormulaireController::class, 'formulaireGroupes'])         ->name('formulaire_groupes.index');
    Route::get('/groupes/create'    ,   [FormulaireController::class, 'formulaireGroupesCreate'])   ->name('formulaire_groupes.create');
    Route::post('/groupes/store'    ,   [FormulaireController::class, 'formulaireGroupesStore'])    ->name('formulaire_groupes.store');

    Route::get('/questions'                                         ,   [FormulaireController::class, 'formulaireQuestions'])                       ->name('formulaire_questions.index');
    Route::get('/questions/create'                                  ,   [FormulaireController::class, 'formulaireQuestionsCreate'])                 ->name('formulaire_questions.create');
    Route::post('/questions/store'                                  ,   [FormulaireController::class, 'formulaireQuestionsStore'])                  ->name('formulaire_questions.store');
    Route::get('/questions/{id_question}/activateDesactivate'       ,   [FormulaireController::class, 'formulaireQuestionsActivateDisactivate'])  ->name('formulaire_questions.activateDisactivate');

    Route::prefix('groupes/{id_groupe}')->group(function () {
        
        Route::get('/edit'                  ,   [FormulaireController::class, 'formulaireGroupesEdit'])                 ->name('formulaire_groupes.edit');
        Route::post('/update'               ,   [FormulaireController::class, 'formulaireGroupesUpdate'])               ->name('formulaire_groupes.update');
        Route::post('/destory'              ,   [FormulaireController::class, 'formulaireGroupesDestroy'])              ->name('formulaire_groupes.destroy');
        Route::get('/activateDesactivate'   ,   [FormulaireController::class, 'formulaireGroupesActivateDisactivate'])  ->name('formulaire_groupes.activateDisactivate');

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
});

