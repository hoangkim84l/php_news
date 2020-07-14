<?php
require_once  __DIR__."/tcpdf.php";
    
    function fetch_data(){
        $result = file_get_contents('http://188.166.82.218:82/api/databydate/2020-02-01/2020-02-29');
        // Will dump a beauty json :3
        $json_object = json_decode($result);
        $newArrPaid = array();
        $newArrFree = array();
        $totalAmount = 0;
        $totalPrice = 0;
        $totalAmount2nd = 0;
        $totalPrice2nd = 0;
        $groupName = '';
        $groupName2 = '';
        //Get product Paid
        foreach($json_object->paid as $key => $data){     
            array_push($newArrPaid, $data->product);
            $groupName = $data->group_name;
            $totalAmount = $data->quantity;
            $totalPrice = $data->net_amount;
        }
        $outout = '';
        foreach($newArrPaid as $key => $value){
            foreach ($value as $k => $l) {
                $outout.='<tr>
                        <td width="25%">'.$groupName.'</td>
                        <td width="15%">'.$l->ean_number.'</td>
                        <td width="35%">'.$l->name.'</td>
                        <td width="10%">'.$l->quantity.'</td>
                        <td width="15%">'.$l->amount.'</td>
                    </tr>
                    ';
            }
        }
        return  $outout; 
    }

    function data(){
        //try to get data
        $result = file_get_contents('http://188.166.82.218:82/api/databydate/2020-02-01/2020-02-29');
        // Will dump a beauty json :3
        $json_object = json_decode($result);
        
        $groupName = '';
        $groupName2 = '';

        foreach($json_object->paid as $key => $data){
            $totalAmount = 0;
            $totalPrice = 0;
            $totalAmount2nd = 0;
            $totalPrice2nd = 0;
            //related stock
            $ListSkuStock = array();
            $ListNewTable = array();
            $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
            $obj_pdf->SetCreator(PDF_CREATOR);  
            $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
            $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
            $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
            $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
            $obj_pdf->SetDefaultMonospacedFont('helvetica');  
            $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
            $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
            $obj_pdf->setPrintHeader(false);  
            $obj_pdf->setPrintFooter(false);  
            $obj_pdf->SetAutoPageBreak(TRUE, 10);  
            $obj_pdf->SetFont('helvetica', '', 12);  
            $obj_pdf->AddPage();  
            $htmlTable = '';
            $htmlTable .= '<h3>Salg i perioden</h3>
                        <table border="1" cellspacing="0" cellpadding="5">
                            <tr>
                                <td width="25%"> Gruppe </td>
                                <td width="15%"> Nr. </td>
                                <td width="35%"> Navn </td>
                                <td width="10%"> Antal </td>
                                <td width="15%"> Omsætning </td>
                            </tr>';
            
            //Get product Paid
            $groupName = $data->group_name;
            $totalAmount = $data->quantity;
            $totalPrice = $data->net_amount;

            $outout = '';
            foreach($data->product as $key => $l){
                array_push($ListSkuStock,$l->ean_number);
                array_push($ListNewTable,$l);
                $outout.='<tr>
                        <td width="25%">'.$groupName.'</td>
                        <td width="15%">'.$l->ean_number.'</td>
                        <td width="35%">'.$l->name.'</td>
                        <td width="10%">'.$l->quantity.'</td>
                        <td width="15%">'.$l->amount.'</td>
                    </tr>
                    ';
            }
            $htmlTable  .= $outout;
            $htmlTable .= '<tfoot>
                            <tr>
                                <td><b>'.$groupName.' I alt:</b></td>
                                <td></td>
                                <td></td>
                                <td><b>'.$totalAmount.'</b></td>
                                <td class="foundremovedkk"><b>'. $totalPrice.'</b></td>
                            </tr>
                            <tr>
                                <td><b>Total</b></td>
                                <td></td>
                                <td></td>
                                <td><b>'. $totalAmount .'</b></td>
                                <td class="foundremovedkk"><b>'. $totalPrice.'</b></td>
                            </tr>
                        </tfoot>';
            $htmlTable .= '</table>';
            //data product free
            $htmlTable .= '<br/>
                        <h3>U/B flasker i perioden</h3>
                        <table border="1" cellspacing="0" cellpadding="5">
                            <tr>
                                <td width="25%"> Gruppe </td>
                                <td width="15%"> Nr. </td>
                                <td width="35%"> Navn </td>
                                <td width="10%"> Antal </td>
                                <td width="15%"> Omsætning </td>
                            </tr>';
            foreach($json_object->free as $key => $data_free){
                $totalAmount2nd = $data_free->quantity;
                $totalPrice2nd = $data_free->net_amount;    
                if($data_free->group_id == $data->group_id){
                    foreach($data_free->product as $key => $d_free){
                        array_push($ListSkuStock,$d_free->ean_number);
                        array_push($ListNewTable,$d_free);
                        $htmlTable.='<tr>
                                <td width="25%">'.$groupName.'</td>
                                <td width="15%">'.$d_free->ean_number.'</td>
                                <td width="35%">'.$d_free->name.'</td>
                                <td width="10%">'.$d_free->quantity.'</td>
                                <td width="15%">'.$d_free->amount.'</td>
                            </tr>
                            ';
                    }
                    $htmlTable .= '<tfoot>
                                    <tr>
                                        <td><b>'.$groupName.' I alt:</b></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>'.$totalAmount2nd.'</b></td>
                                        <td class="foundremovedkk"><b>'. $totalPrice2nd.'</b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Total</b></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>'. $totalAmount2nd .'</b></td>
                                        <td class="foundremovedkk"><b>'. $totalPrice2nd.'</b></td>
                                    </tr>
                                </tfoot>';
                    $htmlTable .= '</table>';
                }
            }
            //data related stock
            //Get information stock in InventoryService
            // $stock = new Stock();
            // $beginStock     = 0;
            // $minsProduct    = 0;
            // $plusProduct    = 0;
            // $endMonth       = 0;

            // //loop and get data
            // $now = new \DateTime($date_from);
            // $month = $now->format('F');
            // $year = $now->format('Y');
            // foreach($ListSkuStock as $value){
            //     $data_ean = $stock->getStockData($month, $date_to, $year, $value);
            //     if($data_ean['error'] === false) {
            //         $beginStock     += $data_ean['data']['stock_first_day'];
            //         $minsProduct    += $data_ean['data']['stock_removed'];
            //         $plusProduct    += $data_ean['data']['stock_added'];
            //         $endMonth       += $data_ean['data']['stock_last_day'];
            //     }
            // }

            $htmlTable .= '<br/>
                        <table border="1" cellspacing="0" cellpadding="5">
                            <tr>
                                <td width="50%"> Navn </td>
                                <td width="15%"> First day </td>
                                <td width="15%"> Last day </td>
                                <td width="10%"> Sold </td>
                                <td width="10%"> Added </td>
                            </tr>';
            // foreach ($ListNewTable as $value) {
            //     $data_ean = $stock->getStockData($month, $date_to, $year, $value->ean_number);
            //     $htmlTable.='<tr>
            //                     <td width="60%">'.$value->name.'</td>
            //                     <td width="10%">'.$data_ean['data']['stock_first_day'].'</td>
            //                     <td width="10%">'.$data_ean['data']['stock_last_day'].'</td>
            //                     <td width="10%">'.$data_ean['data']['stock_removed'].'</td>
            //                     <td width="10%">'.$data_ean['data']['stock_added'].'</td>
            //                 </tr>
            //                 ';
            // }    
            // $htmlTable .= '<br/>
            //             <h3>Lagerstatus</h3>
            //             <table border="1" cellspacing="0" cellpadding="5">
            //                 <tr>
            //                     <td width="20%"> Primo lager </td>
            //                     <td width="20%"> '.$beginStock.' </td>
            //                 </tr>
            //                 <tr>
            //                     <td width="20%"> Salg i perioden </td>
            //                     <td width="20%"> '.$minsProduct.' </td>
            //                 </tr>
            //                 <tr>
            //                     <td width="20%"> Tilført i perioden </td>
            //                     <td width="20%"> '.$plusProduct.' </td>
            //                 </tr>
            //                 <tr>
            //                     <td width="20%"> Ultimo lager </td>
            //                     <td width="20%"> '.$endMonth.' </td>
            //                 </tr>';

            $obj_pdf->writeHTML($htmlTable); 
            
            $fileName = str_replace("/","-", $data->group_name);
            $fileName = str_replace(" ","-",$fileName);
            $fileName= $fileName."-report.pdf";
            $obj_pdf->Output(__DIR__."/ns-reports/".$fileName, 'F');
        }

    }
    data();

    //Enter the name of directory
   $pathdir = "./ns-reports/";
   //Enter the name to creating zipped directory
      $zipcreated = "ns-report.zip";
   //Create new zip class
      $newzip = new ZipArchive;
      if($newzip -> open($zipcreated, ZipArchive::CREATE ) === TRUE) {
         $dir = opendir($pathdir);
         while($file = readdir($dir)) {
            if(is_file($pathdir.$file)) {
               $newzip -> addFile($pathdir.$file, $file);
            }
         }
         $newzip ->close();
      }
    
    // header('Content-type: application/zip');
    // header('Content-Disposition: attachment; filename="ns-report.zip"');
    // readfile('ns-report.zip');
?>