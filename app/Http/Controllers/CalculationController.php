<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Calculation;
use App\Models\Criteria;
use App\Models\Subcriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalculationController extends Controller
{
    public function index (Calculation $calculation){
        $alternative = Alternative::all();
        $criteria = Criteria::all();
        $evaluation = [];
        $max = [];
        $min = [];
        foreach ($criteria as $key => $value) {
            $subcriteria[$value->id] = Subcriteria::where('idCriteria',$value->id)->get();
        }

        $weight = $criteria->pluck('weight','criteria_name');
        $type = $criteria->pluck('type','criteria_name');
        
        // evaluation matrix
        foreach ($alternative as $key => $value) {
            foreach ($criteria as $k => $v) {
                $evaluation[$value->car][$v->criteria_name] = $calculation->where('idAlternative',$value->id)->where('idCriteria',$v->id)->pluck('value');
                $maxval = $calculation->join('criterias','calculations.idCriteria','=','criterias.id')->where('criterias.type','benefit')->max('calculations.value');
                $minval = DB::table('calculations')->join('criterias','calculations.idCriteria','=','criterias.id')->where('criterias.type','cost')->min('calculations.value');
            }
        }
        $normalized = [];
        // normalized matrix
        foreach ($evaluation as $key => $value) {
            foreach ($evaluation[$key] as $k => $v) {
                foreach ($evaluation[$key][$k] as $x) {
                    $normalized[$key][$k] = $type[$k] ==='benefit' ? $x/($maxval) : $minval/$x;
                }
            }
        }
        
        // weighted normalization
        $weightedNormalization = [];
        $result = [];
        foreach($normalized as $key => $value){
            foreach($normalized[$key] as $k => $v){
                $weightedNormalization[$key][$k] = $v*$weight[$k];
            }
            $result[$key] = array_sum($weightedNormalization[$key]);
        }
        arsort($result);
        return view('admin.calc',compact('alternative','criteria','subcriteria','evaluation','normalized','weightedNormalization','result'));
    }

    public function calc (Request $request){
        $calculation = new Calculation();
        $criteria = Criteria::all();
        $check = Alternative::find($request->input('idAlternative'));
        if($check != null){
            $calculation->where('idAlternative',$request->idAlternative)->delete();
        }
        foreach ($criteria as $key => $value) {
            $this->validate($request,[
                'idAlternative'     =>  'required',
                'idCriteria'.$key+1   =>  'required',
            ]);
            $save = $calculation->create([
                'idAlternative' =>  $request->idAlternative,
                'idCriteria'    =>  $value->id,
                'value'         =>  request('idCriteria'.$key+1)
            ]);
        }
        return $save ? redirect(route('calc.index'))->withSuccess('Data have been saved') : back()->withErrors('Data failed to save!');
    }

}
