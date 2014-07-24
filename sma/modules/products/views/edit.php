<style type="text/css">
    .loader {
        background-color: #CF4342;
        color: white;
        top: 30%;
        left: 50%;
        margin-left: -50px;
        position: fixed;
        padding: 3px;
        width: 100px;
        height: 100px;
        background: url('<?php echo $this->config->base_url(); ?>assets/img/wheel.gif') no-repeat center;
    }

    .blackbg {
        z-index: 5000;
        background-color: #666;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
        filter: alpha(opacity=20);
        opacity: 0.2;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        position: absolute;
    }
</style>
<link href="<?php echo $this->config->base_url(); ?>assets/css/bootstrap-fileupload.css" rel="stylesheet">
<script src="<?php echo $this->config->base_url(); ?>assets/js/validation.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('form').form();
        $('#category').change(function () {
                var v = $(this).val();
                $('#loading').show();
                $.ajax({
                    type: "get",
                    async: false,
                    url: "index.php?module=products&view=getSubCategories",
                    data: {
                <?php echo $this->security->get_csrf_token_name(); ?>:
                "<?php echo $this->security->get_csrf_hash() ?>", category_id
                :
                v
            },
            dataType
        :
        "html",
            success
        :
        function (data) {
            if (data != "") {
                $('#subcat_data').empty();
                $('#subcat_data').html(data);
            } else {
                $('#subcat_data').empty();
                var default_data = '<select name="subcategory" class="span4" id="subcategory" data-placeholder="<?php echo $this->lang->line("select_category_to_load"); ?>"></select>';
                $('#subcat_data').html(default_data);
                alert('<?php echo $this->lang->line('no_subcategory'); ?>');
            }
        }

        ,
        error: function () {
            alert('<?php echo $this->lang->line('ajax_error'); ?>');
            $('#loading').hide();
        }

    });
    $("form select").chosen({no_results_text: "No results matched", disable_search_threshold: 5, allow_single_deselect: true });
    $('#loading').hide();
    })
    ;
    })
    ;

</script>

<?php if ($message) {
    echo "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $message . "</div>";
} ?>

<h3 class="title"><?php echo $page_title; ?></h3>
<p><?php echo $this->lang->line("enter_product_info"); ?></p>

<?php $attrib = array('class' => 'form-horizontal');
echo form_open_multipart("module=products&view=edit&id=" . $id, $attrib); ?>

<div class="control-group">
    <label class="control-label" for="code"><?php echo $this->lang->line("product_code"); ?></label>

    <div
        class="controls"> <?php echo form_input('code', $product->code, 'class="span4 tip" id="code" title="' . $this->lang->line("pr_code_tip") . '" required="required" data-error="' . $this->lang->line("product_code") . ' ' . $this->lang->line("is_required") . '"'); ?> </div>
</div>
<!--
#############################################################################
#####################Abdallah - issue #11 - 10-07-2014  - START##############
#############################################################################
-->

<div class="control-group">
    <label class="control-label" for="name"><?php echo $this->lang->line ("product_name"); ?></label>

    <div
        class="controls"> <?php echo form_input ('name', $product->prod_name, 'class="span4 tip" id="name" title="' . $this->lang->line ("pr_name_tip") . '" required="required" data-error="' . $this->lang->line ("product_name") . ' ' . $this->lang->line ("is_required") . '"'); ?> </div>
</div>


<div class="control-group">
    <label class="control-label" for="category"><?php echo $this->lang->line ("category"); ?></label>

    <div class="controls">
        <select name="category">
            <?php foreach ($menus as $menu): ?>
                <option
                    value="<?php echo $menu->id; ?>" <?php if ($product->menu_id == $menu->id) echo 'selected' ?>><?php echo $menu->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="category"><?php echo $this->lang->line ("sub_brand"); ?></label>

    <div class="controls">
        <select name="sub_category">
            <?php foreach ($subbrand as $subbrand): ?>
                <option
                    value="<?php echo $subbrand->id; ?>" <?php if ($product->category_id == $subbrand->id) echo 'selected' ?>><?php echo $subbrand->name; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>


<!--
#############################################################################
#####################Abdallah - issue #11 - 10-07-2014  - END################
#############################################################################
-->

<div class="control-group">
    <label class="control-label" for="unit"><?php echo $this->lang->line("product_unit"); ?></label>

    <div
        class="controls"> <?php echo form_input('unit', $product->unit, 'class="span4 tip" id="unit" title="' . $this->lang->line("pr_unit_tip") . '" required="required" data-error="' . $this->lang->line("product_unit") . ' ' . $this->lang->line("is_required") . '"'); ?> </div>
</div>
<div class="control-group">
    <label class="control-label" for="size"><?php echo $this->lang->line("size"); ?></label>

    <div
        class="controls"> <?php echo form_input('size', $product->size, 'class="span4 tip" id="size" title="' . $this->lang->line("pr_size_tip") . '"'); ?> </div>
</div>

<div class="control-group">
    <label class="control-label" for="cost"><?php echo $this->lang->line("product_cost"); ?></label>

    <div
        class="controls"> <?php echo form_input('cost', $product->cost, 'class="span4 tip" id="cost" title="' . $this->lang->line("pr_cost_tip") . '" required="required" data-error="' . $this->lang->line("product_cost") . ' ' . $this->lang->line("is_required") . '"'); ?> </div>
</div>
<div class="control-group">
    <label class="control-label" for="price"><?php echo $this->lang->line("product_price"); ?></label>

    <div
        class="controls"> <?php echo form_input('price', $product->price, 'class="span4 tip" id="price" title="' . $this->lang->line("pr_price_tip") . '" required="required" data-error="' . $this->lang->line("product_price") . ' ' . $this->lang->line("is_required") . '"'); ?> </div>
</div>
<div class="control-group">
    <label class="control-label" for="alert_quantity"><?php echo $this->lang->line("alert_quantity"); ?></label>

    <div
        class="controls"> <?php echo form_input('alert_quantity', $product->alert_quantity, 'class="span4 tip" id="alert_quantity" title="' . $this->lang->line("alert_quantity_tip") . '" required="required" data-error="' . $this->lang->line("alert_quantity") . ' ' . $this->lang->line("is_required") . '"'); ?> </div>
</div>
<div class="control-group">
    <label class="control-label" for="product_image"><?php echo $this->lang->line("product_image"); ?></label>

    <div class="controls">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <span class="btn btn-file"><span
                    class="fileupload-new"><?php echo $this->lang->line("select_image"); ?></span><span
                    class="fileupload-exists"><?php echo $this->lang->line("change"); ?></span><input type="file"
                                                                                                      name="userfile"
                                                                                                      id="product_image"/></span>
            <span class="fileupload-preview"></span>
            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
        </div>
    </div>
</div>



<div class="control-group">
    <div
        class="controls"> <?php echo form_submit('submit', $this->lang->line("update_product"), 'class="btn btn-primary"'); ?> </div>
</div>
<?php echo form_close(); ?>
<div id="loading" style="display: none;">
    <div class="blackbg"></div>
    <div class="loader"></div>
</div>
