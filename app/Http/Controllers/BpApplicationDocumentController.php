<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SystemModels\BpApplicationDocument;
use App\SystemModels\BpApplication;
use Illuminate\Support\Facades\Validator;

class BpApplicationDocumentController extends Controller
{
    //

    public function uploadBapplicationDocuments(Request $request){
        $v=Validator::make($request->all(), [
            'filenumber' => ['required', 'numeric', 'min:1','exists:bp_applications,id'],
        ]);

        if ($v->fails()) {
            //
            return redirect()->back()->withErrors($v)->withInput();
        }

        
        if(!$request->hasFile('powerofattorney') && !$request->hasFile('cofo')){
            $v = Validator::make([], []); // Empty data and rules fields
            $v->errors()->add('required', 'one titled document must be uploaded');
            return redirect()->back()->withErrors($v->errors());
        }

        if(!$request->hasFile('floorplan') 
            || !$request->hasFile('leftsideelevation')
            || !$request->hasFile('rightsideelevation')
            || !$request->hasFile('frontelevation')
            || !$request->hasFile('backelevation')
            || !$request->hasFile('section')){
            $v = Validator::make([], []); // Empty data and rules fields
            $v->errors()->add('required', 'building documents must be uploaded');
            return redirect()->back()->withErrors($v->errors());
        }


        $filenumber=$request->input('filenumber');
        $application=BpApplication::where('id',$filenumber)->first();
        
        
        $powerofattorneyuploaded=$this->uploadPowerOfAttorney($request,$application);
        if($powerofattorneyuploaded===false){
            $v=Validator::make($request->all(), [
                'powerofattorney' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return redirect()->back()->withErrors($v)->withInput();
            }
        }

        
        $floorplanuploaded=$this->uploadFloorPlan($request,$application);
        if($floorplanuploaded===false){
            $v=Validator::make($request->all(), [
                'floorplan' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return redirect()->back()->withErrors($v)->withInput();
            }
        }

        
        $leftsideelevationuploaded=$this->uploadLeftSideElevation($request,$application);
        if($leftsideelevationuploaded===false){
            $v=Validator::make($request->all(), [
                'leftsideelevation' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return redirect()->back()->withErrors($v)->withInput();
            }
        }

        
        $rightsideelevationuploaded=$this->uploadRightSideElevation($request,$application);
        if($rightsideelevationuploaded===false){
            $v=Validator::make($request->all(), [
                'rightsideelevation' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return redirect()->back()->withErrors($v)->withInput();
            }
        }

        
        $frontelevationuploaded=$this->uploadFrontElevation($request,$application);
        if($frontelevationuploaded===false){
            $v=Validator::make($request->all(), [
                'frontelevation' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return redirect()->back()->withErrors($v)->withInput();
            }
        }

        
        $backelevationuploaded=$this->uploadBackElevation($request,$application);
        if($backelevationuploaded===false){
            $v=Validator::make($request->all(), [
                'backelevation' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return redirect()->back()->withErrors($v)->withInput();
            }
        }

        
        $roofplanuploaded=$this->uploadRoofPlan($request,$application);
        if($roofplanuploaded===false){
            $v=Validator::make($request->all(), [
                'roofplan' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return redirect()->back()->withErrors($v)->withInput();
            }
        }

        
        $sectionuploaded=$this->uploadSection($request,$application);
        if($sectionuploaded===false){
            $v=Validator::make($request->all(), [
                'section' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return redirect()->back()->withErrors($v)->withInput();
            }
        }
              

        $letterofincuploaded=$this->uploadLetterOfIncorpration($request,$application);
        if($letterofincuploaded===false){
            $v=Validator::make($request->all(), [
                'laterofincorpration' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return redirect()->back()->withErrors($v)->withInput();
            }
        }

      
        $capitationrateuploaded=$this->uploadCapitationRate($request,$application);
        if($capitationrateuploaded===false){
            $v=Validator::make($request->all(), [
                'capitationrate' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return redirect()->back()->withErrors($v)->withInput();
            }
        }

      
        $siteanalysisreportuploaded=$this->uploadSiteAnalysisReport($request,$application);
        if($siteanalysisreportuploaded===false){
            $v=Validator::make($request->all(), [
                'siteanalysisreport' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return redirect()->back()->withErrors($v)->withInput();
            }
        }

        
        $siteplanuploaded=$this->uploadSitePlan($request,$application);
        if($siteplanuploaded===false){
            $v=Validator::make($request->all(), [
                'siteplan' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return redirect()->back()->withErrors($v)->withInput();
            }
        }

        // $buildingplan=$request->file('buildingplan');
        // $this->uploadBuildingPlan($buildingplan,$application);
     
        $cofouploaded=$this->uploadCofO($request,$application);
        if($cofouploaded===false){
            $v=Validator::make($request->all(), [
                'cofo' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return redirect()->back()->withErrors($v)->withInput();
            }
        }
       
        $taxclearnceuploaded=$this->uploadTaxClearance($request,$application);
        if($taxclearnceuploaded===false){
            $v=Validator::make($request->all(), [
                'taxclearnce' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return redirect()->back()->withErrors($v)->withInput();
            }
        }


        $application->app_stage="SLP";
        $application->app_stage_status="AWAITING-TPO-ASSIGMENT";
        $application->save();
        
            
        return redirect()->back()->with('message', 'Building application documents uploaded successful');

    }

    public function uploadPowerOfAttorney($request,$application){
        $power_of_attorney=$request->file('powerofattorney');
        if($request->hasFile('powerofattorney')){
            $v=Validator::make($request->all(), [
                'powerofattorney' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return false;
            }
            $powerofattorney=$request->file('powerofattorney');
            //Store SITE PLAN//
            $powerofattorney_path=$application->id."-POWER-OF-ATTORNEY".'.'.$powerofattorney->getClientOriginalExtension();
            $powerofattorney_doc=new BpApplicationDocument;
            $powerofattorney_doc->bp_application_id=$application->id;
            $powerofattorney_doc->doc_type="POWER-OF-ATTORNEY";
            $powerofattorney_doc->src=$powerofattorney_path;
            $powerofattorney->move(public_path('documents'), $powerofattorney_path);
            $powerofattorney_doc->save();
            return true;
        }else{
            $powerofattorney_doc=new BpApplicationDocument;
            $powerofattorney_doc->bp_application_id=$application->id;
            $powerofattorney_doc->doc_type="POWER-OF-ATTORNEY";
            $powerofattorney_doc->src="null";
            $powerofattorney_doc->save();
            return true;
        }
    }

    public function uploadFloorPlan($request,$application){
        
        if($request->hasFile('floorplan')){
            $v=Validator::make($request->all(), [
                'floorplan' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return false;
            }
            $floorplan=$request->file('floorplan');
            //Store SITE PLAN//
            $floorplan_path=$application->id."-FLOOR-PLAN".'.'.$floorplan->getClientOriginalExtension();
            $floorplan_doc=new BpApplicationDocument;
            $floorplan_doc->bp_application_id=$application->id;
            $floorplan_doc->doc_type="FLOOR-PLAN";
            $floorplan_doc->src=$floorplan_path;
            $floorplan->move(public_path('documents'), $floorplan_path);
            $floorplan_doc->save();
            return true;
        }else{
            $floorplan_doc=new BpApplicationDocument;
            $floorplan_doc->bp_application_id=$application->id;
            $floorplan_doc->doc_type="FLOOR-PLAN";
            $floorplan_doc->src="null";
            $floorplan_doc->save();
            return true;
        }
        
    }

    public function uploadLeftSideElevation($request,$application){

        if($request->hasFile('leftsideelevation')){
            $v=Validator::make($request->all(), [
                'leftsideelevation' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return false;
            }
            $leftsideelevation=$request->file('leftsideelevation');
            //Store SITE PLAN//
            $leftsideelevation_path=$application->id."-LEFT-SIDE-ELEVATION".'.'.$leftsideelevation->getClientOriginalExtension();
            $leftsideelevation_doc=new BpApplicationDocument;
            $leftsideelevation_doc->bp_application_id=$application->id;
            $leftsideelevation_doc->doc_type="LEFT-SIDE-ELEVATION";
            $leftsideelevation_doc->src=$leftsideelevation_path;
            $leftsideelevation->move(public_path('documents'), $leftsideelevation_path);
            $leftsideelevation_doc->save();
            return true;
        }else{
            $leftsideelevation_doc=new BpApplicationDocument;
            $leftsideelevation_doc->bp_application_id=$application->id;
            $leftsideelevation_doc->doc_type="LEFT-SIDE-ELEVATION";
            $leftsideelevation_doc->src="null";
            $leftsideelevation_doc->save();
            return true;
        }
    }

    public function uploadRightSideElevation($request,$application){

        if($request->hasFile('rightsideelevation')){
            $v=Validator::make($request->all(), [
                'rightsideelevation' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return false;
            }
            $rightsideelevation=$request->file('rightsideelevation');
            //Store SITE PLAN//
            $rightsideelevation_path=$application->id."-RIGTH-SIDE-ELEVATION".'.'.$rightsideelevation->getClientOriginalExtension();
            $rightsideelevation_doc=new BpApplicationDocument;
            $rightsideelevation_doc->bp_application_id=$application->id;
            $rightsideelevation_doc->doc_type="RIGTH-SIDE-ELEVATION";
            $rightsideelevation_doc->src=$rightsideelevation_path;
            $rightsideelevation->move(public_path('documents'), $rightsideelevation_path);
            $rightsideelevation_doc->save();
            return true;
        }else{
            $rightsideelevation_doc=new BpApplicationDocument;
            $rightsideelevation_doc->bp_application_id=$application->id;
            $rightsideelevation_doc->doc_type="RIGTH-SIDE-ELEVATION";
            $rightsideelevation_doc->src="null";
            $rightsideelevation_doc->save();
            return true;
        }
    }

    public function uploadFrontElevation($request,$application){
        

        if($request->hasFile('frontelevation')){
            $v=Validator::make($request->all(), [
                'frontelevation' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return false;
            }
            $frontelevation=$request->file('frontelevation');
            //Store SITE PLAN//
            $frontelevation_path=$application->id."-FRONT-ELEVATION".'.'.$frontelevation->getClientOriginalExtension();
            $frontelevation_doc=new BpApplicationDocument;
            $frontelevation_doc->bp_application_id=$application->id;
            $frontelevation_doc->doc_type="FRONT-ELEVATION";
            $frontelevation_doc->src=$frontelevation_path;
            $frontelevation->move(public_path('documents'), $frontelevation_path);
            $frontelevation_doc->save();
            return true;
        }else{
            $frontelevation_doc=new BpApplicationDocument;
            $frontelevation_doc->bp_application_id=$application->id;
            $frontelevation_doc->doc_type="FRONT-ELEVATION";
            $frontelevation_doc->src="null";
            $frontelevation_doc->save();
            return true;
        }
    }

    public function uploadBackElevation($request,$application){
    
        if($request->hasFile('backelevation')){
            $v=Validator::make($request->all(), [
                'backelevation' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return false;
            }
            $backelevation=$request->file('backelevation');
            //Store SITE PLAN//
            $backelevation_path=$application->id."-BACK-ELEVATION".'.'.$backelevation->getClientOriginalExtension();
            $backelevation_doc=new BpApplicationDocument;
            $backelevation_doc->bp_application_id=$application->id;
            $backelevation_doc->doc_type="BACK-ELEVATION";
            $backelevation_doc->src=$backelevation_path;
            $backelevation->move(public_path('documents'), $backelevation_path);
            $backelevation_doc->save();
            return true;
        }else{
            $backelevation_doc=new BpApplicationDocument;
            $backelevation_doc->bp_application_id=$application->id;
            $backelevation_doc->doc_type="BACK-ELEVATION";
            $backelevation_doc->src="null";
            $backelevation_doc->save();
            return true;
        }
    }

    public function uploadRoofPlan($request,$application){
       
        if($request->hasFile('roofplan')){
            $v=Validator::make($request->all(), [
                'roofplan' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return false;
            }
            $roofplan=$request->file('roofplan');
            //Store SITE PLAN//
            $roofplan_path=$application->id."-ROOF-PLAN".'.'.$roofplan->getClientOriginalExtension();
            $roofplan_doc=new BpApplicationDocument;
            $roofplan_doc->bp_application_id=$application->id;
            $roofplan_doc->doc_type="ROOF-PLAN";
            $roofplan_doc->src=$roofplan_path;
            $roofplan->move(public_path('documents'), $roofplan_path);
            $roofplan_doc->save();
            return true;
        }else{
            $roofplan_doc=new BpApplicationDocument;
            $roofplan_doc->bp_application_id=$application->id;
            $roofplan_doc->doc_type="ROOF-PLAN";
            $roofplan_doc->src="null";
            $roofplan_doc->save();
            return true;
        }
    }

    public function uploadSection($request,$application){
       
        if($request->hasFile('section')){
            $v=Validator::make($request->all(), [
                'section' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return false;
            }
            $section=$request->file('section');
            //Store SITE PLAN//
            $section_path=$application->id."-SECTION".'.'.$section->getClientOriginalExtension();
            $section_doc=new BpApplicationDocument;
            $section_doc->bp_application_id=$application->id;
            $section_doc->doc_type="SECTION";
            $section_doc->src=$section_path;
            $section->move(public_path('documents'), $section_path);
            $section_doc->save();
            return true;
        }else{
            $section_doc=new BpApplicationDocument;
            $section_doc->bp_application_id=$application->id;
            $siteplan_doc->doc_type="SECTION";
            $siteplan_doc->src="null";
            $siteplan_doc->save();
            return true;
        }
    }

    

    public function uploadLetterOfIncorpration($request,$application){
        if($request->hasFile('laterofincorpration')){
            $v=Validator::make($request->all(), [
                'laterofincorpration' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return false;
            }

            $laterofincorpration=$request->file('laterofincorpration');
    
             //Store LETTER OF INCORPRATION//
            $laterofincorpration_path=$application->id."-LETTER-OF-INCORPRATION".'.'.$laterofincorpration->getClientOriginalExtension();
            $laterofincorpration_doc=new BpApplicationDocument;
            $laterofincorpration_doc->bp_application_id=$application->id;
            $laterofincorpration_doc->doc_type="LETTER-OF-INCORPRATION";
            $laterofincorpration_doc->src=$laterofincorpration_path;
            $laterofincorpration->move(public_path('documents'), $laterofincorpration_path);
            $laterofincorpration_doc->save();
            return true;
        }else{
            $laterofincorpration_doc=new BpApplicationDocument;
            $laterofincorpration_doc->bp_application_id=$application->id;
            $laterofincorpration_doc->doc_type="LETTER-OF-INCORPRATION";
            $laterofincorpration_doc->src="null";
            $laterofincorpration_doc->save();
            return true;
        }

    }


    public function uploadCapitationRate($request,$application){
        
        if($request->hasFile('capitationrate')){
            $v=Validator::make($request->all(), [
                'capitationrate' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return false;
            }

            $capitationrate=$request->file('capitationrate');
            //Store SITE CAPITATION RATE//
            $capitationrate_path=$application->id."-CAPITATION-RATE".'.'.$capitationrate->getClientOriginalExtension();
            $capitationrate_doc=new BpApplicationDocument;
            $capitationrate_doc->bp_application_id=$application->id;
            $capitationrate_doc->doc_type="CAPITATION-RATE";
            $capitationrate_doc->src=$capitationrate_path;
            $capitationrate->move(public_path('documents'), $capitationrate_path);
            $capitationrate_doc->save();

            return true;
        }else{
            $capitationrate_doc=new BpApplicationDocument;
            $capitationrate_doc->bp_application_id=$application->id;
            $capitationrate_doc->doc_type="CAPITATION-RATE";
            $capitationrate_doc->src="null";
            $capitationrate_doc->save();

            return true;
        }
    }


    public function uploadSiteAnalysisReport($request,$application){
        
        if($request->hasFile('siteanalysisreport')){
            $v=Validator::make($request->all(), [
                'siteanalysisreport' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return false;
            }

            $siteanalysisreport=$request->file('siteanalysisreport');
            //Store SITE ANALYSIS REPORT//
            $siteanalysisreport_path=$application->id."-SITE-ANALYSIS-REPORT".'.'.$siteanalysisreport->getClientOriginalExtension();
            $siteanalysisreport_doc=new BpApplicationDocument;
            $siteanalysisreport_doc->bp_application_id=$application->id;
            $siteanalysisreport_doc->doc_type="SITE-ANALYSIS-REPORT";
            $siteanalysisreport_doc->src=$siteanalysisreport_path;
            $siteanalysisreport->move(public_path('documents'), $siteanalysisreport_path);
            $siteanalysisreport_doc->save();
            return true;
        }else{
            $siteanalysisreport_doc=new BpApplicationDocument;
            $siteanalysisreport_doc->bp_application_id=$application->id;
            $siteanalysisreport_doc->doc_type="SITE-ANALYSIS-REPORT";
            $siteanalysisreport_doc->src="null";
            $siteanalysisreport_doc->save();
            return true;

        }
    }

    public function uploadSitePlan($request,$application){
        if($request->hasFile('siteplan')){
            $v=Validator::make($request->all(), [
                'siteplan' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return false;
            }
            $siteplan=$request->file('siteplan');
            //Store SITE PLAN//
            $siteplan_path=$application->id."-SITE-PLAN".'.'.$siteplan->getClientOriginalExtension();
            $siteplan_doc=new BpApplicationDocument;
            $siteplan_doc->bp_application_id=$application->id;
            $siteplan_doc->doc_type="SITE-PLAN";
            $siteplan_doc->src=$siteplan_path;
            $siteplan->move(public_path('documents'), $siteplan_path);
            $siteplan_doc->save();
            return true;
        }else{
            $siteplan_doc=new BpApplicationDocument;
            $siteplan_doc->bp_application_id=$application->id;
            $siteplan_doc->doc_type="SITE-PLAN";
            $siteplan_doc->src="null";
            $siteplan_doc->save();
            return true;
        }
    }


    public function uploadBuildingPlan($buildingplan,$application){
        //Store BUILDING PLAN//
        $buildingplan_path=$application->id."-BUILDING-PLAN".'.'.$buildingplan->getClientOriginalExtension();
        $buildingplan_doc=new BpApplicationDocument;
        $buildingplan_doc->bp_application_id=$application->id;
        $buildingplan_doc->doc_type="BUILDING-PLAN";
        $buildingplan_doc->src=$buildingplan_path;
        $buildingplan->move(public_path('documents'), $buildingplan_path);
        $buildingplan_doc->save();
    }


    public function uploadCofO($request,$application){
        if($request->hasFile('cofo')){
            $v=Validator::make($request->all(), [
                'cofo' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return false;
            }
            $cofo=$request->file('cofo');
            //Store C OF O//
            $cofo_path=$application->id."-C-OF-O".'.'.$cofo->getClientOriginalExtension();
            $cofo_doc=new BpApplicationDocument;
            $cofo_doc->bp_application_id=$application->id;
            $cofo_doc->doc_type="C-OF-O";
            $cofo_doc->src=$cofo_path;
            $cofo->move(public_path('documents'), $cofo_path);
            $cofo_doc->save();
            return true;
        }else{
            $cofo_doc=new BpApplicationDocument;
            $cofo_doc->bp_application_id=$application->id;
            $cofo_doc->doc_type="C-OF-O";
            $cofo_doc->src="null";
            $cofo_doc->save();
            return true;
        }
    }

    public function uploadTaxClearance($request,$application){
        if($request->hasFile('taxclearnce')){
            $v=Validator::make($request->all(), [
                'taxclearnce' => ['image', 'mimes:jpeg,png'],
            ]);
            if ($v->fails()) {
                //
                return false;
            }
            $taxclearnce=$request->file('taxclearnce');
            //Store TAX CLEARANCE//
            $taxclearnce_path=$application->id."-TAX-CLEARANCE".'.'.$taxclearnce->getClientOriginalExtension();
            $taxclearnce_doc=new BpApplicationDocument;
            $taxclearnce_doc->bp_application_id=$application->id;
            $taxclearnce_doc->doc_type="TAX-CLEARANCE";
            $taxclearnce_doc->src=$taxclearnce_path;
            $taxclearnce->move(public_path('documents'), $taxclearnce_path);
            $taxclearnce_doc->save();
            return true;
        }else{
            $taxclearnce_doc=new BpApplicationDocument;
            $taxclearnce_doc->bp_application_id=$application->id;
            $taxclearnce_doc->doc_type="TAX-CLEARANCE";
            $taxclearnce_doc->src="null";
            $taxclearnce_doc->save();
            return true;
        }
    }
}
