<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $page_title . " " . $this->lang->line("no") . " " . $inv->id; ?></title>
    <link rel="shortcut icon" href="<?php echo $this->config->base_url(); ?>assets/img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo $this->config->base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $this->config->base_url(); ?>assets/css/rwd-table.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo $this->config->base_url(); ?>assets/js/jquery.js"></script>
    <style type="text/css">
        html, body {
            height: 100%;
            font-size: 12px;
            line-height: 100%; /* font-family: "Segoe UI", Candara, "Bitstream Vera Sans", "DejaVu Sans", "Bitstream Vera Sans", "Trebuchet MS", Verdana, "Verdana Ref", sans-serif; */
        }

        #wrap {
            padding: 20px;
        }

        .table th {
            text-align: center;
        }
    </style>
    <style type="text/css" media="all">
        #wrapper {
            width: 800px;
            margin: 0 auto;
            text-align: center;
            color: #000;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            height: 100%;
        }

        #wrapper img {
            width: 80%;
        }

        h3 {
            margin: 5px 0;
        }

        .left {
            width: 25%;
            float: left;
            text-align: left;
            margin-bottom: 3px;
        }

        .bold {
            font-weight: bold;
        }

        .right {
            width: 25%;
            float: right;
            text-align: right;
            margin-bottom: 10px;
        }

        .table, .totals {
            width: 100%;
            margin: 10px 0;
        }

        .table th {
            border-bottom: 1px solid #000;
        }

        .table td {
            padding: 0;
        }

        .totals td {
            width: 24%;
            padding: 0;
        }

        .table td:nth-child(2) {
            overflow: hidden;
        }
    </style>
    <style type="text/css" media="print">
        #buttons {
            display: none;
        }
    </style>
</head>

<body>
<img src="<?php echo $this->config->base_url(); ?>assets/uploads/logos/<?php echo $biller->logo; ?>" alt="SITE_NAME"/>
<!--<img src="<?php echo $this->config->base_url(); ?>assets/img/<?php echo $inv->status; ?>.png" alt="<?php echo $inv->status; ?>" style="float: right; position: absolute; top:0; right: 0;"/>-->
<div id="wrapper">
    <h3 style="text-transform:uppercase;"><?php echo $biller->company; ?></h3>
    <?php echo "<p style=\"text-transform:capitalize;\">" . $biller->address . ", " . $biller->city . ", " . $biller->country . "</p>";
    ?>
    <div class="row-fluid">
        <div class="span6">

            <p></p>
            <br/>
            <br/>
            <br/>
            <?php


            echo "<p align = 'left'>
	<br /><br />" . $this->lang->line("tel") . ": " . $biller->phone . "<br /><br />" . $this->lang->line("fax") . ": " . $biller->fax . "<br /><br />" . $this->lang->line("mobile") . ": " . $biller->mobile_number . "<br /><br />" . $this->lang->line("email") . ": " . $biller->email;
            echo "</p>";

            echo "<p align = 'left'>";

            /* Yogesh - issue #Add Due Date, teamleader, remove reference_no, on invoice - 04-07-2014 - START*/
            {
                echo "<br />" . $this->lang->line("teamleader") . ": " . $customer->coordinator_name;
            }
            // { echo "<br />".$this->lang->line("reference_no").": ".$inv->reference_no; }
            {
                echo "<br />" . $this->lang->line("deliver_type") . ": " . $inv->deliver_type;
            }
            {
                echo "<br />" . $this->lang->line("order_type") . ": " . $inv->order_type . "(" . $inv->served_by . ")";
            }
            {
                echo "<br />" . $this->lang->line("due_date") . ": " . $inv->due_date;
            }
            {
                echo "<br />" . $this->lang->line("date") . ": " . date(PHP_DATE, strtotime($inv->date));
            }
            /* Yogesh - issue #30 - 04-07-2014  - END */
            echo "</p>";
            ?>


            <div class="span6">
                <h4 class="inv"><?php echo "<br /><br />" . $this->lang->line("invoice") . " " . $this->lang->line("no") . " " . $inv->id; ?></h4>
            </div>

        </div>

        <div class="pull-right">
            <h1 style="text-align: left;"><?php echo $this->lang->line("vat_invoice"); ?></h1>

            <p style="text-align: left;"><?php echo $this->lang->line("billed_to"); ?>:
            <h5 style="text-align: left;"><?php if ($customer->company != "-") {
                    echo $customer->company;
                } else {
                    echo $customer->name;
                } ?></h5>

            <p><?php if ($customer->company != "-") {
                    echo "<p align=left>Consultant Name: " . $customer->name . "</p>";
                } ?>

            <p style="text-align: left;"><?php if ($customer->address != "-") {
                    echo $this->lang->line("address") . ": " . $customer->address . "," . $customer->country . "<br/>";
                } ?>

            <p style="text-align: left;"> <?php echo $this->lang->line("customer_id") . ": " . $customer->id; ?>

            <p style="text-align: left;"> <?php echo $this->lang->line("payment_type") . ": " . $inv->paid_by; ?>

            <p style="text-align: left;"> <?php echo $this->lang->line("tel") . ": " . $customer->mobile_number; ?>

            <p style="text-align: left;"><?php echo $this->lang->line("email") . ": " . $customer->email; ?></p>
            <h5 style="text-align: left;"><?php echo $this->lang->line("region") . ": " . $customer->region; ?></h5>
            <!--  <?php
            if ($customer->cf1 != "-" && $customer->cf1 != "") {
                echo "<br />" . $this->lang->line("ccf1") . ": " . $customer->cf1;
            }
            if ($customer->cf2 != "-" && $customer->cf2 != "") {
                echo "<br />" . $this->lang->line("ccf2") . ": " . $customer->cf2;
            }
            if ($customer->cf3 != "-" && $customer->cf3 != "") {
                echo "<br />" . $this->lang->line("ccf3") . ": " . $customer->cf3;
            }
            if ($customer->cf4 != "-" && $customer->cf4 != "") {
                echo "<br />" . $this->lang->line("ccf4") . ": " . $customer->cf4;
            }
            if ($customer->cf5 != "-" && $customer->cf5 != "") {
                echo "<br />" . $this->lang->line("ccf5") . ": " . $customer->cf5;
            }
            if ($customer->cf6 != "-" && $customer->cf6 != "") {
                echo "<br />" . $this->lang->line("ccf6") . ": " . $customer->cf6;
            }
            ?>-->

        </div>
    </div>
    <div style="clear: both;"></div>
    <p>&nbsp;</p>

    <div class="row-fluid">

        <!--<div class="span6">

<p style="font-weight:bold;"><?php echo $this->lang->line("coordinator_name"); ?>: <?php echo $inv->coordinator_name; ?></p>

<p style="font-weight:bold;"><?php echo $this->lang->line("reference_no"); ?>: <?php echo $inv->reference_no; ?></p>

<p style="font-weight:bold;"><?php echo $this->lang->line("deliver_type"); ?>: <?php echo $inv->deliver_type; ?></p>

<p style="font-weight:bold;"><?php echo $this->lang->line("order_type"); ?>: <?php echo $inv->order_type; ?></p>

<p style="font-weight:bold;"><?php echo $this->lang->line("date"); ?>: <?php echo date(PHP_DATE, strtotime($inv->date)); ?></p>
<p>&nbsp;</p>    
</div>-->
        <div style="clear: both;"></div>
    </div>

    <table class="table table-bordered table-hover table-striped" style="margin-bottom: 5px;">

        <thead>

        <tr>

            <th style="text-align:center; vertical-align:middle;"><?php echo $this->lang->line("no"); ?></th>
            <th style="vertical-align:middle;"><?php echo $this->lang->line("description"); ?></th>
            <!-- <?php if (PRODUCT_SERIAL) {
                echo '<th style="text-align:center; vertical-align:middle;">' . $this->lang->line("serial_no") . '</th>';
            } ?>-->

            <!--<?php if (TAX1) {
                echo '<th style="text-align:center; vertical-align:middle;">' . $this->lang->line("tax") . '</th>';
            } ?>-->

            <th style="text-align:center; vertical-align:middle;"><?php echo $this->lang->line("quantity"); ?></th>
            <th style="padding-right:20px; text-align:center; vertical-align:middle;"><?php echo $this->lang->line("unit_price"); ?></th>
            <?php if (DISCOUNT_OPTION == 2) {
                echo '<th style="text-align:center; vertical-align:middle;">' . $this->lang->line("discount") . '</th>';
            } ?>
            <?php if (TAX1) {
                echo '<th style="padding-right:20px; text-align:center; vertical-align:middle;">' . $this->lang->line("tax") . '</th>';
            } ?>
            <th style="padding-right:20px; text-align:center; vertical-align:middle;"><?php echo $this->lang->line("subtotal"); ?></th>
        </tr>

        </thead>

        <tbody>

        <?php $r = 1;
        foreach ($rows as $row): ?>
            <tr>
                <td style="text-align:center; width:40px; vertical-align:middle;"><?php echo $r; ?></td>
                <td style="vertical-align:middle; width: 300px;"><?php echo $row->product_name . " (" . $row->product_code . ")"; ?></td>

                <!--<?php if (PRODUCT_SERIAL) {
                    echo '<td style="width: 100px; text-align:center; vertical-align:middle;">' . $row->serial_no . '</td>';
                } ?>-->

                <!--<?php if (TAX1) {
                    echo '<td style="width: 70px; text-align:center; vertical-align:middle;">' . $row->tax . '</td>';
                } ?>-->

                <td style="width: 70px; text-align:center; vertical-align:middle;"><?php echo $row->quantity; ?></td>
                <td style="width: 100px; text-align:center; padding-right:10px; vertical-align:middle;"><?php echo $this->ion_auth->formatMoney($row->unit_price); ?></td>

                <?php if (DISCOUNT_OPTION == 2) {
                    echo '<td style="width: 80px; text-align:center; vertical-align:middle;">' . $row->discount_val . '</td>';
                } ?>
                <?php if (TAX1) {
                    echo '<td style="width: 80px; text-center; vertical-align:middle;"><!--<small>(' . $row->tax . ')</small>--> ' . $row->val_tax . '</td>';
                } ?>

                <td style="width: 100px; text-align:right; padding-right:10px; vertical-align:middle;"><?php echo $this->ion_auth->formatMoney($row->gross_total); ?></td>
            </tr>
            <?php
            $r++;
        endforeach;
        ?>
        <?php $col = 4;
        if (PRODUCT_SERIAL) {
            $col += 1;
        }
        if (DISCOUNT_OPTION == 2) {
            $col += 1;
        }
        if (TAX1) {
            $col += 1;
        } ?>

        <?php if (TAX1 || TAX2 || DISCOUNT_OPTION == 1 || DISCOUNT_OPTION == 2) {
            echo '<tr><td colspan="' . $col . '" style="text-align:right; padding-right:10px;;">' . $this->lang->line("total") . ' (' . CURRENCY_PREFIX . ')</td><td style="text-align:right; padding-right:10px;">' . $this->ion_auth->formatMoney($inv->inv_total) . '</td></tr>';
        } ?>
        <!-- Yogesh - issue #Add discount row on invoice - 04-07-2014 - START-->
        <?php if (DISCOUNT_OPTION == 1 || DISCOUNT_OPTION == 2) {
            echo '<tr><td colspan="' . $col . '" style="text-align:right; padding-right:10px;;">' . $this->lang->line("discount") . ' (' . CURRENCY_PREFIX . ')</td><td style="text-align:right; padding-right:10px;">' . $this->ion_auth->formatMoney($inv->inv_discount) . '</td></tr>';
        } ?>
        <!-- Yogesh - issue #30 - 04-07-2014  - END -->
        <?php if (TAX1) {
            echo '<tr><td colspan="' . $col . '" style="text-align:right; padding-right:10px;;">' . $this->lang->line("product_tax") . ' (' . CURRENCY_PREFIX . ')</td><td style="text-align:right; padding-right:10px;">' . $this->ion_auth->formatMoney($inv->total_tax) . '</td></tr>';
        } ?>
        <?php if (TAX2) {
            echo '<tr><td colspan="' . $col . '" style="text-align:right; padding-right:10px;;">' . $this->lang->line("invoice_tax") . ' (' . CURRENCY_PREFIX . ')</td><td style="text-align:right; padding-right:10px;">' . $this->ion_auth->formatMoney($inv->total_tax2) . '</td></tr>';
        } ?>
        <?php {
            echo '<tr><td colspan="' . $col . '" style="text-align:right; padding-right:10px;;">' . $this->lang->line("total_items") . '</td><td style="text-align:right; padding-right:10px;">' . ($inv->count) . '</td></tr>';
        } ?>
        <?php if ($inv->shipping != 0) {
            echo '<tr><td colspan="' . $col . '" style="text-align:right; padding-right:10px;;">' . $this->lang->line("shipping") . ' (' . CURRENCY_PREFIX . ')</td><td style="text-align:right; padding-right:10px;">' . $this->ion_auth->formatMoney($inv->shipping) . '</td></tr>';
        } ?>
        <tr>
            <td colspan="<?php echo $col; ?>"
                style="text-align:right; padding-right:10px; font-weight:bold;"><?php echo $this->lang->line("total_amount"); ?>
                (<?php echo CURRENCY_PREFIX; ?>)
            </td>
            <td style="text-align:right; padding-right:10px; font-weight:bold;"><?php echo $this->ion_auth->formatMoney($inv->total + $inv->shipping); ?></td>
        </tr>

        </tbody>

    </table>
    <div style="clear: both;"></div>
    <div class="row-fluid">
        <div class="span12">
            <?php if ($inv->note || $inv->note != "") { ?>
                <p>&nbsp;</p>
                <p><span
                        style="font-weight:bold; font-size:14px; margin-bottom:5px;"><?php echo $this->lang->line("note"); ?>
                        :</span></p>
                <p><?php echo html_entity_decode($inv->note); ?></p>

            <?php } ?>
        </div>
    </div>
    <div style="clear: both;"></div>
    <div class="row-fluid">
        <div class="span5">

            <!-- Yogesh - issue #swap buyer and owner - 04-07-2014 - START-->
            <p>&nbsp;</p>

            <p><?php echo $this->lang->line("issued_by"); ?>: <?php echo $inv->user; ?> </p>

            <p style="border-bottom: 1px solid #666;">&nbsp;</p>

            <p><?php echo $this->lang->line("signature") . " &amp; " . $this->lang->line("stamp");; ?></p>
        </div>

        <div class="span5 offset2">
            <p>&nbsp;</p>

            <p><?php echo $this->lang->line("buyer"); ?>: <?php if ($customer->company != "-") {
                    echo $customer->company;
                } else {
                    echo $customer->name;
                } ?> </p>

            <p style="border-bottom: 1px solid #666;">&nbsp;</p>

            <p><?php echo $this->lang->line("signature") . " &amp; " . $this->lang->line("stamp");; ?></p>
        </div>
        <!-- Yogesh - issue #30 - 04-07-2014  - END -->

        <!-- Yogesh - issue #Add approved_by_credit_controller - 04-07-2014 - START-->
        <div class="span4 offset2" style="margin-left: 23px;">
            <p>&nbsp;</p>

            <p><?php echo $this->lang->line("approved_by_credit_controller"); ?></p>

            <p style="border-bottom: 1px solid #666;">&nbsp;</p>

            <p><?php echo $this->lang->line("signature") . " &amp; " . $this->lang->line("stamp");; ?></p>
        </div>
        <!-- Yogesh - issue #30 - 04-07-2014  - END -->

    </div>

    <!-- Yogesh - issue #Add add footer text - 08-07-2014 - START-->
    <div style="border-top:1px solid #000; padding-top:10px;">
        <?php echo html_entity_decode($biller->invoice_footer); ?><br/>
        <strong><big> TERMS AND CONDITIONS ON INVOICES </big></strong><br/>

        <div style="font-size: 14px;">
            Payment shall be effected not later than 14 days of invoice date.<br/>
            Surcharge of 9.5% p.a shall be charged on all overdue accounts with a minimum charge of Rs25.(NON
            NEGOCIABLE)<br/>
            Products once sold are neither returnable nor refundable.
        </div>
    </div>
    <!-- Yogesh - issue #30 - 08-07-2014  - END -->

    <div id="buttons" style="padding-top:10px; text-transform:uppercase;">
        <span class="left"><a href="<?php echo base_url(); ?>index.php?module=sales"
                              style="width:80%; display:block; font-size:12px; text-decoration: none; text-align:center; color:#000; background-color:#4FA950; border:2px solid #4FA950; padding: 10px 1px; border-radius:5px;">Back
                to Sales</a></span>
        <span class="right"><button type="button" onClick="window.print();return false;"
                                    style="width:80%; cursor:pointer; font-size:12px; background-color:#FFA93C; color:#000; text-align: center; border:1px solid #FFA93C; padding: 10px 1px; border-radius:5px;">
                Print
            </button></span>

        <div style="clear:both;"></div>
    </div>

</div>
</body>
</html>