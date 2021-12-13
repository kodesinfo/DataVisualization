<?php
include_once("/www/chart/classes/autoload.php");

$_SESSION['auth']['coid']="hk";

$nowWeek = date('w');
$nowTime = date("H:i");
$nowMinute = date("i");

if($_SERVER['argv'][1]==""){
	$curDate = strtotime(date("Y-m-d"));
}else{
	echo $_SERVER['argv'][1];
	$curDate = strtotime($_SERVER['argv'][1]);
}

$filter=[];

$filter['startTime']=['$lte'=>$nowTime];
$filter['endTime']=['$gte'=>$nowTime];

$options=[];
$api = new Api("server");
$apiList = $api->apiAllListInfo()['apiList'];

$mysql = new Mysql($System['db']['host'],$System['db']['user'], $System['db']['passwd'],$System['db']['database']);

foreach($apiList as $val){
		if(in_array($nowWeek, $val["workWeek"]) && ( $val['startTime'] <= $nowTime && $val['endTime'] >= $nowTime ) && ( $val['everyFewMinutes']=="" || $val['everyFewMinutes']==0 || ($nowMinute % $val['everyFewMinutes'])==0 )){
			echo $nowTime." ".$val['title']."\n";

			if($val['dateChar']!=""){
				eval('$inputDate ='.$val['dateChar'].";");
			}

			$url=str_replace(array('{date}','{key}'),array($inputDate ,$val['apiKey']),$val['url']);
			$text = file_get_contents($url);
			$json = json_decode($text,true);

			if(!is_array($json)){
				continue;
			}

			if($val['listTag']!=null){
				eval('$json = $json'.$val['listTag'].';');
			}

			$allData=[];
			$data=[];
			$condition=[];

			foreach($json as $jIdx => $jVal){
				foreach($val["field"] as $key2 =>$val2){
					if($val2 !=""){
						$data[$val2]=$jVal[$val["tag"][$key2]];

						if($val["defaultValue"][$key2]!=""){
							eval('$data[$val2]='.$val["defaultValue"][$key2].";");
						}

						if($val["keyField"][$key2]){
							$dataFilter[$val2]=$data[$val2];
						}
					}
				}

				$mysql
					->where($dataFilter)
					->upsert($val['table'], $data);

				$allData[] = $data;
				unset($data,$dataFilter);
			}

			$mysql
				->where(['idx'=>$val['idx']])
				->update($System['db']['api'], ['lastItemUpdate'=>date("Y-m-d H:i:s")]);
		}
}
?>

