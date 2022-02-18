<?php

class Tree {
    public $file="ipa.json";
    public $uoTemp = array();

    public function __construct($file) {
    	$this->file = $file;
    }

    function readJsonFirst ($key="", $value="") {
	$file=$this->file;
        $fletto=file_get_contents($file);
        $tot=json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $fletto), false );	
	if (isset($key) && trim($key) != '') {

		$temp=array();

		foreach ($tot->records as $parts) {
		//foreach ($tot as $parts) {

			if ($parts[$key] == $value) {
				array_push($temp,$parts);
			}
		}
		return $temp;
	} else {
		return $tot;
	}
    }

    function readJson ($key="", $value="") {
	$file=$this->file;
        $fletto=file_get_contents($file);
        $tot=json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $fletto), false );	

	if (isset($key) && trim($key) != '') {

		$temp=array();

		//foreach ($tot->records as $parts) {
		foreach ($tot as $parts) {

			if ($parts[$key] == $value) {
				array_push($temp,$parts);
			}
		}
		return $temp;
	} else {
		return $tot;
	}
    }

    function getChild ($array) {
	$out=$this->readJson("6",$array[4]);	
	if ($out) {
		foreach ($out as $o) {
			array_push($this->uoTemp,$o);
			$this->getChild($o,$this->uoTemp);	
		}
	}
	return $this->uoTemp;
    }

    function getUO ($array,$key,$value) {
	$out=array();
	foreach ($array as $arr) {
	    if ($arr[$key] == $value) {
		array_push($out,$arr);	
	    }
	}
	return $out;
    }

    function getAllNodes ($array, $lev=0) {
	$out="";
	if (!isset($lev)) { $lev = 0; }
	foreach ($array as $oo) {
                $card=$this->printCard($oo); 
        	$out.='<div class="list-group-item level-'.$lev.'">'.$card;
		$figli=$this->readJson('6',$oo[4]);
		if ($figli) {
			$out.='<div id="'.$oo[4].'" >';
			$out.="<div class='list-group'>";
			$out.=$this->getAllNodes($figli,$lev+1);
			$out.="</div>";
			$out.="</div>";
		}
		$out.="</div>";
        }
	return $out;
    }

    function printCardShort ($array) {
       $out='
            <div class="card" title="'.$array[4].'">
                <div class="card-body">
                    <h5 class="card-title">'.$array[7]; 

	if ($this->readJson('6',$array[4]) ) {
		$out.=' <i class="fa fa-minus-square-o" aria-hidden="true" onClick=\'showHide("'.$array[4].'",this);\'></i></h5>';
	} else {
		$out.='</h5>';
	}

	$out.='
                </div>
            </div>
	';
	return $out;
    }

    function printCard ($array) {

	$out='
            <div class="card" title="'.$array[4].'">
                <div class="card-body">
                    <h5 class="card-title">'.$array[7];

        $out.=' <i class="fa fa-question-circle" aria-hidden="true" onClick=\'showHide("Q'.$array[4].'",this,1);\'></i>';
        if ($this->readJson('6',$array[4]) ) {
                $out.=' <i class="fa fa-minus-square-o" aria-hidden="true" onClick=\'showHide("'.$array[4].'",this,0);\'></i>';
        }
        $out.='</h5>';

	$out.='<div class="inform" id="Q'.$array[4].'">';
	if ($array[19] != '' || $array[20] != '') { 
		$out.='<div>'.$array[20].': '.$array[19].'</div>';
	}
        if ($array[16] != '' || $array[15] != '') { 
		$out.='<div><i class="fa fa-map-marker" aria-hidden="true"></i> '.$array[16].' - '.$array[15].'</div>'; 
	}

        $out.='<p><h6 class="card-subtitle">Resp: '.$array[9].' '.$array[10].'</h6>';

        if ($array[11] != '') {  
		$mail_resp='<i class="fa fa-envelope" aria-hidden="true"></i> '.$array[11]." "; 
	} else { 
		$mail_resp=""; 
	}
	if ($array[12] != '') {  
		$tel_resp='<i class="fa fa-phone-square" aria-hidden="true"></i> '.$array[12]." "; 
	} else { 
		$tel_resp=""; 
	} 
        if ($array[11] != '' || $array[12] != '') { 
		$out.='<span>'.$mail_resp.$tel_resp.'</span> ';
	}
        $out.='</p>';
        if ($array[25] != '') { 
		$out.='<p> Data agg.: '.$array[25].'</p>'; 
	} 
	$out.='
		    </div>
                </div>
            </div>
	';

	return $out;
    }

}
