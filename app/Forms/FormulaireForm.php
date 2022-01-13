<?php

namespace App\Forms;

use App\Models\TypeQuestion;
use App\Models\Question;
use App\Models\Groupe;

use Kris\LaravelFormBuilder\Form;

class FormulaireForm extends Form
{
    public $types_questions     =   [];
    public $i                   =   0;   

    public function __construct()
    {
        $this->types_questions  =   TypeQuestion::all();
    }

    public function buildForm()
    {   
        $current_id_groupe  =   -1;

        foreach($this->getData('formulaire') as $formulaire_groupe_question)
        {
            $question   =   Question::find($formulaire_groupe_question->id_question);          
            
            if($question != null)
            { 
                if($current_id_groupe   !=  $formulaire_groupe_question->id_groupe)
                {
                    $current_groupe         =   Groupe::find($formulaire_groupe_question->id_groupe);
                    $current_id_groupe      =   $current_groupe->id_groupe;
                    $this->addHeader($current_groupe,$question);
                }
                
                $question->id_groupe    =   $formulaire_groupe_question->id_groupe;

                $this->addSelectionOuiNon($question);
                $this->addSelectionListe($question);
                $this->addSelectionListeAutre($question);

                $this->addTextLong($question);
                $this->addTextCourt($question);
                $this->addNumber($question);
                
                $this->addDate($question);
                
                $this->addImage($question);
                $this->addFile($question);
            }
        }

        $this->addSubmit();
    }

    private function addSubmit()
    {
        $this->add("submit", "submit", [
            'attr'  => [
                "name"  =>  "submit",
                "id"    =>  "submit",
                "class" =>  "btn btn-primary me-2"
            ]
        ]);
    }

    private function addTextLong($question)
    {
        if($question->id_type_question == 6)
        {
            $this->add($question->description_question, "textarea", [
                'attr'  => [
                    "name"  =>  $this->addProperId($question->description_question),
                    "id"    =>  $this->addProperId($question->description_question),
                    "class" =>  "form-control groupe_".$question->id_groupe
                ]
            ]);
        }
    }
  
    private function addTextCourt($question)
    {
        if($question->id_type_question == 7)
        {
            $this->add($question->description_question, "text", [
                'attr'  => [
                    "name"  =>  $this->addProperId($question->description_question),
                    "id"    =>  $this->addProperId($question->description_question),
                    "class" =>  "form-control groupe_".$question->id_groupe
                ]
            ]);
        }
    }

    private function addNumber($question)
    {
        if($question->id_type_question == 8)
        {
            $this->add($question->description_question, "text", [
                'required'  =>  'number',
                'attr'  => [
                    "name"  =>  $this->addProperId($question->description_question),
                    "id"    =>  $this->addProperId($question->description_question),
                    "class" =>  "form-control groupe_".$question->id_groupe
                ]
            ]);
        }
    }

    private function addDate($question)
    {
        if($question->id_type_question == 9)
        {
            $this->add($question->description_question, "date", [
                'attr'  => [
                    "name"  =>  $this->addProperId($question->description_question),
                    "id"    =>  $this->addProperId($question->description_question),
                    "class" =>  "form-control groupe_".$question->id_groupe
                ]
            ]);
        }
    }

    private function addImage($question)
    {
        if($question->id_type_question == 10)
        {
            $this->add($question->description_question, "file", [
                'attr'  => [
                    "name"      =>  $this->addProperId($question->description_question)."[]",
                    "id"        =>  $this->addProperId($question->description_question)."[]",
                    "class"     =>  "file-upload-browse btn btn-sm btn-success groupe_".$question->id_groupe,
                    "multiple"  =>  "multiple"
                ]
            ]);
        }
    }

    private function addFile($question)
    {
        if($question->id_type_question == 11)
        {
            $this->add($question->description_question, "file", [
                'attr'  => [
                    "name"      =>  $this->addProperId($question->description_question)."[]",
                    "id"        =>  $this->addProperId($question->description_question)."[]",
                    "class"     =>  "file-upload-browse btn btn-sm btn-success groupe_".$question->id_groupe,
                    "multiple"  =>  "multiple"
                ]
            ]);
        }
    }

    private function addHeader($groupe,$question)
    {
        $this->add($groupe->nom_groupe."_".$question->id_question, "hidden", [
                'value' =>  $groupe->nom_groupe,
                'attr' => [
                    'id'    =>  'groupe___'.$groupe->id_groupe,
                    'value' =>  $groupe->nom_groupe,
                    'hidden'=>  "hidden"
                ]
            ]
        );
    }

    private function addSelectionOuiNon($question)
    {
        if(($question->id_type_question == 2))
        {
            $description_question = json_decode($question->description_question)->label;

            $this->add($description_question, "select", [
                'choices' => ['0' => 'Non', '1' => 'Oui'],
                'selected' => '0',           
                'attr'  => [
                    "name"  =>  $this->addProperId($description_question),
                    "id"    =>  $this->addProperId($description_question),
                    "class" =>  "form-control js-example-basic-single w-100 btn btn-success groupe_".$question->id_groupe
                ]
            ]);
        }
    }

    private function addSelectionListe($question)
    {
        if(($question->id_type_question == 3))
        {
            $description_question = json_decode($question->description_question)->label;
            $options = json_decode($question->description_question)->options;
            
            if(count($options)>0)
            {
                $this->addOptions($question,$description_question,$options);
            }
            else
            {
                $this->Source_Dachat($question,$description_question);
                $this->Zone_dachalendage($question,$description_question);
                $this->Type_POS($question,$description_question);
                $this->Marque_PLV_Int_POS($question,$description_question);
                $this->Marque_PLV_Ext_POS($question,$description_question);
                $this->Marque_Facing_Produit($question,$description_question);
                $this->Marque_Achat_Produit($question,$description_question);
                $this->Type_Facing_Produit($question,$description_question);
                $this->Type_Produit_Achat($question,$description_question);
                $this->Marque_Frigo($question,$description_question);
            }
        }
    }

    private function addSelectionListeAutre($question)
    {
        if(($question->id_type_question == 4))
        {
            $description_question   =   json_decode($question->description_question)->label;
            $options                =   json_decode($question->description_question)->options;
            
            if(count($options)>0)
            {
                $this->addOptions($question,$description_question,$options);
            }
            else
            {
                $this->Source_Dachat($question,$description_question);
                $this->Zone_dachalendage($question,$description_question);
                $this->Type_POS($question,$description_question);
                $this->Marque_PLV_Int_POS($question,$description_question);
                $this->Marque_PLV_Ext_POS($question,$description_question);
                $this->Marque_Facing_Produit($question,$description_question);
                $this->Marque_Achat_Produit($question,$description_question);
                $this->Type_Facing_Produit($question,$description_question);
                $this->Type_Produit_Achat($question,$description_question);
                $this->Marque_Frigo($question,$description_question);
            }
        }
    }

    //HELPERS_Data_Base
    private function Zone_dachalendage($question,$description_question)
    {
        if($description_question    ==  "Zone d'achalendage")
        {
            $this->add('Zone d\'achalendage', 'entity', [
                'class' => 'App\Models\ZoneAchalendage',
                'property' => 'libelle_zone_achalendage',
                'attr' => [
                    "name"  =>  $this->addProperId($description_question),
                    "id"    =>  $this->addProperId($description_question),
                    "class" =>  "form-control js-example-basic-single w-100 btn btn-success groupe_".$question->id_groupe
                ]
            ]);
        }
    }

    private function Source_Dachat($question,$description_question)
    {
        if($description_question    ==  "Source d'achat")
        {
            $this->add('Source d\'achat', 'entity', [
                'class' => 'App\Models\SourceAchat',
                'property' => 'libelle_source_achat',
                'attr' => [
                    "name"  =>  $this->addProperId($description_question),
                    "id"    =>  $this->addProperId($description_question),
                    "class" =>  "form-control js-example-basic-single w-100 btn btn-success groupe_".$question->id_groupe
                ]
            ]);
        }
    }

    private function Type_POS($question,$description_question)
    {
        if($description_question    ==  "Type de Magasin")
        {
            $this->add($description_question, 'entity', [
                'class' => 'App\Models\TypePOS',
                'property' => 'libelle_type_pos',
                'attr' => [
                    "name"  =>  $this->addProperId($description_question),
                    "id"    =>  $this->addProperId($description_question),
                    "class" =>  "form-control js-example-basic-single w-100 btn btn-success groupe_".$question->id_groupe
                ]
            ]);
        }
    }

    private function Type_Produit_Achat($question,$description_question)
    {
        if($description_question    ==  "Type de produit (Achat)")
        {
            $this->add($description_question, 'entity', [
                'class' => 'App\Models\TypeProduit',
                'property' => 'libelle_type_produit',
                'attr' => [
                    "name"  =>  $this->addProperId($description_question),
                    "id"    =>  $this->addProperId($description_question),
                    "class" =>  "form-control js-example-basic-single w-100 btn btn-success groupe_".$question->id_groupe
                ]
            ]);
        }
    }

    private function Type_Facing_Produit($question,$description_question)
    {
        if($description_question    ==  "Type de produit (Facing)")
        {
            $this->add($description_question, 'entity', [
                'class' => 'App\Models\TypeProduit',
                'property' => 'libelle_type_produit',
                'attr' => [
                    "name"  =>  $this->addProperId($description_question),
                    "id"    =>  $this->addProperId($description_question),
                    "class" =>  "form-control js-example-basic-single w-100 btn btn-success groupe_".$question->id_groupe
                ]
            ]);
        }
    }

    private function Marque_PLV_Int_POS($question,$description_question)
    {
        if($description_question    ==  "Marque sur la PLV Interieur")
        {
            $this->add($description_question, 'entity', [
                'class' => 'App\Models\Marque',
                'property' => 'libelle_marque',
                'attr' => [
                    "name"  =>  $this->addProperId($description_question),
                    "id"    =>  $this->addProperId($description_question),
                    "class" =>  "form-control js-example-basic-single w-100 btn btn-success groupe_".$question->id_groupe
                ]
            ]);
        }
    }

    private function Marque_PLV_Ext_POS($question,$description_question)
    {
        if($description_question    ==  "Marque sur la PLV Exterieur")
        {
            $this->add($description_question, 'entity', [
                'class' => 'App\Models\Marque',
                'property' => 'libelle_marque',
                'attr' => [
                    "name"  =>  $this->addProperId($description_question),
                    "id"    =>  $this->addProperId($description_question),
                    "class" =>  "form-control js-example-basic-single w-100 btn btn-success groupe_".$question->id_groupe
                ]
            ]);
        }
    }

    private function Marque_Facing_Produit($question,$description_question)
    {
        if($description_question    ==  "Marque de produit (Facing)")
        {
            $this->add($description_question, 'entity', [
                'class' => 'App\Models\Marque',
                'property' => 'libelle_marque',
                'attr' => [
                    "name"  =>  $this->addProperId($description_question),
                    "id"    =>  $this->addProperId($description_question),
                    "class" =>  "form-control js-example-basic-single w-100 btn btn-success groupe_".$question->id_groupe
                ]
            ]);
        }
    }

    private function Marque_Achat_Produit($question,$description_question)
    {
        if($description_question    ==  "Marque de produit (Achat)")
        {
            $this->add($description_question, 'entity', [
                'class' => 'App\Models\Marque',
                'property' => 'libelle_marque',
                'attr' => [
                    "name"  =>  $this->addProperId($description_question),
                    "id"    =>  $this->addProperId($description_question),
                    "class" =>  "form-control js-example-basic-single w-100 btn btn-success groupe_".$question->id_groupe
                ]
            ]);
        }
    }

    private function Marque_Frigo($question,$description_question)
    {
        if($description_question    ==  "Model frigo")
        {
            $this->add($description_question, 'entity', [
                'class' => 'App\Models\Marque',
                'property' => 'libelle_marque',
                'attr' => [
                    "name"  =>  $this->addProperId($description_question),
                    "id"    =>  $this->addProperId($description_question),
                    "class" =>  "form-control js-example-basic-single w-100 btn btn-success groupe_".$question->id_groupe
                ]
            ]);
        }
    }

    //

    //HELPERS_Options
    private function addOptions($question,$description_question,$options)
    {
        $choices        =   [];
        $i              =   0;
        $j              =   1;

        $options_select =   json_decode(json_encode($options), true);

        foreach ($options_select as $key => $value) { 
            $st             =   "option_".$j;
            $choices[$i]    =   $value[$st]; 
            $i              =   $i+1;
            $j              =   $j+1;
        }

        $this->add($this->addProperId($description_question), "select", [
            'choices' => $choices,
            'attr'  => [
                "name"  =>  $this->addProperId($description_question),
                "id"    =>  $this->addProperId($description_question),
                "class" =>  "form-control js-example-basic-single w-100 btn btn-success groupe_".$question->id_groupe
            ]
        ]);
    }

    private function addProperId($str)
    {
        return str_replace(' ', '_', $str);
    }
    //

}
