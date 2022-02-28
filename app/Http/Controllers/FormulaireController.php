<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Groupe;
use App\Models\Formulaire;
use App\Models\FormulaireGroupeQuestion;
use App\Models\TypeQuestion;
use App\Models\Question;
use App\Models\TypeChart;

class FormulaireController extends Controller
{
    public $url = 'Dashboard.formulaires.';

    //Formulaire

    public function index()
    {
        $formulaires =   Formulaire::all();
        return view( $this->url . 'index')->with('formulaires',$formulaires);
    }

    public function create()
    {
        return view( $this->url . 'create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'etat_formulaire'       => 'required',
            // 'description'           => 'required',            
            // 'administrateur'        => 'required',
            // 'date_creation	'       => 'required',         
        ]);                
        
        if($validator->fails())
        {        
            //return with errors    
            return view( $this->url . 'create');
        }

        $formulaire =   Formulaire::create([
            'titre_formulaire'          =>  $request->titre_formulaire,
            'etat_formulaire'           =>  0,
            'description_formulaire'    =>  $request->description_formulaire,
            'admin_formulaire'          =>  1,
            'expiration_formulaire'     =>  $request->expiration_formulaire,
        ]);

        $formulaire->save();

        $formulaires =   Formulaire::all();

        return redirect('/');
    }

    public function show($id_formulaire)
    {
        $formulaire =   Formulaire::find($id_formulaire);

        if($formulaire)
        {
            return view( $this->url . 'show')->with('formulaire', $formulaire);
        }
        else
        {
            dd("not found");
        }
    }

    public function edit($id_formulaire)
    {
        return view( $this->url . 'edit');
    }

    public function update($id_formulaire)
    {
        return view( $this->url . 'update');
    }

    public function destroy($id_formulaire)
    {
        return view( $this->url . 'destroy');
    }

    public function visualisation($id_formulaire)
    {
        $formulaire =   FormulaireGroupeQuestion::where('id_Formulaire','=',$id_formulaire)->orderby("ordre_groupe")->orderby("ordre_question")->get();

        $form = \FormBuilder::create(\App\Forms\mobileFormulaireForm::class, [
            'method'        => 'POST', 
            'route'         => 'POS.store'
        ],['formulaire'     =>  $formulaire,
            'id_formulaire' =>  $id_formulaire    
        ]);

        return view( $this->url.'.visualisation')->with('form',$form);
    }

    public function mobileVisualisation($id_formulaire)
    {
        $formulaire =   FormulaireGroupeQuestion::where('id_Formulaire','=',$id_formulaire)->orderby("ordre_groupe")->orderby("ordre_question")->get();

        $form = \FormBuilder::create(\App\Forms\mobileFormulaireForm::class, [
            'method'        => 'POST', 
            'route'         => 'POS.store'
        ],['formulaire'     =>  $formulaire,
            'id_formulaire' =>  $id_formulaire    
        ]);

        return view('Mobile'.'./formulaire/mobile/mobilevisualisation')->with('form',$form);
    }

    public function reponses($id_formulaire)
    {
        $formulaire =   Formulaire::find($id_formulaire);
        return view( $this->url . 'reponses')->with('reponses', $formulaire::find($id_formulaire)->reponses());
    }

    //

    //Activate Disactivate

    public function formulaireActivateDisactivate($id_formulaire)
    {
        $formulaire     =   Formulaire::find($id_formulaire);
        
        if($formulaire->etat_formulaire ==  0)
        {
            $formulaire->etat_formulaire    =   1;
            $formulaire->save();
        }
        else
        {
            $formulaire->etat_formulaire    =   0;
            $formulaire->save();
        }

        return redirect('/formulaires');
    }

    public function formulaireQuestionsActivateDisactivate($id_formulaire,$id_question)
    {
        $question     =   FormulaireGroupeQuestion::where([
            ['id_formulaire'    ,'=',   $id_formulaire],
            ['id_question'      ,'=',   $id_question]
        ])->first();
        
        if($question->etat_question ==  0)
        {
            $question->etat_question    =   1;
            $question->save();
        }
        else
        {
            $question->etat_question    =   0;
            $question->save();
        }

        return redirect('/formulaires'.'/'.$id_formulaire.'/questions');
    }

    public function formulaireGroupesActivateDisactivate($id_formulaire,$id_groupe)
    {
        $groupe     =   FormulaireGroupeQuestion::where([
            ['id_formulaire'    ,'=',   $id_formulaire],
            ['id_groupe'      ,'=',   $id_groupe]
        ])->first();
        
        if($groupe->etat_groupe ==  0)
        {
            $groupe->etat_groupe    =   1;
            $groupe->save();
        }
        else
        {
            $groupe->etat_groupe    =   0;
            $groupe->save();
        }

        return redirect('/formulaires'.'/'.$id_formulaire.'/groupes');
    }

    //

    //Formulaire_Groupes

    public function formulaireGroupes($id_formulaire)
    {
        $formulaire         =   Formulaire::find($id_formulaire);

        return view( $this->url . 'groupes.index')->with('formulaire',$formulaire)
                                                  ->with('groupes',$formulaire->groupesG());
    }

    public function formulaireGroupesCreate($id_formulaire)
    {
        $formulaire =   Formulaire::find($id_formulaire);
        return view($this->url . 'groupes.create')->with('formulaire',$formulaire);
    }

    public function formulaireGroupesStore($id_formulaire,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom_groupe'            => 'required',
            'description_groupe'    => 'required',            
            'ordre_groupe'          => 'required',        
        ]);      
        
        if($validator->fails())
        {        
            $formulaire =   Formulaire::find($id_formulaire);

            //return with errors    
            return view( $this->url . 'groupes.create')->with('formulaire',$formulaire);
        }

        $groupe =   Groupe::create([
            'nom_groupe'               =>  $request->nom_groupe,
            'description_groupe'       =>  $request->description_groupe,
        ]);

        $groupe->save();

        $formulaire_groupe_question  =   FormulaireGroupeQuestion::create([
            'id_formulaire'         =>  $id_formulaire,
            'id_groupe'             =>  $groupe->id_groupe,
            'id_question'           =>  null,
            'ordre_groupe'          =>  $request->ordre_groupe,
            'ordre_question'        =>  null,
            'etat_groupe'           =>  0,
            'etat_question'         =>  0,
            'obligatoire_question'  =>  0
        ]);

        $formulaire_groupe_question->save();

        $formulaire =   Formulaire::find($id_formulaire);

        return redirect('/formulaires'.'/'.$id_formulaire.'/groupes');
    }

    //

    //Formulaire_Questions
    public function formulaireQuestions($id_formulaire)
    {
        $questions          =   [];
        $formulaire         =   Formulaire::find($id_formulaire);

        $questions          =   DB::table('formulaires_groupes_questions')
                                    ->join('questions', 'formulaires_groupes_questions.id_question',    '='    , 'questions.id_question')
                                    ->where('formulaires_groupes_questions.id_formulaire',$id_formulaire)
                                    ->get();

        foreach ($questions as $question) 
        {    
            $id_groupe      =   FormulaireGroupeQuestion::where([
                ['id_formulaire'    ,'=',   $id_formulaire],
                ['id_question'      ,'=',   $question->id_question]
            ])->get(); 

            $question->nom_groupe     =   Groupe::find($id_groupe[0])[0]->nom_groupe;
        }

        return view( $this->url . 'questions.index')->with('formulaire' ,$formulaire)
                                                    ->with('questions'  ,$questions);
    }

    public function formulaireQuestionsCreate($id_formulaire)
    {
        $formulaire     =   Formulaire::find($id_formulaire);
        $types_chart    =   TypeChart::all();

        $types_question =   TypeQuestion::all();

        return view($this->url . 'questions.create')->with('formulaire'     ,$formulaire)
                                                    ->with('groupes'        ,$formulaire->groupesG())
                                                    ->with('types_question' ,$types_question)
                                                    ->with('types_chart'    ,$types_chart);
    }

    public function formulaireQuestionsStore($id_formulaire,Request $request)
    {
        if($request->id_type_question_value)
        {
            if(($request->id_type_question_value == "2")||(($request->id_type_question_value == "3"))||(($request->id_type_question_value == "4")))
            {
                $this->storeQuestion_Liste($id_formulaire,$request);
            }
            else
            {
                $this->storeQuestion_Non_Liste($id_formulaire,$request);
            }
        }

        else
        {
            return back();
        }

        return redirect('/formulaires'.'/'.$id_formulaire.'/questions');
    }
    //

    //Formulaire_Groupes_Questions
    public function formulaireGroupesQuestions($id_formulaire,$id_groupe)
    {
        $questions          =   [];

        $formulaire         =   Formulaire::find($id_formulaire);
        $groupe             =   Groupe::find($id_groupe);

        $questions          =   DB::table('formulaires_groupes_questions')
                                    ->join('questions', 'formulaires_groupes_questions.id_question',    '='    , 'questions.id_question')
                                    ->where('formulaires_groupes_questions.id_formulaire',$id_formulaire)
                                    ->where('formulaires_groupes_questions.id_groupe',$id_groupe)
                                    ->get();

        return view( $this->url . 'groupes.questions.index')->with('formulaire' ,$formulaire)
                                                            ->with('groupe'     ,$groupe)
                                                            ->with('questions'  ,$questions);
    }

    public function formulaireGroupesQuestionsCreate($id_formulaire,$id_groupe)
    {
        $formulaire     =   Formulaire::find($id_formulaire);
        $groupe         =   Groupe::find($id_groupe);

        $types_question =   TypeQuestion::all();
        $types_chart    =   TypeChart::all();

        return view($this->url . 'groupes.questions.create')->with('formulaire'     ,$formulaire)
                                                            ->with('groupe'         ,$groupe)
                                                            ->with('types_question' ,$types_question)
                                                            ->with('types_chart'    ,$types_chart);
    }

    public function formulaireGroupesQuestionsStore($id_formulaire,$id_groupe,Request $request)
    {
        if($request->id_type_question_value)
        {
            if(($request->id_type_question_value == "2")||(($request->id_type_question_value == "3"))||(($request->id_type_question_value == "4")))
            {
                $this->storeQuestion_Liste($id_formulaire,$request);
            }
            else
            {
                $this->storeQuestion_Non_Liste($id_formulaire,$request);
            }
        }

        else
        {
            return back();
        }
        
        return redirect('/formulaires'.'/'.$id_formulaire.'/'.'groupes'.'/'.$id_groupe.'/questions');
    }
    //

    //Helpers
    public function storeQuestion_Non_Liste($id_formulaire,Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'nom_groupe'            => 'required',
            // 'description_groupe'    => 'required',            
            // 'ordre_groupe'          => 'required',        
        ]);
        
        if($validator->fails())
        {        
            $formulaire =   Formulaire::find($id_formulaire);

            //return with errors    
            return view( $this->url . 'questions.create')->with('formulaire',$formulaire);
        }

        $question               =   $this->storeQuestion($request,$request->description_question);

        $this->storeFormulaireGroupeQuestion($request,$id_formulaire,$question,$request->ordre_question,$request->obligatoire_question);
    }

    public function storeQuestion_Liste($id_formulaire,Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'nom_groupe'            => 'required',
            // 'description_groupe'    => 'required',            
            // 'ordre_groupe'          => 'required',        
        ]);
        
        if($validator->fails())
        {        
            $formulaire =   Formulaire::find($id_formulaire);

            //return with errors    
            return view( $this->url . 'questions.create')->with('formulaire',$formulaire);
        }

        $description_question   =   $this->descriptionToJson($request);
        $question               =   $this->storeQuestion($request,$description_question);

        $this->storeFormulaireGroupeQuestion($request,$id_formulaire,$question,$request->ordre_question,$request->obligatoire_question);
    }

    public function descriptionToJson(Request $request)
    {
        $options    =   "";

        if($request->id_type_question_value == "2")
        {
            $options    =   $options."{\"option_1\": \"Oui\"},";
            $options    =   $options."{\"option_2\": \"Non\"},";
        }

        if(($request->id_type_question_value == "3")||($request->id_type_question_value == "4"))
        {
            foreach ($request->except('_token') as $key => $value) 
            {    
                if(Str::contains($key, 'option_'))
                {
                    $options    =   $options."{\"".$key."\": \"".$value."\"},";
                }
            }
        }

        $options    =   substr($options, 0, -1);
        $description_question   =   "{\"label\": \"$request->description_question\",\"options\": [ $options ]}";
    
        return $description_question;
    }

    public function storeQuestion(Request $request,$description_question)
    {
        $question   =   Question::create([
            'description_question'      =>  $description_question,
            'id_type_question'          =>  $request->id_type_question_value,
            'id_type_chart'             =>  $request->id_type_chart_value
        ]);

        dd($question);

        $question->save();

        return $question;
    }

    public function storeFormulaireGroupeQuestion(Request $request,$id_formulaire,$question,$ordre_question,$obligatoire_question)
    {
        $formulaire_groupe_question_existe  =   FormulaireGroupeQuestion::where([
            ['id_formulaire','=',   $id_formulaire],
            ['id_groupe'    ,'=',   $request->id_groupe_value],
            ['id_question'  ,'=',   null],
        ])->get();

        if($formulaire_groupe_question_existe->isEmpty())
        {
            $formulaire_groupe_question_copy    =   FormulaireGroupeQuestion::where([
                ['id_formulaire','=',   $id_formulaire],
                ['id_groupe'    ,'=',   $request->id_groupe_value]
            ])->get();

            $formulaire_groupe_question  =   FormulaireGroupeQuestion::create([
                'id_formulaire'         =>  $id_formulaire,
                'id_groupe'             =>  $request->id_groupe_value,
                'id_question'           =>  $question->id_question,
                'ordre_groupe'          =>  $formulaire_groupe_question_copy->first()->ordre_groupe,
                'ordre_question'        =>  $ordre_question,
                'etat_question'         =>  0,
                'obligatoire_question'  =>  $obligatoire_question
            ]);

            $formulaire_groupe_question->save();
        }

        else
        {
            $formulaire_groupe_question_existe->first()->id_question            =   $question->id_question;
            $formulaire_groupe_question_existe->first()->ordre_question         =   $ordre_question;
            $formulaire_groupe_question_existe->first()->obligatoire_question   =   $obligatoire_question;
            
            $formulaire_groupe_question_existe->first()->save();
        }
    }
    
}
