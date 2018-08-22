<?php //$this->erp->print_arrays($invs) ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice&nbsp;<?= $invs->reference_no ?></title>
    <link href="<?php echo $assets ?>styles/theme.css" rel="stylesheet">
    <link href="<?php echo $assets ?>styles/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $assets ?>styles/custome.css" rel="stylesheet">

</head>
<style>
    .container {
        width: 19.3cm;
        margin: 10px auto;
        padding: 10px;
        font-size: 12px;
        position:relative;
    }
    .title-header tr{
        border: 1px solid #000 !important;
    }
    .border td,.border th{
        border: 1px solid #000 !important;
        border-top: 1px solid #000 !important;
    }

    @media print {
        .pageBreak {
            page-break-after: always;
            -webkit-page-break-after: always;
        }
        .container {
            width: 98% !important;
            margin: 0 auto !important;
        }
        .customer_label {
            padding-left: 0 !important;
        }
        .print th{
            color:white !important;
            background: #444 !important;

        }

        .invoice_label {
            padding-left: 0 !important;
        }

        #note{
            max-width: 95% !important;
            margin: 0 auto !important;
            border-radius: 5px 5px 5px 5px !important;
            margin-left: 26px !important;
        }
        .col-xs-12, .col-sm-12{
            padding-left:1px;
            padding-right:1px;
            margin-left:0px;
            margin-right:0px;
        }
        .border {
            font-size: 14px !important;
        }
        table {border-collapse: collapse;}
        tr {
            page-break-inside: avoid;
            -webkit-page-break-inside: avoid;
        }
        .col-sm-5 {
            margin-left:-10px !important;
        }
        .col-sm-4 .pad{
            padding-left: 10px !important;
        }
    }

    .border{
        font-size: 14px;
    }
    body{
        font-size: 12px !important;
        font-family: "Khmer OS System";
        -moz-font-family: "Khmer OS System";
    }
	.company_addr h3:first-child {
        font-family: Khmer OS Muol !important;
    }

    .company_addr h3:nth-child(2) {
        margin-top:-2px !important;
        font-size: 26px !important;
        font-weight: bold;
    }

    .company_addr h3:last-child {
        margin-top:-2px !important;
    }
    .header{
        font-family:"Khmer OS Muol Light";
        -moz-font-family: "Khmer OS System";
        font-size: 18px;
    }
    .header_en1{
        font-family: "Khmer OS Muol Light";
        -moz-font-family: "Khmer OS System";
        font-size: 18px;
        font-weight: bold;
        /*background: red;*/
    }

    #thead th {
         font-family: "Khmer OS Muol Light" !important;
        -moz-font-family: "Khmer OS System" !important;
        font-size: 12px !important;
        font-weight: 100;
        padding: 3px;
    }


    .table > thead > tr > th,.table > thead > tr > td, tbody > tr > th, .table > tfoot > tr > th, .table > tbody > tr > td, .table > tfoot > tr > td{
        padding:5px;
    }
    .title{
        font-family:"Khmer OS Muol Light";
        -mox-font-family:"Khmer OS Muol Light";
        font-size: 15px;
    }
    h4{
        margin-top: 0px;
        margin-bottom: 0px;
    }
    .noPadding tr{
        padding: 0px 0px;
        margin-top: 0px;
        margin-bottom: 0px;
        border: none;
    }
    .noPadding tr td{
        padding: 0px;
        margin-top: 0px;
        margin-bottom: 0px;
        border:1px solid white;
    }
    .border-foot td{
        border: 1px solid #000 !important;
    }
    thead tr th{
        font-weight: normal;
        text-align: center;
    }
    .bold{
        font-weight: bold !important;
    }

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#hide").click(function(){
            $(".myhide").toggle();
        });
    });
</script>
<body>
<div class="container" style="margin: 0 auto;">
    <div class="col-xs-12" style="padding: 0">
    <?php
    $cols = 6;
    if ($discount != 0) {
        $cols = 7;
    }
    ?>
    <div class="row">
        <table class="table">
            <thead>
            <tr class="thead" style="border-left:none;border-right: none;border-top:none;">
                <th colspan="9" style="border-left:none;border-right: none;border-top:none;border-bottom: 1px solid #000 !important;">
                    <div class="row" style="margin-top: 10px !important;">
                        <div class="col-sm-3 col-xs-3 " style="margin-top: 0px !important;">
                            <br>
                            <?php if(!empty($biller->logo)) { ?>
                                <img class="img-responsive myhide" src="<?= base_url() ?>assets/uploads/logos/<?= $biller->logo; ?>"id="hidedlo" style="width: 140px;margin-top: -10px;margin-left: -10px !important;" />
                            <?php } ?>
                        </div>
                        <div  class="col-sm-7 col-xs-7 company_addr "  style="margin-top: -20px !important;">
                            <div class="myhide">
                                <center >
                                    <?php if ($biller->company_kh) { ?>
                                        <h3 class="header" style="margin-bottom: 5px"><?= $biller->company_kh ?></h3>
                                    <?php } ?>
                                    <?php if ($biller->company) { ?>
                                        <span class="header_en1"><?= $biller->company ?></span>
                                    <?php } ?>

                                    <div style="margin-top: 15px;">
                                        <?php if(!empty($biller->vat_no)) { ?>
                                            <p style="font-size: 12px !important;white-space: nowrap;">លេខអត្តសញ្ញាណកម្ម អតប (VAT No):&nbsp;<?= $biller->vat_no; ?></p>
                                        <?php } ?>

                                        <?php if(!empty($biller->address)) { ?>
                                            <p style="margin-top:-10px !important;white-space: nowrap;font-size: 12px !important;">អាសយដ្ឋាន ៖ &nbsp;<?= $biller->address; ?></p>
                                        <?php } ?>

                                        <?php if(!empty($biller->phone)) { ?>
                                            <p style="margin-top:-10px ;white-space: nowrap;font-size: 12px !important;">Tel:&nbsp;<?= $biller->phone; ?></p>
                                        <?php } ?>

                                        <?php if(!empty($biller->email)) { ?>
                                            <p style="margin-top:-10px !important;white-space: nowrap;font-size: 12px !important;">E-mail :&nbsp;<?= $biller->email; ?></p>
                                        <?php } ?>
                                    </div>

                                </center>
                            </div>

                        </div>
                        <div class="col-sm-2 col-xs-2 pull-right">
                            <div class="row">
                                <button type="button" class="btn btn-xs btn-default no-print pull-right" style="margin-right:15px;" onclick="window.print();">
                                    <i class="fa fa-print"></i> <?= lang('print'); ?>
                                </button>
                            </div>
                            <div class="row">
                                <button type="button" class="btn btn-xs btn-default no-print pull-right " id="hide" style="margin-right:15px;" onclick="">
                                    <i class="fa"></i> <?= lang('Hide/Show_header'); ?>
                                </button>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-xs-12" >
                            <center>
                                <h4 style="font-size: 14px !important;line-height: 25px;font-family: 'Khmer OS Muol Light' !important;">វិក្កយបត្រដឹកជញ្ជូន</h4>
                                <h4 style="font-size: 14px !important; font-weight: bold;">Invoice Delivery</h4>
                            </center>

                        </div>
                    </div>
                    <br>
                    <div class="row" style="text-align: left;margin-left: -20px !important;">
                        <div class="col-sm-7 col-xs-7"style="white-space: nowrap">
                            <table >
                                <?php

                                if(!empty($customer->company)) { ?>
                                    <tr>
                                        <td style="width: 45% !important;">ក្រុមហ៊ុន​​​​​​ / Company</td>
                                        <td  style="width: 5% !important;">:</td>
                                        <td style="width: 40% !important;"><?= $customer->company ?></td>
                                    </tr>
                                <?php } ?>
                                <?php if(!empty($customer->name_kh || $customer->name)) { ?>
                                    <tr>
                                        <td>អតិថិជន / Customer </td>
                                        <td>:</td>
                                        <?php if(($customer->name_kh)) { ?>
                                            <td><?= $customer->name_kh ?></td>
                                        <?php }else { ?>
                                            <td><?= $customer->name ?></td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                                <?php if(!empty($customer->address_kh || $customer->address)) { ?>
                                    <tr>
                                        <td>អាសយដ្ឋាន / Address </td>
                                        <td>:</td>
                                        <?php if(!empty($customer->address_kh)) { ?>
                                            <td><?= $customer->address_kh?></td>
                                        <?php }else { ?>
                                            <td><?= $customer->address ?></td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                                <?php if(!empty($customer->address_kh || $customer->address)) { ?>
                                    <tr>
                                        <td>ទូរស័ព្ទលេខ (Tel)</td>
                                        <td>:</td>
                                        <td><?= $customer->phone ?></td>
                                    </tr>
                                <?php } ?>
                                <!--<?php if(!empty($customer->vat_no)) { ?>
                                    <tr>
                                        <td class="bold"  style="width: 20% !important">លេខអត្តសញ្ញាណកម្ម <br>អតប </td>
                                        <td class="bold" >:</td>
                                        <td><?= $customer->vat_no ?></td>
                                    </tr>
                                <?php } ?>-->
                                <tr>
                                    <td>កាលបរិច្ឆេទ / Date</td>
                                    <td>:</td>
                                    <td><?= $this->erp->hrld($inv->date); ?></td>
                                </tr>
                            </table>
                        </div>
                        <?php //$this->erp->print_arrays($inv);?>
                        <div class="col-sm-5 col-xs-5" style="white-space: nowrap;">
                            <table>
                                <tr>
                                    <td style="width: 45% !important;">លេខដឹក / DO Ref</sup></td>
                                    <td style="width: 5% !important;"> : </td>
                                    <td style="width: 40% !important;"><?= $inv->do_reference_no ?></td>
                                </tr>
                                <tr>
                                    <td>លេខវិក្កយបត្រ / Sale Ref</td>
                                    <td>:</td>
                                    <td><?= $inv->sale_reference_no ?></td>
                                </tr>

                                <tr>
                                    <td>អ្នកលក់ / Salesman</td>
                                    <td>:</td>
                                    <td><?= $inv->saleman; ?></td>
                                </tr>

                                <?php if ($inv->payment_term) { ?>
                                    <tr>
                                        <td>រយៈពេលបង់ប្រាក់ </td>
                                        <td>:</td>
                                        <td><?= $inv->payment_term ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 30% !important">កាលបរិច្ឆេទនៃការបង់ប្រាក់ </td>
                                        <td>:</td>
                                        <td><?= $this->erp->hrsd($inv->due_date) ?></td>
                                    </tr>
                                <?php }
                                $dis=0;
                                $taxx=0;
                                foreach ($rows as $row2) {
                                    $dis+=$row2->item_discount;
                                    $taxx+=$row2->item_tax;
                                }?>
                            </table>
                        </div>
                    </div>
                </th>
            </tr>
            <tr class="border thead print" id="thead" style="background-color: #444 !important; color: #FFF !important;">
                <th>ល.រ<br /><?= strtoupper(lang('no')) ?></th>
                <th>លេខកូដ<br /><?= strtoupper(lang('code')) ?></th>
                <th>បរិយាយ<br /><?= strtoupper(lang('description')) ?></th>
                <th>​ឯកតា<br /><?= strtoupper(lang('unit')) ?></th>
                <th style="width: 10%;">បរិមាណ<br /><?= strtoupper(lang('QTY')) ?></th>
            </thead>
            <tbody>

            <?php

            $no = 1;
            $erow = 1;
            $totalRow = 0;
            foreach ($rows as $inv_item) {
                //$this->erp->print_arrays($rows);

                $row = 1;
                ?>
                <tr class="border">
                    <td style="vertical-align: middle; text-align: center"><?php echo $no ?></td>
                    <td style="vertical-align: middle;">
                        <?=$inv_item->code;?>
                    </td>
                    <td style="white-space: nowrap; vertical-align: middle;">
                        <?php echo $inv_item->product_name;?>
                    </td>
                        <?php if ($inv_item->option_id >= 1) { ?>
                    <td style="text-align: center"><?= $inv_item->variant ?></td>
                    <?php } else { ?>
                        <td style="text-align: center"><?= $inv_item->unit ?></td>
                    <?php } ?>

                    <td style="vertical-align: middle; text-align: center">
                        <?=$this->erp->formatQuantity($inv_item->quantity_received)?>
                    </td>

                </tr>

                <?php
                $no++;
                $erow++;
                $totalRow++;
//                    if ($totalRow % 25 == 0) {
//                        echo '<tr class="pageBreak"></tr>';
//                    }

            }
            ?>
            <?php
            if($erow<9){
                $k=9 - $erow;
                for($j=1;$j<=$k;$j++) {
                    if($discount != 0) {
                        echo  '<tr class="border">
                                    <td height="34px" style="text-align: center; vertical-align: middle">'.$no.'</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>';
                    }else {
                        echo  '<tr class="border">
                                    <td height="34px" style="text-align: center; vertical-align: middle">'.$no.'</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>';
                    }
                    $no++;
                }
            }
            ?>





            <tr>
                <th colspan="9">
                    <?php if(trim(htmlspecialchars_decode($inv->note))){ ?>
                        <div style="border-radius: 5px 5px 5px 5px;border:1px solid black;height: auto;" id="note" class="col-md-12 col-xs-12">
                            <p style="margin-left: 10px;margin-top:10px;"><?php echo strip_tags(htmlspecialchars_decode($inv->note)); ?></p>
                        </div>
                        <br><br><br><br>
                    <?php } ?>
                    <div class="clear-both">
                        <div style="width:100%;height: 10px !important;"></div>
                    </div>
                    <div class="row" style="margin-left: 30px;  ">
                        <div class="col-sm-4 col-xs-4" style="padding-left: 10px;">


                                <p style=" margin-top: 4px !important">អ្នករៀបចំ/<?= lang('prepared_by') ?></p>
                                <p><strong>ឈ្មោះ/<?= lang('name') ?> : </br></br></strong> .......................</p>

                                <p>ថ្ងៃ ខែ ឆ្នាំ/<?= lang('date') ?> : </br></br>.........................</p>

                        </div>

                        <div class="col-sm-4 col-xs-4" style="padding-left: 20px;">
                                <p style=" margin-top: 4px !important">អ្នកដឹក/<?= lang('deliveried_by') ?></p>
                                <p><strong>ឈ្មោះ/<?= lang('name') ?> :</br></br></strong> .......................</p>

                                <p>ថ្ងៃ ខែ ឆ្នាំ/<?= lang('date') ?> : </br></br>.........................</p>

                        </div>
                        <div class="col-sm-4 col-xs-4 ">
                                <p class="pad" style=" margin-top: 4px !important">អ្នកទទួល/<?= lang('received_by') ?></p>
                                <p class="pad"><strong>ឈ្មោះ/<?= lang('name') ?> :</br></br></strong> .......................</p>

                                <p class="pad">ថ្ងៃ ខែ ឆ្នាំ/<?= lang('date') ?> : </br></br>.........................</p>

                        </div>
                    </div>
                </th>
            </tr>
            </tbody>
        </table>
    </div>




    <div style="width: 40%;margin: 20px">
        <a class="btn btn-warning no-print" href="<?= site_url('sales'); ?>" style="border-radius: 0">
            <i class="fa fa-hand-o-left" aria-hidden="true"></i>&nbsp;<?= lang("back"); ?>
        </a>
    </div>
</div>

</body>
</html>