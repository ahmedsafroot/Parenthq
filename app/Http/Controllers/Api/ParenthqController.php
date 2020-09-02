<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Storage;
class ParenthqController extends Controller
{
    use GeneralTrait;
    //
    
    public function users(Request $request)
    {
        $providers=array(
            array(
                   "name"=>"DataProviderX",
                   "status_column"=>'statusCode',
                   'balance_column'=>'parentAmount',
                   'currency_column'=>'Currency',
                   "StautsCode"=>array("authorised"=>1,"decline"=>2,"refunded"=>3),
                   "data"=>''
                 ),
            array(
                    "name"=>"DataProviderY",
                    "status_column"=>'status',
                    'balance_column'=>'balance',
                    'currency_column'=>'currency',
                    "StautsCode"=>array("authorised"=>100,"decline"=>200,"refunded"=>300),
                    "data"=>''
                 )
            );
        foreach ($providers as &$item) {
            $item["data"] = Storage::disk('local')->get('jsons/'.$item["name"].'.json');
            
            $item["data"] = json_decode($item["data"], true);
            $item["data"]=collect($item["data"]["users"]);
            
        }
        

        if(isset($request->provider) && !in_array($request->provider, array_column($providers, 'name')))
        {
            return $this->returnErrorMessage(400,"this Provider Not Found");
        }
        elseif(isset($request->provider))
        {
            $key=array_search($request->provider, array_column($providers, 'name'));
            $users=$providers[$key]["data"];
            
           if(isset($request->statusCode) && isset($providers[$key]["StautsCode"][$request->statusCode]))
           {
                $users=$users->where($providers[$key]["status_column"],$providers[$key]["StautsCode"][$request->statusCode]);

           }
           if(isset($request->balanceMin) && isset($request->balanceMax))
           {
               $users=$users->whereBetween($providers[$key]["balance_column"],[$request->balanceMin,$request->balanceMax]);
           }
           if(isset($request->currency))
           {
               $users=$users->where($providers[$key]["currency_column"],$request->currency);
           }
           
        }
        
        elseif(!isset($request->provider))
        {
            $users=collect();
            foreach ($providers as $key => $value) {

                $users_provider=$providers[$key]["data"];
          
                if(isset($request->statusCode))
                {
                    $users_provider=$users_provider->where($providers[$key]["status_column"],$providers[$key]["StautsCode"][$request->statusCode]);
                }
                if(isset($request->balanceMin) && isset($request->balanceMax))
                {
                    $users_provider=$users_provider->whereBetween($providers[$key]["balance_column"],[$request->balanceMin,$request->balanceMax]);
                }
                if(isset($request->currency))
                {
                    $users_provider=$users_provider->where($providers[$key]["currency_column"],$request->currency);
                }
                $users=$users->merge($users_provider);
            }

        }
        return $this->returnData("users",$users->values()->all(),"");
    }
}
