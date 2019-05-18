<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Category;
use App\Guild;
use App\Unit;
use App\Price;

class AjaxController extends Controller
{
    public function getCategory($idTradeCategory){
        echo "<option value= 0>--Loại--</option>";
    	$category = Category::where('trade_category_id',$idTradeCategory)->get();
    	foreach($category as $ca){
    		echo "<option value='".$ca->id."'>".$ca->category."</option>";
    	}
    }

    public function getUnit($idTradeCategory){
        $type = "";
        if($idTradeCategory == 1 || $idTradeCategory == 3){
            $type = 1;
        }
        else{
            $type = 2;
        }
        $unit = Unit::where('type',0)->orWhere('type',$type)->get();
        foreach($unit as $un){
            echo "<option value='".$un->id."'>".$un->unit."</option>";
        }
    }
    
    public function getGuild($idCounty){
    	$guild = Guild::where('county_id',$idCounty)->get();
    	foreach($guild as $gu){
    		echo "<option value='".$gu->id."'>".$gu->guild."</option>";
    	}
    }

    public function getPrice($idTradeCategory){
        $type = "";
        if($idTradeCategory == 1 || $idTradeCategory == 3){
            $type = 1;
        }
        else{
            $type = 2;
        }
        $price = Price::all();
        echo "<option value= 0>--Giá--</option>";
        echo "<option value= -2>Thỏa Thuận</option>";
        foreach ($price as $pr) {
            if($pr->unit1->type == $type){
                echo "<option value = '".$pr->id."'>".$pr->min."-".$pr->max." ".$pr->unit1->unit."</option>";
            }
        }
    }
}
