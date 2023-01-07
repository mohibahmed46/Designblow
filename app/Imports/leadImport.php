<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\leads\leads;
use Session;
use Illuminate\Support\Facades\Validator;

class leadImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $format = count($collection[0]);
        //dd($collection[0]);
        $count = 0;
        if($format == 12){
            $category_id = Session::get('category_id');
            $source = Session::get('source');
            $data = array();
            foreach($collection as $key=> $val){
                if($key>0){
                    $arr = array(
                            'fullname'       => $val[0], 
                            'email'          => $val[1], 
                            'mobile'         => $val[2], 
                            'business_email' => $val[3], 
                            'company'        => $val[4], 
                            'phone'          => $val[5], 
                            'designation'    => $val[6], 
                            'city'           => $val[7],  
                            'country'        => $val[8], 
                            'profile_url'    => $val[9], 
                            'website_url'    => $val[10], 
                            'description'    => $val[11],
                            'category_id'    => $category_id,
                            'source'         => $source
                        );

                    leads::addLead($arr);
                    $count++;
                }
            }
            Session::put('format', $count);
        }else{
            Session::put('format', 'invalid');
        }
    }
}
