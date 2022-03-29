<?php
namespace App\Traits;
use Jenssegers\Agent\Agent;
trait OfficeResponseView{
    public function render_view($view,$compact=null,$alternativePath=null){
        $agent = new Agent();
        if($agent->isMobile()){
            if(view()->exists('pages.office.mobile.'.$view)){
                #return view mobile
                if($compact!=null){
                    return view('pages.office.mobile.'.$view,$compact);
                }else{
                    return view('pages.office.mobile.'.$view);
                }
            }else{
                return redirect($alternativePath);
            }
        }else{
            if(view()->exists('pages.office.desktop.'.$view)){
                #return view frontend
                if($compact!=null){
                    return view('pages.office.desktop.'.$view,$compact);
                }else{
                    return view('pages.office.desktop.'.$view);
                }
            }else{
                return redirect($alternativePath);
            }
        }
    }
}