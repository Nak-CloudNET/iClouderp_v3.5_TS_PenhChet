<?php //$this->erp->print_arrays($discount['discount']) ?>
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
    body {
        font-size: 13px !important;
        font-family: "Khmer OS System";
        -moz-font-family: "Khmer OS System";
    }

    .container {
        width: 19.3cm;
    }

    .title {
        font-family: "Khmer OS Muol Light";
        -mox-font-family: "Khmer OS Muol Light";
        font-size: 15px;
    }

    @page {
        size: 8.5in 11in;
        margin: 2%;

        @top-left {
            content: "Hamlet";
        }
        @top-right {
            content: "Page " counter(page);
        }
    }

    @media print {
        #footer {
            /*position: fixed;*/
            /*bottom: 0px;*/
        }
        table.table1 { page-break-inside:auto }

        .container {
            margin-left: -10px !important;
        }

        .customer_label {
            padding-left: 0 !important;
        }

        .invoice_label {
            padding-left: 0 !important;
        }

        .border {
            font-size: 16px !important;
        }

        .row .col-sm-6 table tr, td {
            font-size: 14px !important;
        }

        .table1 thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th {
            background-color: #444 !important;
            color: #FFF !important;
        }

        #note {
            max-width: 95% !important;
            margin: 0 auto !important;
            border-radius: 5px 5px 5px 5px !important;
            margin-left: 26px !important;
            font-size: 12px !important;
        }

        .table1 tr td {
            font-size: 16px !important;
        }

        .thead th span {
            /*font-weight: 700;*/
            color: #ffffff !important;
        }

        .thead th {
            color: #ffffff !important;

        }

    }

    .row .col-sm-6 {
        font-size: 12px;
    }

    .border {
        font-size: 14px;
    }

    .thead th {
        text-align: center !important;
        font-family: "Khmer OS Muol Light";
        -moz-font-family: "Khmer OS System";
        font-size: 14px;
        font-weight: 100;
        padding: 3px;
        color: white;
    !important;
    }

    .thead th span {
        font-weight: 700;

    }
    .company_addr h3:first-child {
        font-family: Khmer OS Muol !important;

    }

    .company_addr h3:nth-child(2) {
        margin-top: -2px !important;
        font-size: 26px !important;
        font-weight: bold;
    }

    .company_addr h3:last-child {
        margin-top: -2px !important;

    }

    .company_addr p {
        font-size: 12px !important;
        margin-top: -10px !important;
        padding-left: 20px !important;
    }

    .inv h4:first-child {
        font-family: Khmer OS Muol !important;
        font-size: 12px !important;
    }

    .inv h4:last-child {
        margin-top: -5px !important;
        font-size: 12px !important;
    }

    button {
        border-radius: 0 !important;
    }

    .header {
        font-family: "Khmer OS Muol Light";
        -moz-font-family: "Khmer OS System";
        font-size: 18px;

    }

    .tb_f tr td {
        font-size: 13px;
    }

    .table1 {
        width: 103%;

    }

    .table1 tr td {
        /*border: 1px solid black;*/
        padding: 4px 4px;
    }

    .no_display{
        display: none;
    }
    @media print {
        .no_display{
            display: table;
            height: 37px
        }
        .table1 .tr_last:nth-child(12){
            border-bottom: 1px solid black;
        }

        .table1 .tr_last:nth-child(25){
            border-top: 1px solid black;
            /*background: red;*/
        }

    }
    .table1 .no_display:first-child td {

    }
    .b_foot td{
        border: 1px solid black!important;
        /*background: red;*/
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#hide").click(function () {
            $(".myhide").toggle();
        });
    });
</script>

<body>
<div class="container" style="margin: 0 auto;">
    <div class="col-xs-12" style="padding: 0">
        <div class="row" style="margin-top: 20px !important;">
            <div class="col-sm-3 col-xs-3 " style=" margin-top: 0px !important;">

                <?php if (!empty($biller->logo)) { ?>
                    <img class="img-responsive myhide" src="<?= base_url() ?>assets/uploads/logos/<?= $biller->logo; ?>"
                         id="hidedlo" style="width: 140px; margin-top: -10px;"/>
                <?php } ?>
            </div>
            <div class="col-sm-7 col-xs-7 company_addr "
                 style="margin-top: -20px !important;margin-left:-20px !important; font-size: 12px !important;">
                <div class="myhide">
                    <center>
                        <?php if ($biller->company) { ?>
                            <h3 class="header"><?= $biller->company ?></h3>
                        <?php } ?>

                        <div style="margin-top: 15px;">
                            <?php if (!empty($biller->vat_no)) { ?>
                                <p style="font-size: 12px !important;white-space: nowrap;">លេខអត្តសញ្ញាណកម្ម អតប (VAT
                                    No):&nbsp;<?= $biller->vat_no; ?></p>
                            <?php } ?>

                            <?php if (!empty($biller->address)) { ?>
                                <p style="margin-top:-10px !important;white-space: nowrap;font-size: 12px !important;">
                                    អាសយដ្ឋាន ៖ &nbsp;<?= $biller->address; ?></p>
                            <?php } ?>

                            <?php if (!empty($biller->phone)) { ?>
                                <p style="margin-top:-10px ;white-space: nowrap;font-size: 12px !important;">
                                    Tel:&nbsp;<?= $biller->phone; ?></p>
                            <?php } ?>

                            <?php if (!empty($biller->email)) { ?>
                                <p style="margin-top:-10px !important;white-space: nowrap;font-size: 12px !important;">
                                    E-mail :&nbsp;<?= $biller->email; ?></p>
                            <?php } ?>
                        </div>

                    </center>
                </div>
                <div class="invoice" style="margin-top:20px;">
                    <center>
                        <h4 style=" font-size: 15px !important;line-height:25px; font-weight: bold;
                        font-family:'Khmer OS Muol Light';
                        -moz-font-family: 'Khmer OS System';
                        font-size: 18px;">តារាងតម្លៃ</h4>
                        <h4 style="font-size: 14px !important;margin-top: 3px;font-weight:bold;">QUOTATION</h4>
                    </center>

                </div>
            </div>
            <div class="col-sm-2 col-xs-2 pull-right">
                <div class="row">
                    <button type="button" class="btn btn-xs btn-default no-print pull-right" style="margin-right:15px;"
                            onclick="window.print();">
                        <i class="fa fa-print"></i> <?= lang('print'); ?>
                    </button>
                </div>
                <div class="row">
                    <button type="button" class="btn btn-xs btn-default no-print pull-right " id="hide"
                            style="margin-right:15px;" onclick="">
                        <i class="fa"></i> <?= lang('Hide/Show_header'); ?>
                    </button>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-xs-6">
                <table class="tb_f1">
                    <?php if (!empty($customer->company)) { ?>

                        <tr>
                            <td style="width: 45%;white-space: nowrap !important;  ">ក្រុមហ៊ុន / Company</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 40%;white-space: nowrap !important; "><?= $customer->company ?></td>
                        </tr>
                    <?php } ?>

                    <?php if (!empty($customer->name_kh || $customer->name)) { ?>
                        <tr>
                            <td style="width: 45%;white-space: nowrap !important; ">អតិថិជន / Customer</td>
                            <td style="width: 5%;">:</td>
                            <?php if (!empty($customer->name_kh)) { ?>
                                <td style="width: 40%;"><?= $customer->name_kh ?></td>
                            <?php } else { ?>
                                <td style="width: 40%;"><?= $customer->name ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    <?php if (!empty($customer->address_kh || $customer->address)) { ?>
                        <tr>
                            <td style="width: 45%;white-space: nowrap !important; ">អាសយដ្ឋាន / Address</td>
                            <td style="width: 5%;">:</td>
                            <?php if (!empty($customer->address_kh)) { ?>
                                <td style="width: 40%;"><?= $customer->address_kh ?></td>
                            <?php } else { ?>
                                <td style="width: 40%;"><?= $customer->address ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    <?php if (!empty($customer->address_kh || $customer->address)) { ?>
                        <tr>
                            <td style="width: 45%;">ទូរស័ព្ទលេខ / (Tel)</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 40%;"><?= $customer->phone ?></td>
                        </tr>
                    <?php } ?>

                </table>
            </div>
            <div class="col-sm-6 col-xs-6" style="padding-left: 60px !important;">
                <table class="tb_f">
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
                            <td style="">រយៈពេលបង់ប្រាក់</td>
                            <td style="">:</td>
                            <td><?= $invs->payment_term ?></td>
                        </tr>
                        <tr>
                            <td style="width: 30% !important; ">កាលបរិច្ឆេទនៃការបង់ប្រាក់</td>
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
        $dis = 0;
        $tax = 0;
        foreach ($rows as $row) {
            $dis += $row->item_discount;
            $tax += $row->item_tax;
        }
        $row_count=count($rows);
//        $this->erp->print_arrays($rows);
        ?>


        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <table class="table1" style=" margin-top: 10px;">
                    <tbody style="font-size: 14px !important;">
                    <tr class="thead" style="background-color: #444 !important; color: #FFF !important;">
                        <th style="border-right: 1px solid black;border-left: 1px solid black">ល.រ<br/><span>No</span></th>
                        <th style="border-right: 1px solid black;">កូដ<br/><span>Code</span></th>
                        <th style="border-right: 1px solid black;">បរិយាយ<br/><span>Description</span>
                        <th style="border-right: 1px solid black;">ចំនួន<br/><span>Qty</span></th>
                        <th style="border-right: 1px solid black;">ខ្នាត<br/><span>Unit</span></th>

                        <th style="border-right: 1px solid black;">តម្លៃ<br/><span>Unit Price</span></th>

                        <?php if ($dis > 0) { ?>
                            <th style="border-right: 1px solid black;">បញ្ចុះតម្លៃ<br/><span>Discount</span></th>
                        <?php } ?>
                        <?php if ($tax > 0) { ?>
                            <th style="border-right: 1px solid black;">ពន្ធទំនិញ<br/><span>Tax</span></th>
                        <?php } ?>

                        <th width="80px" style="border-right: 1px solid black;">តម្លៃសរុប<br/><span>Subtotal</span></th>
                    </tr>
                    <?php

                    $no = 1;
                    $erow = 1;
                    $totalRow = 0;
                    $iii = 1;
                    foreach ($rows as $row) {
                        $iii++;
                        $free = lang('free');
                        $product_unit = '';
                        $total = 0;

                        if ($row->variant) {
                            $product_unit = $row->variant;
                        } else {
                            $product_unit = $row->uname;
                        }
                        $product_name_setting;
                        if ($setting->show_code == 0) {
                            $product_name_setting = $row->product_name . ($row->variant ? ' (' . $row->variant . ')' : '');
                        } else {
                            if ($setting->separate_code == 0) {
                                $product_name_setting = $row->product_name . " (" . $row->product_code . ")" . ($row->variant ? ' (' . $row->variant . ')' : '');
                            } else {
                                $product_name_setting = $row->product_name . ($row->variant ? ' (' . $row->variant . ')' : '');
                            }
                        }
                        $balance = $invs->grand_total - (($invs->paid - $invs->deposit) + $invs->deposit);

                        ?>


                        <tr class="tr_last"  style="border-right: 1px solid black;border-left: 1px solid black;">
                            <td style="vertical-align: middle; text-align: ;border-right: 1px solid black;"><?php echo $no ?></td>
                            <td style="vertical-align: middle;border-right: 1px solid black;">
                                <?= $row->product_code; ?>
                            </td>
                            <td style="vertical-align: middle;border-right: 1px solid black;" class="td_wid">
                                <?= $row->product_name; ?>
                            </td>
                            <td style="vertical-align: middle; text-align: center;border-right: 1px solid black;">
                                <?= $this->erp->formatQuantity($row->quantity); ?>
                            </td>
                            <td style="vertical-align: middle; text-align: center;border-right: 1px solid black;">
                                <?= $row->product_variant ?>
                            </td>

                            <td style="vertical-align: middle; text-align: right;border-right: 1px solid black;">
                                <?php
                                if ($row->unit_price == 0) {
                                    echo "Free";
                                } else {
                                    echo $this->erp->formatMoney($row->unit_price);
                                }
                                ?>
                            </td>
                            <?php if ($dis > 0) { ?>
                                <td style="vertical-align: middle; text-align: center;border-right: 1px solid black;">
                                    <?= $this->erp->formatMoney($row->item_discount); ?></td>
                            <?php } ?>
                            <?php if ($tax > 0) { ?>
                                <td style="vertical-align: middle; text-align: center;border-right: 1px solid black;">
                                    <?= $this->erp->formatMoney($row->item_tax); ?></td>
                            <?php } ?>
                            <td style="vertical-align: middle; text-align: right;border-right: 1px solid black;">
                                <?php
                                if ($row->subtotal == 0) {
                                    echo "Free";
                                } else {
                                    echo $this->erp->formatMoney($row->subtotal);
                                }
                                ?>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        $erow++;
                        $totalRow++;

                        if ($totalRow ==11 && ($row_count-11)!=0) {
                            for($k=0;$k<12;$k++){
                                echo '
                               
                                   <tr class="no_display" style=""></tr>
                                   <!--<tr class="no_display" style="border-bottom: 1px solid black"><td>&nbsp;</td></tr>-->

                                   
                                ';

                            }

                            $iii = 1;
                        }

                    }
                    ?>

                    <?php
                    if ($erow < 13) {
                        $k = 12 - $erow;
                        for ($j = 1; $j <= $k; $j++) {
                            if ($dis > 0) {
                                if ($tax > 0) {
                                    echo '<tr style="border-bottom: 1px solid transparent;">
													<td style="text-align: center; vertical-align: middle;border-right: 1px solid black;border-left: 1px solid black;">&nbsp;</td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
												</tr>';
                                } else {
                                    echo '<tr style="border-bottom: 1px solid transparent;">
                                                    <td style="text-align: center; vertical-align: middle;border-right: 1px solid black;border-left: 1px solid black;">&nbsp;</td>
													<td style="text-align: center; vertical-align: middle;border-right: 1px solid black;">&nbsp;</td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
													
													
												</tr>';
                                }

                            } else {
                                if ($tax > 0) {
                                    echo '<tr style="border-bottom: 1px solid transparent;">
                                                    <td style="text-align: center; vertical-align: middle;border-right: 1px solid black;border-left: 1px solid black;">&nbsp;</td>
													<td  style="text-align: center; vertical-align: middle;border-right: 1px solid black;">&nbsp;</td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
													
													
												</tr>';
                                } else {
                                    echo '<tr style="border-bottom: 1px solid transparent;">
                                                    <td style="text-align: center; vertical-align: middle;border-right: 1px solid black;border-left: 1px solid black;">&nbsp;</td>
													<td  style="text-align: center; vertical-align: middle;border-right: 1px solid black;">&nbsp;</td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
													<td style="border-right: 1px solid black;"></td>
													
												</tr>';
                                }

                            }
                            $no++;
                        }
                    }
                    ?>
                    <?php

                    $row = 1;
                    $col = 3;
                    $col2 = 5;
                    if ($dis <= 0) {
                        $col2--;
                    }
                    if ($tax <= 0) {
                        $col2--;
                    }

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
                    if ($invs->paid != 0 && $invs->deposit != 0) {
                        $row += 3;
                    } elseif ($invs->paid != 0 && $invs->deposit == 0) {
                        $row += 2;
                    } elseif ($invs->paid == 0 && $invs->deposit != 0) {
                    }
                    //$this->erp->print_arrays($invs);

                    ?>

                    <?php $space_count=0; ?>

                    <tr class="border b_foot" style="border-top: 1px solid black;">
                        <td rowspan="<?= $row; ?>" colspan="<?= $col; ?>"
                            style="border-left: 1px solid #FFF !important; border-bottom: 1px solid #FFF !important;">
                            <div style="height: auto;" id="note" class="col-md-12 col-xs-12">
                                <p><strong><u>Note:</u></strong>
                                    <?php echo($invs->invoice_footer); ?></p>
                            </div>
                        </td>
                        <td colspan="<?= $col2; ?>" style="  text-align: right; font-weight: bold;">សរុប​
                            / <?= strtoupper(lang('total')) ?>

                        </td>
                        <td align="right"><b><?= $this->erp->formatMoney($invs->total); ?></b></td>
                    </tr>
                    <?php ?>

                    <?php if ($invs->order_discount != 0) : ?>
                        <tr class="border-foot b_foot">
                            <td colspan="<?= $col2; ?>" style="text-align: right; font-weight: bold;">បញ្ចុះតម្លៃ
                                / <?= strtoupper(lang('order_discount')) ?></td>
                            <td align="right"><?= $this->erp->formatMoney($invs->order_discount); ?></td>
                        </tr>
                    <?php $space_count+=1; endif;  ?>

                    <?php if ($invs->shipping != 0) : ?>
                        <tr class="border-foot b_foot">
                            <td colspan="<?= $col2; ?>" style="text-align: right; font-weight: bold;">ដឹកជញ្ជូន
                                / <?= strtoupper(lang('shipping')) ?></td>
                            <td align="right"><?= $this->erp->formatMoney($invs->shipping); ?></td>
                        </tr>
                    <?php  $space_count+=1;  endif; ?>

                    <?php if ($invs->order_tax != 0) : ?>
                        <tr class="border-foot b_foot">
                            <td colspan="<?= $col2; ?>" style="text-align: right; font-weight: bold;">ពន្ធអាករ
                                / <?= strtoupper(lang('order_tax')) ?></td>
                            <td align="right"><?= $this->erp->formatMoney($invs->order_tax); ?></td>
                        </tr>
                    <?php $space_count+=1;  endif; ?>


                    <?php
                    if ($invs->order_discount > 0 || $invs->shipping > 0 || $invs->order_tax > 0) {
                        ?>
                        <tr class="border b_foot">
                            <td colspan="<?= $col2; ?>" style="text-align: right; font-weight: bold;">សរុបរួម
                                / <?= strtoupper(lang('total_amount')) ?>
                            </td>
                            <td align="right"><b><?= $this->erp->formatMoney($invs->grand_total); ?></b></td>
                        </tr>
                    <?php  $space_count+=1;  } ?>

                    <?php if ($invs->paid != 0 || $invs->deposit != 0) { ?>

                        <?php if ($invs->paid != 0) { ?>
                            <tr class="border b_foot">
                                <td colspan="<?= $col2; ?>" style="text-align: right; font-weight: bold;">ប្រាក់កក់
                                    / <?= strtoupper(lang('deposit')) ?>

                                </td>
                                <td align="right"><?php echo $this->erp->formatMoney($invs->paid - $invs->deposit); ?></td>
                            </tr>
                        <?php $space_count+=1;  } ?>
                        <?php if ($balance != 0) { ?>
                            <tr class="border b_foot">
                                <td colspan="<?= $col2; ?>" style="text-align: right; font-weight: bold;">នៅខ្វះ
                                    / <?= strtoupper(lang('balance')) ?>

                                </td>
                                <td align="right"><?= $this->erp->formatMoney($balance); ?></td>
                            </tr>
                        <?php   $space_count+=1;  } ?>
                    <?php } ?>


                    </tbody>

                </table>
                <table>
                    <?php
                    for($space_count;$space_count<7;$space_count++){
                        echo '
                <tr>
                    <td height="30px"></td>
                </tr>
                ';
                    }
                    ?>

                </table>
            </div>
        </div>


    </div>    <!--div col sm 6 -->


    <div id="footer" class="row">
        <div class="col-sm-4 col-xs-4" style="">
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
        <div class="col-sm-4 col-xs-4" style="">
            <center>
                <hr style="margin:0; border:1px solid #000; width: 80%">
                <p style="font-size: 16px !important; margin-top: 4px !important">ហត្ថលេខាអ្នកលក់</p>
                <p style="margin-top:-10px; font-size: 14px">Seller's Signature</p>
            </center>

        </div>
    </div>

    <div style="width: 821px;margin: 20px">

        <a class="btn btn-warning no-print" href="<?= site_url('sale_order/list_sale_order'); ?>"
           style="border-radius: 0">
            <i class="fa fa-hand-o-left" aria-hidden="true"></i>&nbsp;<?= lang("back"); ?>
        </a>
    </div>
</div>
<?php

?>
</body>
<script type="text/javascript">
    if (!<?=$invs->total_discount ? $invs->total_discount : 0; ?>) {
        // $('td:nth-child(7),th:nth-child(7)').hide();
    }
    if (!<?=$invs->product_tax ? $invs->product_tax : 0; ?>) {
        //$('td:nth-child(8),th:nth-child(8)').hide();
    }
</script>
</html>