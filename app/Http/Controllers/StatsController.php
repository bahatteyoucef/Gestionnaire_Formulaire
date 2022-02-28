<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\POS;

class StatsController extends Controller
{
    public $url = 'Dashboard.formulaires.stats';

    public function statistiques($id_formulaire)
    {
        $questions          =   [];

        $questions          =   DB::table('formulaires_groupes_questions')
                                    ->join('questions', 'formulaires_groupes_questions.id_question' ,   '='     ,   'questions.id_question')
                                    ->where('formulaires_groupes_questions.id_formulaire'           ,   "="     ,   $id_formulaire)
                                    ->where('questions.id_type_chart'                               ,   "!="    ,   null)
                                    ->get();

        foreach ($questions as $question) 
        {    
            $description_question                   =   json_decode($question->description_question);
            
            if($description_question->label)
            {
                $question->description_question     =   $description_question->label;
            }
            
            $description_question->label    =   null;
            $description_question           =   null;
        }

        return view( $this->url . '.stats')    ->with('questions'  ,$questions);
    }

    public function questionStats($id_question)
    {
        //Oui Non questions
        
        // if($id_question ==  44)
        // {
            $data   =   POS::SelfServiceStats($id_question);
            return $data;
        // }

        //

    }
}
