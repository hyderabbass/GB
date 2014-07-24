<script src="<?php echo $this->config->base_url(); ?>assets/media/js/jquery.dataTables.columnFilter.js"
        type="text/javascript"></script>
<style type="text/css">
    .text_filter {
        width: 100% !important;
        border: 0 !important;
        box-shadow: none !important;
        border-radius: 0 !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    .select_filter {
        width: 100% !important;
        padding: 0 !important;
        height: auto !important;
        margin: 0 !important;
    }
</style>
<script>
    $(document).ready(function () {
        $('#fileData').dataTable({
            "aLengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "aaSorting": [
                [ 0, "desc" ]
            ],
            "iDisplayLength": <?php echo ROWS_PER_PAGE; ?>,
            'bProcessing': true,
            'bServerSide': true,
            'sAjaxSource': '<?php echo base_url(); ?>index.php?module=customers&view=getdatatableajax',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({ "name": "<?php echo $this->security->get_csrf_token_name(); ?>", "value": "<?php echo $this->security->get_csrf_hash() ?>" });
                $.ajax
                ({
                    'dataType': 'json',
                    'type': 'POST',
                    'url': sSource,
                    'data': aoData,
                    'success': fnCallback
                });
            },
            "oTableTools": {
                "sSwfPath": "assets/media/swf/copy_csv_xls_pdf.swf",
                "aButtons": [
                    // "copy",
                    "csv",
                    "xls",
                    {
                        "sExtends": "pdf",
                        "sPdfOrientation": "landscape",
                        "sPdfMessage": ""
                    },
                    "print"
                ]
            },
            "oLanguage": {
                "sSearch": "Filter: "
            }, "fnDrawCallback": function (oSettings) { // Hyder - issue#29 - 9 June 2014  -START
                // alert( 'DataTables has redrawn the table' );
                $("tbody tr td:nth-child(7),thead tr th:nth-child(7)").hide();
                $("tbody tr td:nth-child(7)").each(function (index) {
                    var blue = $(this).text();
                    if (blue == 'yes') {
                        $(this).parent().css('background-color', '#d9edf7');
                    }
                });


                $("tbody tr td:nth-child(8)").each(function (index) {
                    var status = $(this).text().trim();

                    if (status != 'approved') {

                        $(this).find('.icon-thumbs-up').removeClass('icon-thumbs-up').addClass('icon-thumbs-down');
                    }
                });


            }, // Hyder - issue#29 - 9 June 2014  -END
            "aoColumns": [
                null,
                null,
                null,
                null,// Hyder - issue#29 - 9 June 2014  - mone ajoute n
                null,
                null,
                null,

                { "bSortable": false }
            ]

        }).columnFilter({ aoColumns: [
            //{ type: "text", bRegex:true },
            //null, null, null, null, null, null, null, null,
            { type: "text", bRegex: true },
            { type: "text", bRegex: true },
            { type: "text", bRegex: true },
            { type: "text", bRegex: true },
            { type: "text", bRegex: true },
            { type: "text", bRegex: true },
            { type: "text", bRegex: true },
            null

        ]});


        // Hyder - issue#29 - 9 June 2014  - START - Approve customer


        $(document.body).on('click', 'a.approve', function () {
            var sa = $(this).find('#approval_icon');
            var status = $(this).children().first().attr('class');

            var approval_url = 'index.php?module=customers&view=approve_customer&id=' + $(this).attr('id') + "&status=" + status;
            $.get(approval_url, function (data) {
                if (data == 'approved') {
                    sa.removeClass('icon-thumbs-down').addClass('icon-thumbs-up');
                } else {
                    sa.removeClass('icon-thumbs-up').addClass('icon-thumbs-down');
                }

            });

            return false;
        });


        // Hyder - issue#29 - 9 June 2014  -END  - Approve customer
    });

</script>

<?php if ($success_message) {
    echo "<div class=\"alert alert-success\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $success_message . "</div>";
} ?>
<?php if ($message) {
    echo "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $message . "</div>";
} ?>


<h3 class="title"><?php echo $page_title; ?></h3>
<p class="introtext"><?php echo $this->lang->line("list_results"); ?></p>
<!-- // Hyder - issue#29 - 9 June 2014  - START -->
<style>
    .table-striped tbody > tr:nth-child(2n+1) > td, .table-striped tbody > tr:nth-child(2n+1) > th {
        background-color: transparent;
    }
</style>
<!-- // Hyder - issue#29 - 9 June 2014  - END -->
<table id="fileData" cellpadding=0 cellspacing=10 class="table table-bordered table-hover table-striped">
    <thead>
    <tr>
        <th><?php echo $this->lang->line("name"); ?></th>
        <th><?php echo $this->lang->line("surname"); ?></th>

        <th><?php echo $this->lang->line("home_number"); ?></th>
        <th><?php echo $this->lang->line("email_address"); ?></th>
        <th><?php echo $this->lang->line("region"); ?></th>
        <th>Type</th>
        <th>Blue</th>
        <th><?php echo $this->lang->line("actions"); ?></th>
    </tr>
    </thead>


</table>

<p><a href="<?php echo site_url('module=customers&view=add'); ?>"
      class="btn btn-primary"><?php echo $this->lang->line("add_customer"); ?></a></p>
