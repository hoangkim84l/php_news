<?php

class Stock {
	/**
	* Return data for ean, will not work for before Sepetember 2019
	* @param String $month_param // full name of month e.g. October, September
	* @param $year // full year e.g. 2020
	* @param $ean_number_param
	* @return Array ['error', 'message', 'data']
	*/
	function getStockData($month_param, $year, $ean_number_param=false) {
		//header('Content-Type: text/plain');
		//starting the client with trace for debugging information
		$client = new SoapClient('http://logistikdata.dansk-e-logistik.dk/V1/InventoryService/InventoryService_V1_1.svc?wsdl', array('trace' => 1));
		//Create an array (or stdClass object)for parameters
		$month_digit = $this->getMonthDigit($month_param);
		if ($month_digit == false) {
			return ['error' => true, "Message" => "Incorrect month provided", "data" => []];
		}

		$afterDate = $year . "-".$month_digit."-01T21:45:00.000";
		$parameters = array("AuthenticationID"=>"A9C311DC-F6D2-4C54-95C0-F47E2C908D0F","AfterDate"=> $afterDate);
		//dumping parameter array to screen echo var_dump($parameters);
		//make the call
		try{

		$result = $client->Get_StockTransactions($parameters); //dumping the result to screen
		$ean_array = [];
		$ean_array_all = [];
		foreach ($result->Get_StockTransactionsResult->StockTransaction as $key => $value) {
				$date=date_create($value->Date);
				$month = date_format($date,"F");
				if(($month == $month_param && $value->StockTransactionDetailReasonID == 0) ||
					($month == $month_param && $value->StockTransactionDetailReasonID == 1) ||
					($month == $month_param && $value->StockTransactionDetailReasonID == 3) ||
					($month == $month_param && $value->StockTransactionDetailReasonID == 5) || 
					( $month == $month_param &&$value->StockTransactionDetailReasonID == 6) || 
					($month == $month_param && $value->StockTransactionDetailReasonID == 7) ||
					($month == $month_param &&$value->StockTransactionDetailReasonID == 11)||
					($month == $month_param && $value->StockTransactionDetailReasonID == 12) || 
					($month == $month_param && $value->StockTransactionDetailReasonID == 13) ||
					($month == $month_param && $value->StockTransactionDetailReasonID == 16)) {
					// if($month == $month_param && $value->StockTransactionDetailReasonID == 11) {
					array_push($ean_array, $value);
				}
				// get last entry of all data
				if( !isset($ean_array_all[$value->EAN]) ){
					$ean_array_all[$value->EAN] = [];
				}
				$ean_array_all[$value->EAN] = $value;
				
		}

		// process monthly array
		$monthly_array = [];
		foreach ($ean_array as $value) {
			if (!isset($monthly_array[$value->EAN])) {
				$monthly_array[$value->EAN] = [];
			}
			array_push($monthly_array[$value->EAN], $value);
		}

		$ean_monthly_array = [];
		foreach ($monthly_array as $key => $value) {
			if (!isset( $ean_monthly_array[$key])) {
				$ean_monthly_array[$key] = [];
			}
			$added_in_stock = 0;
			$removed_from_stock = 0;
			$destocking = 0;
			foreach ($value as $valueInner) {
				// var_dump($valueInner);
				if($valueInner->StockTransactionDetailReasonID == 5 || 
					$valueInner->StockTransactionDetailReasonID == 7 ||
					($valueInner->ChangeInStock > 0 && $valueInner->StockTransactionDetailReasonID == 11) ||
					$valueInner->StockTransactionDetailReasonID == 12 ||
					$valueInner->StockTransactionDetailReasonID == 13 ||
					$valueInner->StockTransactionDetailReasonID == 15 ){
					$added_in_stock += $valueInner->ChangeInStock;
				}
				else if($valueInner->StockTransactionDetailReasonID == 1 ||
						$valueInner->StockTransactionDetailReasonID == 6 ||
						$valueInner->StockTransactionDetailReasonID == 14 ||
						$valueInner->StockTransactionDetailReasonID == 16){
					$destocking += $valueInner->ChangeInStock;
				}
				else if($valueInner->ChangeInStock < 0 && $valueInner->StockTransactionDetailReasonID == 11) {
					$removed_from_stock += $valueInner->ChangeInStock;
				}
				else if($valueInner->ChangeInStock > 0) {
					$added_in_stock += $valueInner->ChangeInStock;
				}
				
			}
			$ean_monthly_array[$key] = [
				'stock_first_day' => $value[0]->InStock + abs($value[0]->ChangeInStock),
				'stock_last_day' => $value[count($value) - 1]->InStock,
				'stock_added' => abs($added_in_stock),
				'stock_removed' => $removed_from_stock,
				'destocking' => abs($destocking),
			];
		}
		// all those keys that are not in monthly array
		$not_monthly_array = [];
		foreach ($ean_array_all as $value) {
			if ( !isset($ean_monthly_array[$value->EAN]) ) {
				$ean_monthly_array[$value->EAN] = [
					'stock_first_day' => $value->InStock,
					'stock_last_day' => $value->InStock,
					'stock_added' => $value->ChangeInStock > 0 ? $value->ChangeInStock : 0,
					'stock_removed' => $value->ChangeInStock < 0 ? $value->ChangeInStock : 0,
					'destocking' => abs($destocking),
				];
			}
		}

		// if sent a specific ean number
		if($ean_number_param) {
			if(isset($ean_monthly_array[$ean_number_param])) {
				return ['error' => false, "data" => $ean_monthly_array[$ean_number_param]]; 
			}
			else{
				return ['error' => true, "Message" => "could not get results for ean number " . $ean_number_param, "data" => []];
			}
		}
		// rerturn all arrays
		return ['error' => false, "data" => $ean_monthly_array]; 

		}catch(SoapFault $fault){
			return ['error' => true, "Message" => "could not get results", "data" => []];
		}
	}

	private function getMonthDigit($month) {
		$m = "01";
		switch ($month) {
		    case "January":        
		    case "Jan":
		        $m = "01";
		        break;
		    case "February":
		    case "Feb":
		        $m = "02";
		        break;
		    case "March":
		    case "Mar":
		        $m = "03";
		        break;
		    case "April":
		    case "Apr":
		        $m = "04";
		        break;
		    case "May":
		        $m = "05";
		        break;
		    case "June":
		    case "Jun":
		        $m = "06";
		        break;
		    case "July":        
		    case "Jul":
		        $m = "07";
		        break;
		    case "August":
		    case "Aug":
		        $m = "08";
		        break;
		    case "September":
		    case "Sep":
		        $m = "09";
		        break;
		    case "October":
		    case "Oct":
		        $m = "10";
		        break;
		    case "November":
		    case "Nov":
		        $m = "11";
		        break;
		    case "December":
		    case "Dec":
		        $m = "12";
		        break;
		    default:
		        $m = false;
		        break;
		}
		return $m;
	}
}
$stock = new Stock();
// get data for one ean number
$data_ean = $stock->getStockData("November", "2020", "12000110");

if($data_ean['error'] === false) {
	var_dump($data_ean['data']);
}

// get all data
// $data_all = $stock->getStockData("January", "2020");
// if($data_all['error'] === false) {
// 	print_r($data_all['data']);
// }
// else{
// 	print_r($data_all);
// }
?>
