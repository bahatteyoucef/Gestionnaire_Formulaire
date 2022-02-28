<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\UserEvaluation;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    public $url = 'Dashboard.evaluations.';

    //Evaluation
    public function index()
    {
        $evaluations =   Evaluation::all();
        return view( $this->url . 'index')->with('evaluations',$evaluations);
    }

    public function create()
    {
        return view( $this->url . 'create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titre_evaluation'      => 'required',
            'question_evaluation'   => 'required',      
            'icon_evaluation'       => 'required'      
        ]);                
        
        if($validator->fails())
        {        
            return view( $this->url . 'create');
        }

        $evaluation =   Evaluation::create([
            'titre_evaluation'          =>  $request->titre_evaluation,
            'question_evaluation'       =>  $request->question_evaluation,
            'admin_evaluation'          =>  Auth::user()->id,
            'etat_evaluation'           =>  1
        ]);

        //Ajouter l'icon
        if($request->hasFile('icon_evaluation'))
        {
            $allowedfileExtension=['jpeg','jpg','png'];
            $file = $request->file('icon_evaluation');
            
            $filename   =   $file->getClientOriginalName();
            $extension  =   $file->getClientOriginalExtension();

            $check=in_array($extension,$allowedfileExtension);

            $filename   = $file->store('evaluations');
            
            $evaluation->icon_evaluation    =   $filename;
        }
        
        $evaluation->save();

        return redirect('/');
    }

    public function show($id_evaluation)
    {
        $evaluation =   Evaluation::find($id_evaluation);

        if($evaluation)
        {
            return view( $this->url . 'show')->with('evaluation', $evaluation);
        }
        else
        {
            dd("not found");
        }
    }

    public function edit($id_evaluation)
    {
        return view( $this->url . 'edit');
    }

    public function update($id_evaluation)
    {
        return view( $this->url . 'update');
    }

    public function destroy($id_evaluation)
    {
        return view( $this->url . 'destroy');
    }

    public function addEvaluation($id_evaluation,$valeur)
    {
        $user_evaluation    =   UserEvaluation::create([
            'id_evaluation'         =>  $id_evaluation,
            'id_user'               =>  Auth::user()->id,
            'avis_user_evaluation'  =>  $valeur
        ]);

        $user_evaluation->save();

        return redirect('/mobile'); 
    }
}

