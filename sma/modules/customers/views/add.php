<link href="<?php echo $this->config->base_url(); ?>assets/css/datepicker.css" rel="stylesheet">
<script src="<?php echo $this->config->base_url(); ?>assets/js/validation.js"></script>
<script type="text/javascript">
    $(function () {

        $("#dob").datepicker({
            format: "<?php echo JS_DATE; ?>",
            autoclose: true
        });
        $("#dob").datepicker("setDate", new Date());

        $("#training_date").datepicker({
            format: "<?php echo JS_DATE; ?>",
            autoclose: true
        });
        $("#training_date").datepicker("setDate", new Date());

        $('form').form();
        $('#payment_type_l').on('click', function () {
            setTimeout(function () {
                $('#payment_type_s').trigger('liszt:open');
            }, 0);
        });
        $('#credit_allowance_l').on('click', function () {
            setTimeout(function () {
                $('#credit_allowance_s').trigger('liszt:open');
            }, 0);
        });
        $('#region_l').on('click', function () {
            setTimeout(function () {
                $('#region_s').trigger('liszt:open');
            }, 0);
        });
    });
</script>

<?php if ($message) {
    echo "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $message . "</div>";
} ?>


<h3 class="title"><?php echo $page_title; ?></h3>
<p><?php echo $this->lang->line("enter_info"); ?></p>

<?php $attrib = array('class' => 'form-horizontal');
echo form_open("module=customers&view=add", $attrib); ?>
<!-- Hyder - issue #31 - 4 June 2014 - START -->
<div class="control-group">
    <label class="control-label" for="team_leader">Team Leader</label>

    <div class="controls">

        <select id="team_leader" name="team_leader">
            <option id="0" value="0">NONE</option>
            <?php
            foreach ($teamleaders as $value) {
                $userid = $value->id;
                $teamleader_name = ucfirst($value->name) . ' ' . ucfirst($value->surname);
                ?>

                <option id="<?php echo $userid; ?>"
                        value="<?php echo $userid; ?>"><?php echo $teamleader_name; ?></option>
            <?php

            }
            ?>


        </select>
    </div>
</div>
<!-- Hyder - issue #31 - 4 June 2014 - END -->
<div class="control-group">
    <label class="control-label" for="surname"><?php echo $this->lang->line("surname"); ?></label>

    <div
        class="controls"> <?php echo form_input($surname, '', 'class="span4" id="surname" pattern=".{2,55}" required="required" data-error="' . $this->lang->line("surname") . ' ' . $this->lang->line("is_required") . '"'); ?>
    </div>
</div>



<div class="control-group">
    <label class="control-label" for="name"><?php echo $this->lang->line("name"); ?></label>

    <div
        class="controls"> <?php echo form_input($name, '', 'class="span4" id="name" pattern=".{2,55}" required="required" data-error="' . $this->lang->line("name") . ' ' . $this->lang->line("is_required") . '"'); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="email_address"><?php echo $this->lang->line("email_address"); ?></label>

    <div class="controls"><input type="email" name="email" class="span4"/>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="home_number"><?php echo $this->lang->line("home_number"); ?></label>

    <div class="controls"><input type="tel" name="home_number" class="span4" pattern="[0-9]{7,15}"/>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="mobile_number"><?php echo $this->lang->line("mobile_number"); ?></label>

    <div class="controls"><input type="tel" name="mobile_number" class="span4" pattern="[0-9]{7,15}" required="required"
                                 data-error="<?php echo $this->lang->line("mobile_number") . ' ' . $this->lang->line("is_required"); ?>"/>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="emergency_number"><?php echo $this->lang->line("emergency_number"); ?></label>

    <div class="controls"><input type="tel" name="emergency_number" class="span4" pattern="[0-9]{7,15}"/>
    </div>
</div>
<!--<div class="control-group">
  <label class="control-label" for="dob"><?php echo $this->lang->line("dob"); ?></label>
  <div class="controls"> <?php echo form_input($dob, '', 'class="span4 tip" title="' . $this->lang->line("dob_format") . '" id="dob" pattern=".{2,55}" required="required" data-error="' . $this->lang->line("dob") . ' ' . $this->lang->line("is_required") . '"'); ?>
</div>
</div>
<div class="control-group">
  <label class="control-label" for="company"><?php echo $this->lang->line("company"); ?></label>
  <div class="controls"> <?php echo form_input($company, '', 'class="span4 tip" title="' . $this->lang->line("bypass") . '" id="company" pattern=".{1,55}" required="required" data-error="' . $this->lang->line("company") . ' ' . $this->lang->line("is_required") . '"'); ?>
  </div>
</div>-->

<div class="control-group">
    <label class="control-label" for="company"><?php echo $this->lang->line("company"); ?></label>

    <div class="controls"> <?php echo form_input('company', '', 'class="span4" id="company" pattern=".{2,55}" "'); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="dob"><?php echo $this->lang->line("dob"); ?></label>

    <div
        class="controls"> <?php echo form_input($dob, (isset($_POST['dob']) ? $_POST['dob'] : ""), 'class="span4" id="dob" required="required" data-error="' . $this->lang->line("dob") . ' ' . $this->lang->line("is_required") . '"'); ?></div>
</div>
<div class="control-group">
    <label class="control-label" for="training_date"><?php echo $this->lang->line("training_date"); ?></label>

    <div
        class="controls"> <?php echo form_input($training_date, (isset($_POST['training_date']) ? $_POST['training_date'] : ""), 'class="span4" id="training_date" required="required" data-error="' . $this->lang->line("training_date") . ' ' . $this->lang->line("is_required") . '"'); ?></div>
</div>
<!--<div class="control-group">
  <label class="control-label" for="training_date"><?php echo $this->lang->line("training_date"); ?></label>
  <div class="controls"> <?php echo form_input($training_date, '', 'class="span4 tip" title="' . $this->lang->line("training_date_format") . '" id="training_date" pattern=".{2,55}" required="required" data-error="' . $this->lang->line("training_date") . ' ' . $this->lang->line("is_required") . '"'); ?>
</div>
</div>-->
<div class="control-group">
    <label class="control-label" for="address"><?php echo $this->lang->line("address"); ?></label>

    <div
        class="controls"> <?php echo form_input($address, '', 'class="span4" id="address" pattern=".{2,255}" required="required" data-error="' . $this->lang->line("address") . ' ' . $this->lang->line("is_required") . '"'); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" id="region_l"><?php echo $this->lang->line("region"); ?></label>

    <div class="controls">  <?php
        $wh[''] = '';
        foreach ($region_days as $region) {
            $wh[$region->region] = $region->region;
        }
        echo form_dropdown('region', $wh, (isset($_POST['region']) ? $_POST['region'] : DEFAULT_REGION), 'id="region_s" data-placeholder="' . $this->lang->line("select") . ' ' . $this->lang->line("region") . '" required="required" data-error="' . $this->lang->line("region") . ' ' . $this->lang->line("is_required") . '"'); ?> </div>
</div>
<!--<div class="control-group">
  <label class="control-label" for="country"><?php echo $this->lang->line("country"); ?></label>
  <div class="controls"> <?php echo form_input($country, '', 'class="span4" id="country" pattern=".{2,55}" required="required" data-error="' . $this->lang->line("country") . ' ' . $this->lang->line("is_required") . '"'); ?>
  </div>
</div>-->
<div class="control-group">
    <label class="control-label"
           for="alternative_address"><?php echo $this->lang->line("alternative_address"); ?></label>

    <div
        class="controls"> <?php echo form_input($alternative_address, '', 'class="span4" id="alternative_address" pattern=".{2,55}"'); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="postal_code"><?php echo $this->lang->line("postal_code"); ?></label>

    <div
        class="controls"> <?php echo form_input($postal_code, '', 'class="span4" id="postal_code"pattern=".{4,8}" required="required" data-error="' . $this->lang->line("postal_code") . ' ' . $this->lang->line("is_required") . '"'); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="id_number"><?php echo $this->lang->line("id_number"); ?></label>

    <div
        class="controls"> <?php echo form_input('id_number', '', 'class="span4" id="id_number" pattern=".{2,55}" required="required" data-error="' . $this->lang->line("id_number") . ' ' . $this->lang->line("is_required") . '"'); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="religion"><?php echo $this->lang->line("religion"); ?></label>

    <div class="controls"> <?php echo form_input('religion', '', 'class="span4" id="religion" pattern=".{2,55}" "'); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="work_number"><?php echo $this->lang->line("work_number"); ?></label>

    <div
        class="controls"> <?php echo form_input('work_number', '', 'class="span4" id="work_number" pattern=".{2,55}" "'); ?>
    </div>
</div>
<!-- Hyder - issue #29 - 8 June 2014 - START  -->
<div class="control-group">
    <label class="control-label" id="blue">Status</label>

    <div class="controls">
        <select name="blue" id="blue" data-placeholder="Select status" required="required" data-error="status is required or need attention.">
            <option value="no" name="no">Normal</option>
            <option value="yes">Blue card holder</option>

        </select>
    </div>
</div>
<!-- Hyder - issue #29 - 8 June 2014 - END  -->

<div class="control-group">
    <label class="control-label" id="credit_allowance_l"><?php echo $this->lang->line("credit_allowance"); ?></label>

    <div class="controls">  <?php
        $whxx[''] = '';
        foreach ($credit_allowances as $credit_allowance) {
            $whxx[$credit_allowance->name] = $credit_allowance->name;
        }
        echo form_dropdown('credit_allowance', $whxx, (isset($_POST['credit_allowance']) ? $_POST['credit_allowance'] : DEFAULT_CREDIT_ALLOWANCE), 'id="credit_allowance_s" data-placeholder="' . $this->lang->line("select") . ' ' . $this->lang->line("credit_allowance") . '" required="required" data-error="' . $this->lang->line("credit_allowance") . ' ' . $this->lang->line("is_required") . '"'); ?> </div>
</div>
<div class="control-group">
    <label class="control-label" for="place_of_work"><?php echo $this->lang->line("place_of_work"); ?></label>

    <div
        class="controls"> <?php echo form_input('place_of_work', '', 'class="span4" id="place_of_work" pattern=".{2,55}" "'); ?>
    </div>
</div>
<!--<div class="control-group">
  <label class="control-label" for="no_of_work"><?php echo $this->lang->line("no_of_work"); ?></label>
  <div class="controls"> <?php echo form_input('no_of_work', '', 'class="span4" id="no_of_work" pattern=".{2,55}" required="required" data-error="' . $this->lang->line("no_of_work") . ' ' . $this->lang->line("is_required") . '"'); ?>
  </div>
</div>-->
<div class="control-group">
    <label class="control-label" id="payment_type_l"><?php echo $this->lang->line("payment_type"); ?></label>

    <div class="controls">  <?php
        $whx[''] = '';
        foreach ($payment_types as $payment_type) {
            $whx[$payment_type->name] = $payment_type->name;
        }
        echo form_dropdown('payment_type', $whx, (isset($_POST['payment_type']) ? $_POST['payment_type'] : DEFAULT_PAYMENT_TYPE), 'id="payment_type_s" data-placeholder="' . $this->lang->line("select") . ' ' . $this->lang->line("payment_type") . '" required="required" data-error="' . $this->lang->line("payment_type") . ' ' . $this->lang->line("is_required") . '"'); ?> </div>
</div>

<div class="control-group">
    <label class="control-label" for="proof_of_address"><?php echo $this->lang->line("proof_of_address"); ?></label>

    <div class="controls">    <?php echo form_checkbox(array(
                'name' => 'proof_of_address',
                'id' => 'proof_of_address',
                'value' => 1,
                'checked' => ($customer->proof_of_address) ? 1 : 0)
        );?>
    </div>
</div>
<div class="control-group">
    <label class="control-label"
           for="authorization_letter"><?php echo $this->lang->line("authorization_letter"); ?></label>

    <div class="controls">    <?php echo form_checkbox(array(
                'name' => 'authorization_letter',
                'id' => 'authorization_letter',
                'value' => 1,
                'checked' => ($customer->authorization_letter) ? 1 : 0)
        );?>
    </div>
</div>

<!-- Remove comment-tag to display other fields "- 7 11 2013 - Yogesh"  -->
<!--<div class="control-group">
  <label class="control-label" for="cf4"><?php echo $this->lang->line("ccf4"); ?></label>
  <div class="controls"> <?php echo form_input('cf4', '', 'class="span4" id="cf4"'); ?>
  </div>
</div> 
<div class="control-group">
  <label class="control-label" for="cf5"><?php echo $this->lang->line("ccf5"); ?></label>
  <div class="controls"> <?php echo form_input('cf5', '', 'class="span4" id="cf5"'); ?>
  </div>
</div> 
<div class="control-group">
  <label class="control-label" for="cf6"><?php echo $this->lang->line("ccf6"); ?></label>
  <div class="controls"> <?php echo form_input('cf6', '', 'class="span4" id="cf6"'); ?>
  </div>
</div> -->

<div class="control-group">
    <div
        class="controls"> <?php echo form_submit('submit', $this->lang->line("add_customer"), 'class="btn btn-primary"'); ?> </div>
</div>
<?php echo form_close(); ?>
   