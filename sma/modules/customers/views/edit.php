<?php $surname = array(
    'name' => 'surname',
    'id' => 'surname',
    'value' => $customer->surname,
    'class' => 'span4',
    'required' => 'required',
    'data-error' => $this->lang->line("surname") . ' ' . $this->lang->line("is_required")
);
$name = array(
    'name' => 'name',
    'id' => 'name',
    'value' => $customer->name,
    'class' => 'span4',
    'required' => 'required',
    'data-error' => $this->lang->line("name") . ' ' . $this->lang->line("is_required")
);
$email = array(
    'name' => 'email',
    'id' => 'email',
    'value' => $customer->email,
    'class' => 'span4',
);
$company = array(
    'name' => 'company',
    'id' => 'company',
    'value' => $customer->company,
    'class' => 'span4 tip',
);
$address = array(
    'name' => 'address',
    'id' => 'address',
    'value' => $customer->address,
    'class' => 'span4',
    'required' => 'required',
    'data-error' => $this->lang->line("address") . ' ' . $this->lang->line("is_required")
);
$alternative_address = array(
    'name' => 'alternative_address',
    'id' => 'alternative_address',
    'value' => $customer->alternative_address,
    'class' => 'span4'
);
$postal_code = array(
    'name' => 'postal_code',
    'id' => 'postal_code',
    'value' => $customer->postal_code,
    'class' => 'span4',
    'required' => 'required',
    'data-error' => $this->lang->line("postal_code") . ' ' . $this->lang->line("is_required")
);
/*	$country = array(
      'name'        => 'country',
      'id'          => 'country',
      'value'       => $customer->country,
      'class'       => 'span4',
      'required'	=> 'required',
      'data-error'	=> $this->lang->line("country").' '.$this->lang->line("is_required")
    );*/
$home_number = array(
    'name' => 'home_number',
    'id' => 'home_number',
    'value' => $customer->home_number,
    'class' => 'span4',
);
$mobile_number = array(
    'name' => 'mobile_number',
    'id' => 'mobile_number',
    'value' => $customer->mobile_number,
    'class' => 'span4',
    'required' => 'required',
    'data-error' => $this->lang->line("mobile_number") . ' ' . $this->lang->line("is_required")
);
$emergency_number = array(
    'name' => 'emergency_number',
    'id' => 'emergency_number',
    'value' => $customer->emergency_number,
    'class' => 'span4',
);
$dob = array(
    'name' => 'dob',
    'id' => 'dob',
    'value' => $customer->dob,
    'class' => 'span4 tip',
    'title' => $this->lang->line("dob_format"),
    'required' => 'required',
    'data-error' => $this->lang->line("dob") . ' ' . $this->lang->line("is_required")
);
$training_date = array(
    'name' => 'training_date',
    'id' => 'training_date',
    'value' => $customer->training_date,
    'class' => 'span4 tip',
    'title' => $this->lang->line("training_date_format"),
    'required' => 'required',
    'data-error' => $this->lang->line("training_date") . ' ' . $this->lang->line("is_required")
);
$id_number = array(
    'name' => 'id_number',
    'id' => 'id_number',
    'value' => $customer->id_number,
    'class' => 'span4',
    'required' => 'required',
    'data-error' => $this->lang->line("id_number") . ' ' . $this->lang->line("is_required")
);
$religion = array(
    'name' => 'religion',
    'id' => 'religion',
    'value' => $customer->religion,
    'class' => 'span4',
);
$work_number = array(
    'name' => 'work_number',
    'id' => 'work_number',
    'value' => $customer->work_number,
    'class' => 'span4',
);
$coordinator_name = array(
    'name' => 'coordinator_name',
    'id' => 'coordinator_name',
    'value' => $customer->coordinator_name,
    'class' => 'span4',
    'required' => 'required',
    'data-error' => $this->lang->line("coordinator_name") . ' ' . $this->lang->line("is_required")
);
$credit_allowance = array(
    'name' => 'credit_allowance',
    'id' => 'credit_allowance',
    'value' => $customer->credit_allowance,
    'class' => 'span4',
    'required' => 'required',
    'data-error' => $this->lang->line("credit_allowance") . ' ' . $this->lang->line("is_required")
);
$place_of_work = array(
    'name' => 'place_of_work',
    'id' => 'place_of_work',
    'value' => $customer->place_of_work,
    'class' => 'span4',
);
/* $no_of_work = array(
   'name'        => 'no_of_work',
   'id'          => 'no_of_work',
   'value'       => $customer->no_of_work,
   'class'       => 'span4',
   'required'	=> 'required',
   'data-error'	=> $this->lang->line("no_of_work").' '.$this->lang->line("is_required")
 );*/
$payment_type = array(
    'name' => 'payment_type',
    'id' => 'payment_type',
    'value' => $customer->payment_type,
    'class' => 'span4'
);
$region = array(
    'name' => 'region',
    'id' => 'region',
    'value' => $customer->region,
    'class' => 'span4',
);
$proof_of_address = array(
    'name' => 'proof_of_address',
    'id' => 'proof_of_address',
    'value' => $customer->proof_of_address,
    'class' => 'span4',
);
$authorization_letter = array(
    'name' => 'authorization_letter',
    'id' => 'authorization_letter',
    'value' => $customer->authorization_letter,
    'class' => 'span4',
);
$cf4 = array(
    'name' => 'cf4',
    'id' => 'cf4',
    'value' => $customer->cf4,
    'class' => 'span4'
);
$cf5 = array(
    'name' => 'cf5',
    'id' => 'cf5',
    'value' => $customer->cf5,
    'class' => 'span4'
);
$cf6 = array(
    'name' => 'cf6',
    'id' => 'cf6',
    'value' => $customer->cf6,
    'class' => 'span4'
);

?>
<script src="<?php echo $this->config->base_url(); ?>assets/js/validation.js"></script>
<script type="text/javascript">
    $(function () {
        $('form').form();
    });
</script>

<?php if ($message) {
    echo "<div class=\"alert alert-error\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $message . "</div>";
} ?>


<h3 class="title"><?php echo $page_title; ?></h3>
<p><?php echo $this->lang->line("enter_info"); ?></p>

<?php $attrib = array('class' => 'form-horizontal');
echo form_open("module=customers&view=edit&id=" . $id, $attrib); ?>
<!-- Hyder - issue #31 - 4 June 2014 - START -->
<div class="control-group">
    <label class="control-label" for="team_leader">Team Leader</label>

    <div class="controls">

        <select id="team_leader" name="team_leader">
            <option id="0" value="0" <?php if ($customer->teamleaderid == '0') {
                echo 'selected';
            } ?>>NONE
            </option>
            <?php
            foreach ($teamleaders as $value) {

                $userid = $value->id;
                $teamleader_name = ucfirst($value->name) . ' ' . ucfirst($value->surname);

                ?>
                <?php if ($customer->id != $userid) { ?>
                    <option id="<?php echo $userid; ?>"
                            value="<?php echo $userid; ?>" <?php if ($customer->teamleaderid == $userid) {
                        echo 'selected';
                    } ?>><?php echo $teamleader_name; ?></option>
                <?php
                }
            }
            ?>


        </select>
    </div>
</div>
<!-- Hyder - issue #31 - 4 June 2014 - END -->
<div class="control-group">
    <label class="control-label" for="surname"><?php echo $this->lang->line("surname"); ?></label>

    <div class="controls"> <?php echo form_input($surname); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="name"><?php echo $this->lang->line("name"); ?></label>

    <div class="controls"> <?php echo form_input($name); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="email_address"><?php echo $this->lang->line("email_address"); ?></label>

    <div class="controls"> <?php echo form_input($email); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="home_number"><?php echo $this->lang->line("home_number"); ?></label>

    <div class="controls"> <?php echo form_input($home_number); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="mobile_number"><?php echo $this->lang->line("mobile_number"); ?></label>

    <div class="controls"> <?php echo form_input($mobile_number); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="emergency_number"><?php echo $this->lang->line("emergency_number"); ?></label>

    <div class="controls"> <?php echo form_input($emergency_number); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="dob"><?php echo $this->lang->line("dob"); ?></label>

    <div class="controls"> <?php echo form_input($dob); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="company"><?php echo $this->lang->line("company"); ?></label>

    <div class="controls"> <?php echo form_input($company); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="training_date"><?php echo $this->lang->line("training_date"); ?></label>

    <div class="controls"> <?php echo form_input($training_date); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="address"><?php echo $this->lang->line("address"); ?></label>

    <div class="controls"> <?php echo form_input($address); ?>
    </div>
</div>
<!--<div class="control-group">
  <label class="control-label" for="region"><?php echo $this->lang->line("region"); ?></label>
  <div class="controls"> <?php echo form_input($region); ?>
  </div>
</div>
-->
<div class="control-group">
    <label class="control-label" for="region"><?php echo $this->lang->line("region"); ?></label>

    <div class="controls"> <?php echo form_input($region); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label"
           for="alternative_address"><?php echo $this->lang->line("alternative_address"); ?></label>

    <div class="controls"> <?php echo form_input($alternative_address); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="postal_code"><?php echo $this->lang->line("postal_code"); ?></label>

    <div class="controls"> <?php echo form_input($postal_code); ?>
    </div>
</div>
<!--
<div class="control-group">
  <label class="control-label" for="country"><?php echo $this->lang->line("country"); ?></label>
  <div class="controls"> <?php echo form_input($country); ?>
  </div>
</div> -->
<div class="control-group">
    <label class="control-label" for="id_number"><?php echo $this->lang->line("id_number"); ?></label>

    <div class="controls"> <?php echo form_input($id_number); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="religion"><?php echo $this->lang->line("religion"); ?></label>

    <div class="controls"> <?php echo form_input($religion); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="work_number"><?php echo $this->lang->line("work_number"); ?></label>

    <div class="controls"> <?php echo form_input($work_number); ?>
    </div>
</div>
<!-- Hyder - issue #29 - 8 June 2014 - START  -->

<div class="control-group">
    <label class="control-label" id="blue">Status</label>

    <div class="controls">
        <select name="blue" id="blue" data-placeholder="Select status" required="required" data-error="status is required or need attention.">
            <option value="no" name="no"  <?php if($customer->blue=='no'){echo 'selected';}?>>Normal</option>
            <option value="yes" name="yes" <?php if($customer->blue=='yes'){echo 'selected';}?>>Blue card holder</option>

        </select>
    </div>
</div>
<!-- Hyder - issue #29 - 8 June 2014 - END   -->
<div class="control-group">
    <label class="control-label" for="credit_allowance"><?php echo $this->lang->line("credit_allowance"); ?></label>

    <div class="controls"> <?php echo form_input($credit_allowance); ?>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="place_of_work"><?php echo $this->lang->line("place_of_work"); ?></label>

    <div class="controls"> <?php echo form_input($place_of_work); ?>
    </div>
</div>
<!--<div class="control-group">
  <label class="control-label" for="no_of_work"><?php echo $this->lang->line("no_of_work"); ?></label>
  <div class="controls"> <?php echo form_input($no_of_work); ?>
  </div>
</div>-->

<!-- Commented by Hyder - issue #14 - 7 June 2014

<div class="control-group">
  <label class="control-label" for="payment_type"><?php echo $this->lang->line("payment_type"); ?></label>
  <div class="controls"> <?php echo form_input($payment_type); ?>
  </div>
</div>-->


<!--Hyder - issue #14 - 7 June 2014 - START -->
<?php
$whx[''] = '';
foreach ($payment_types as $xpayment_type) {
    $whx[] = $xpayment_type->name;
}


?>


<div class="control-group">
    <?php


    ?>
    <label class="control-label" id="payment_type_l">Payment Type</label>

    <div class="controls"><select name="payment_type" id="payment_type_s" data-placeholder="Select Payment Type"
                                  required="required" data-error="Payment Type is required or need attention.">
            <option value=""></option>
            <?php foreach ($whx as $pt) { // ?>
                <option value="<?php echo $pt; ?>"  <?php if($pt==$payment_type['value']){echo 'selected';}?>><?php echo $pt; ?></option>
            <?php } ?>

        </select></div>
</div>
<!--Hyder - issue #14 - 7 June 2014 - END -->


<div class="control-group">
    <label class="control-label" for="proof_of_address"><?php echo $this->lang->line("proof_of_address"); ?></label>

    <div class="controls"> <?php echo form_checkbox(array(
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

    <div class="controls"> <?php echo form_checkbox(array(
                'name' => 'authorization_letter',
                'id' => 'authorization_letter',
                'value' => 1,
                'checked' => ($customer->authorization_letter) ? 1 : 0)
        );?>
    </div>
</div>
<!-- Remove comment-tag to display other fields "- 7 11 2013 - Yogesh"  -->
<!--</a><div class="control-group">
  <label class="control-label" for="cf4"><?php echo $this->lang->line("ccf4"); ?></label>
  <div class="controls"> <?php echo form_input($cf4); ?>
  </div>
</div> 
<div class="control-group">
  <label class="control-label" for="cf5"><?php echo $this->lang->line("ccf5"); ?></label>
  <div class="controls"> <?php echo form_input($cf5); ?>
  </div>
</div> 
<div class="control-group">
  <label class="control-label" for="cf6"><?php echo $this->lang->line("ccf6"); ?></label>
  <div class="controls"> <?php echo form_input($cf6); ?>
  </div>
</div> -->

<div class="control-group">
    <div
        class="controls"> <?php echo form_submit('submit', $this->lang->line("update_customer"), 'class="btn btn-primary"'); ?> </div>
</div>
<?php echo form_close(); ?>
 