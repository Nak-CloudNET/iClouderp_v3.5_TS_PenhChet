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
        width: 22.3cm;
        margin: 20px auto;
        padding: 10px;
        font-size: 14px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
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
			padding:10px !important;
        }
        .row{
            margin: 10px auto !important;
        }
        .customer_label {
            padding-left: 0 !important;
        }
        .print th{
            color:white !important;
            background: #444 !important;

        }

        tbody{
            display:table-row-group;
        }
        thead {
            display: table-header-group;
            overflow: visible !important;
        }
        .thead th {
            text-align: center !important;
            font-family:"Khmer OS Muol Light";
            -moz-font-family: "Khmer OS System";
            font-size: 14px;
            font-weight: 100;
        }
        .thead th span{
            font-weight: 700;

        }
        thead tr{
            break:inside: auto;
            clear:both;
        }
        tfoot {
            display: table-footer-group;
            -webkit-display: table-footer-group;
            page-break-after: always;
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
        table {border-collapse: collapse;}
        tr {
            page-break-inside: avoid;
            -webkit-page-break-inside: avoid;
        }
        #footer{
            position: fixed;
            bottom: 0px;
        }
    }
    body {
        font-size: 13px !important;
        font-family: "Khmer OS System";
        -moz-font-family: "Khmer OS System";
    }
    }
    .company_addr h3:first-child {
        font-family: Khmer OS Muol !important;
    //padding-left: 12% !important;
    }

    .company_addr h3:nth-child(2) {
        margin-top:-2px !important;
    //padding-left: 130px !important;
        font-size: 26px !important;
        font-weight: bold;
    }

    .company_addr h3:last-child {
        margin-top:-2px !important;
    //padding-left: 100px !important;
    }

    .table > thead > tr > th,.table > thead > tr > td, tbody > tr > th, .table > tfoot > tr > th, .table > tbody > tr > td, .table > tfoot > tr > td{
        padding:5px;
    }
    .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td {
        border: 1px solid #000 !important;
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
            <div class="row" style="margin-top: 20px !important;">
                <div class="col-sm-3 col-xs-3 " style="margin-top: 0px !important;">
                    <?php if(!empty($biller->logo)) { ?>
                        <img class="img-responsive myhide" src="<?= base_url() ?>assets/uploads/logos/<?= $biller->logo; ?>"id="hidedlo" style="width: 140px; margin-top: -10px;" />
                    <?php } ?>
                </div>
                <div  class="col-sm-7 col-xs-7 company_addr "  style="margin-top: -20px !important; font-size: 12px">
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
                                        <p>លេខអត្តសញ្ញាណកម្ម អតប (VAT No):&nbsp;<?= $biller->vat_no; ?></p>
                                    <?php } ?>

                                    <?php if(!empty($biller->address)) { ?>
                                        <p style="margin-top:-10px !important;">អាសយដ្ឋាន ៖ &nbsp;<?= $biller->address; ?></p>
                                    <?php } ?>

                                   <?php if(!empty($biller->phone)) { ?>
                                        <p style="margin-top:-10px ;">Tel:&nbsp;<?= $biller->phone; ?></p>
                                    <?php } ?>

                                    <?php if(!empty($biller->email)) { ?>
                                        <p style="margin-top:-10px !important;">E-mail:&nbsp;<?= $biller->email; ?></p>
                                    <?php } ?>
                                </div>

                            </center>
                        </div>
                        <div class="invoice" style="margin-top:20px;">
                        <center>
							<h4 style="font-size: 14px !important;line-height:25px;font-family: 'Khmer OS Muol Light' !important;">វិក្កយបត្របញ្ជាទិញ</h4>
							<h4 style="font-size: 14px !important;margin-top: 3px;font-weight:bold;">Sale Orders</h4>
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
            <div class="col-sm-6 col-xs-6">
                <table>
                    <?php if(!empty($customer->company)) { ?>

                        <tr>
                            <td style="width: 45%;white-space: nowrap !important;  ">ក្រុមហ៊ុន / Company</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 40%;white-space: nowrap !important; "><?= $customer->company ?></td>
                        </tr>
                    <?php } ?>

                    <?php if(!empty($customer->name_kh || $customer->name)) { ?>
                        <tr>
                            <td style="width: 45%;white-space: nowrap !important; ">អតិថិជន / Customer</td>
                            <td style="width: 5%;">:</td>
                            <?php if(!empty($customer->name_kh)) { ?>
                                <td style="width: 40%;"><?= $customer->name_kh ?></td>
                            <?php }else { ?>
                                <td style="width: 40%;"><?= $customer->name ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    <?php if(!empty($customer->address_kh || $customer->address)) { ?>
                        <tr>
                            <td style="width: 45%;white-space: nowrap !important;">អាសយដ្ឋាន / Address</td>
                            <td style="width: 5%;">:</td>
                            <?php if(!empty($customer->address_kh)) { ?>
                                <td style="width: 40%;"><?= $customer->address_kh?></td>
                            <?php }else { ?>
                                <td style="width: 40%;"><?= $customer->address ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    <?php if(!empty($customer->address_kh || $customer->address)) { ?>
                        <tr>
                            <td style="width: 45%;">ទូរស័ព្ទលេខ / (Tel)</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 40%;"><?= $customer->phone ?></td>
                        </tr>
                    <?php } ?>

                </table>
            </div>
            <div class="col-sm-6 col-xs-6" style="padding-left: 60px !important;">
                <table>
                    <tr>
                        <td style="width: 45%; white-space: nowrap !important;">លេខវិក្កយបត្រ / Reference</td>
                        <td style="width: 5%; ">:</td>
                        <td style="width:50%;white-space: nowrap !important; "><?= $invs->reference_no ?></td>
                    </tr>
                    <tr>
                        <td style="">កាលបរិច្ឆេទ / Date</td>
                        <td style="">:</td>
                        <td style="white-space: nowrap !important;"><?= $this->erp->hrld($invs->date); ?></td>
                    </tr>
                    <tr>
                        <td style="">អ្នកលក់ / Salesman</td>
                        <td style="">:</td>
                        <td><?= $invs->username; ?></td>
                    </tr>
                    <?php if ($invs->payment_term) { ?>
                        <tr>
                            <td style="">រយៈពេលបង់ប្រាក់ </td>
                            <td style="">:</td>
                            <td><?= $invs->payment_term ?></td>
                        </tr>
                        <tr>
                            <td style="width: 30% !important; ">កាលបរិច្ឆេទនៃការបង់ប្រាក់ </td>
                            <td>:</td>
                            <td><?= $this->erp->hrsd($invs->due_date) ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>

        <?php
        $cols = 6;
        if ($discount != 0) {
            $cols = 7;
        }
        $dis=0;
        $tax=0;
        foreach($rows as $row){
            $dis+=$row->item_discount;
            $tax+=$row->item_tax;
        }
        ?>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <table class="table" style=" white-space: nowrap;width: 100%; margin-top: 10px;">
                    <tbody style="font-size: 14px !important;">
                    <tr class="thead" style="background-color: #444 !important; color: #FFF !important;">
                        <th style="width: 50px">ល.រ<br /><span>No</span></th>
                        <th style="width: 50px">កូដ<br /><span>Code</span></th>
                        <th>បរិយាយ<br /><span>Description</span></th>
                        <th>ខ្នាត<br /><span>Unit</span></th>
                        <th>ចំនួន<br /><span>Qty</span></th>
                        <th style="width: 50px">តម្លៃ<br /><span>Unit Price</span></th>

                        <?php if ($dis>0) { ?>
                            <th>បញ្ចុះតម្លៃ<br /><span>Discount</span></th>
                        <?php } ?>
                        <?php if ($tax>0) { ?>
                            <th>ពន្ធទំនិញ<br /><span>Tax</span></th>
                        <?php } ?>

                        <th>តម្លៃសរុប<br /><span>Subtotal</span></th>
                    </tr>
                    <?php

                    $no = 1;
                    $erow = 1;
                    $totalRow = 0;
                    foreach ($rows as $row) {
                        $free = lang('free');
                        $product_unit = '';
                        $total = 0;

                        if($row->variant){
                            $product_unit = $row->variant;
                        }else{
                            $product_unit = $row->uname;
                        }
                        $product_name_setting;
                        if($setting->show_code == 0) {
                            $product_name_setting = $row->product_name . ($row->variant ? ' (' . $row->variant . ')' : '');
                        }else {
                            if($setting->separate_code == 0) {
                                $product_name_setting = $row->product_name . " (" . $row->product_code . ")" . ($row->variant ? ' (' . $row->variant . ')' : '');
                            }else {
                                $product_name_setting = $row->product_name . ($row->variant ? ' (' . $row->variant . ')' : '');
                            }
                        }
                        $balance=$invs->grand_total - (($invs->paid-$invs->deposit) + $invs->deposit);

                        ?>
                        <tr style="border-bottom: 2px solid transparent;">
                            <td style="vertical-align: middle; text-align: center"><?php echo $no ?></td>
                            <td style="vertical-align: middle;">
                                <?=$row->product_code;?>
                            </td>
                            <td style="vertical-align: middle;">
                                <?=$row->product_name;?>
                            </td>

                            <td style="vertical-align: middle; text-align: center">
                                <?= $product_unit ?>
                            </td>
                            <td style="vertical-align: middle; text-align: center">
                                <?=$this->erp->formatQuantity($row->quantity);?>
                            </td>
                            <td style="vertical-align: middle; text-align: right">
                                <?php
                                if($row->real_unit_price==0){echo "Free";}
                                else{
                                    echo $this->erp->formatMoney($row->real_unit_price);
                                }
                                ?>
                            </td>
                            <?php if ($dis>0) {?>
                                <td style="vertical-align: middle; text-align: center">
                                    <?=$this->erp->formatMoney($row->item_discount);?></td>
                            <?php } ?>
                            <?php if ($tax>0) {?>
                                <td style="vertical-align: middle; text-align: center">
                                    <?=$this->erp->formatMoney($row->item_tax);?></td>
                            <?php } ?>
                            <td style="vertical-align: middle; text-align: right">
                                <?php
                                if($row->subtotal==0){echo "Free";}
                                else{
                                    echo $this->erp->formatMoney($row->subtotal);
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        $erow++;
                        $totalRow++;
                        if ($totalRow % 25 == 0) {
                            echo '<tr class="pageBreak"></tr>';
                        }

                    }
                    ?>
                    <?php
                    if($erow<13){
                        $k=12 - $erow;
                        for($j=1;$j<=$k;$j++) {
                            if($dis > 0) {
                                if($tax>0){
                                    echo  '<tr style="border-bottom: 2px solid transparent;">
													<td height="34px" style="text-align: center; vertical-align: middle"></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>';
                                }
                                else{
                                    echo  '<tr style="border-bottom: 2px solid transparent;">
													<td height="34px" style="text-align: center; vertical-align: middle"></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													
												</tr>';
                                }

                            }else {
                                if($tax>0){
                                    echo  '<tr style="border-bottom: 2px solid transparent;">
													<td height="34px" style="text-align: center; vertical-align: middle"></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													
												</tr>';
                                }else{
                                    echo  '<tr style="border-bottom: 2px solid transparent;">
													<td height="34px" style="text-align: center; vertical-align: middle"></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>';
                                }

                            }
                            $no++;
                        }
                    }
                    ?>
                    <?php

                    $row = 1;
                    $col =3;
                    $col2 = 5;
                    if($dis<=0){$col2--;}
                    if($tax<=0){$col2--;}

                    if ($invs->grand_total != $invs->total) {
                        $row++;
                    }

                    if ($invs->order_discount > 0) {
                        $row++;

                    }
                    if ($invs->shipping > 0) {
                        $row++;
                    }
                    if ($invs->order_tax > 0) {
                        $row++;

                    }
                    if($invs->paid != 0 && $invs->deposit != 0) {
                        $row += 3;
                    }elseif ($invs->paid != 0 && $invs->deposit == 0) {
                        $row += 2;
                    }elseif ($invs->paid == 0 && $invs->deposit != 0) {
                    }
                    //$this->erp->print_arrays($invs);

                    ?>

                    <?php  ?>
                    <tr>

                    </tr>
                    <tr  class="border" style="border-top: 1px solid black;">
                        <td rowspan = "<?= $row; ?>" colspan="<?= $col; ?>" style="border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;">
                            <div style="height: auto;" id="note" class="col-md-12 col-xs-12">
                                <p ><strong><u>Note:</u></strong>
                                    <?php echo($invs->invoice_footer); ?></p>
                            </div>
                        </td>
                        <td colspan="<?= $col2; ?>" style="  text-align: right; font-weight: bold;">សរុប​ / <?= strtoupper(lang('total')) ?>

                        </td>
                        <td align="right"><b><?=$this->erp->formatMoney($invs->total); ?></b></td>
                    </tr>
                    <?php  ?>

                    <?php if ($invs->order_discount != 0) : ?>
                        <tr class="border-foot">
                            <td colspan="<?= $col2; ?>" style="text-align: right; font-weight: bold;">បញ្ចុះតម្លៃ / <?= strtoupper(lang('order_discount')) ?></td>
                            <td align="right"><?= $this->erp->formatMoney($invs->order_discount); ?></td>
                        </tr>
                    <?php endif; ?>

                    <?php if ($invs->shipping != 0) : ?>
                        <tr class="border-foot">
                            <td colspan="<?= $col2; ?>" style="text-align: right; font-weight: bold;">ដឹកជញ្ជូន / <?= strtoupper(lang('shipping')) ?></td>
                            <td align="right"><?= $this->erp->formatMoney($invs->shipping); ?></td>
                        </tr>
                    <?php endif; ?>

                    <?php if ($invs->order_tax != 0) : ?>
                        <tr class="border-foot">
                            <td colspan="<?= $col2; ?>" style="text-align: right; font-weight: bold;">ពន្ធអាករ / <?= strtoupper(lang('order_tax')) ?></td>
                            <td align="right"><?= $this->erp->formatMoney($invs->order_tax); ?></td>
                        </tr>
                    <?php endif; ?>


                    <?php
                    if($invs->order_discount>0 || $invs->shipping>0 || $invs->order_tax>0){
                        ?>
                        <tr  class="border">
                            <td colspan="<?= $col2; ?>" style="text-align: right; font-weight: bold;">សរុបរួម / <?= strtoupper(lang('total_amount')) ?>
                            </td>
                            <td align="right"><b><?= $this->erp->formatMoney($invs->grand_total); ?></b></td>
                        </tr>
                    <?php } ?>

                    <?php if($invs->paid != 0 || $invs->deposit != 0){ ?>

                        <?php if($invs->paid != 0) { ?>
                            <tr  class="border">
                                <td colspan="<?= $col2; ?>" style="text-align: right; font-weight: bold;">ប្រាក់កក់ / <?= strtoupper(lang('deposit')) ?>

                                </td>
                                <td align="right"><?php echo $this->erp->formatMoney($invs->paid-$invs->deposit); ?></td>
                            </tr>
                        <?php } ?>
                        <?php if($balance != 0) { ?>
                            <tr  class="border">
                                <td colspan="<?= $col2; ?>" style="text-align: right; font-weight: bold;">នៅខ្វះ / <?= strtoupper(lang('balance')) ?>

                                </td>
                                <td align="right"><?= $this->erp->formatMoney($balance); ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>


                    </tbody>

                </table>
            </div>
        </div>
        <?php if($invs->invoice_footer){ ?>


        <?php } ?>

    </div>	<!--div col sm 6 -->

    <div id="footer" class="row">
        <div class="col-sm-4 col-xs-4" style="padding-top: 60px;">
            <center>
                <hr style="margin:0; border:1px solid #000; width: 80%">
                <p style="font-size: 16px !important; margin-top: 4px !important">ហត្ថលេខាអ្នកទិញ</p>
                <p style="margin-top:-5px; font-size: 14px">Customer's Signature</p>
            </center>

        </div>
        <div class="col-sm-4 col-xs-4">
            <center>

            </center>
        </div>
        <div class="col-sm-4 col-xs-4" style="padding-top: 60px;">
            <center>
                <hr style="margin:0; border:1px solid #000; width: 80%">
                <p style="font-size: 16px !important; margin-top: 4px !important">ហត្ថលេខាអ្នកលក់</p>
                <p style="margin-top:-10px; font-size: 14px">Seller's Signature</p>
            </center>

        </div>
    </div>





    <div style="width: 821px;margin: 20px">
            <a class="btn btn-warning no-print" href="<?= site_url('sale_order/list_sale_order'); ?>" style="border-radius: 0">
                <i class="fa fa-hand-o-left" aria-hidden="true"></i>&nbsp;<?= lang("back"); ?>
            </a>
        </div>
    </div>

</body>
<script type="text/javascript">
    if(!<?=$invs->total_discount?$invs->total_discount:0; ?>){
       // $('td:nth-child(7),th:nth-child(7)').hide();
    }
    if(!<?=$invs->product_tax?$invs->product_tax:0; ?>){
        //$('td:nth-child(8),th:nth-child(8)').hide();
    }
</script>
</html>