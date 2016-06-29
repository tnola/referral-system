<?php
/* signup page */
?>
<div class="container container-fluid signup-content">
	<h2 class="text-center">Signup</h2>
	<form method="post">
		<div class="form-group row">
			<label for="account_type" class="col-sm-3 form-control-label">Account Type</label>
			<div class="col-sm-9">
				<select id="account_type" name="account_type" class="form-control">
					<option disabled selected>Select Your Account Type</option>
					<option value="referrer">Referrer</option>
					<option value="company">Company</option>
				</select>
			</div>
		</div>
		<div class="signup-form"></div>
		<div class="form-group row">
			<label for="account_email" class="col-sm-3 form-control-label">Email</label>
			<div class="col-sm-9">
				<input type="email" id="account_email" name="account_email" placeholder="Email" class="account_email form-control">
			</div>
		</div>
		<div class="form-group row">
			<label for="account_password" class="col-sm-3 form-control-label">Password</label>
			<div class="col-sm-9">
				<input type="password" id="account_password" name="account_password" placeholder="Password" class="account_password form-control">
			</div>
		</div>
		<div class="form-group row">
			<label for="account_repeat_password" class="col-sm-3 form-control-label">Repeat Password</label>
			<div class="col-sm-9">
				<input type="password" id="account_repeat_password" name="account_repeat_password" placeholder="Repeat Password" class="account_repeat_password form-control">
			</div>
		</div>
		<div class="form-group row">
			<label for="account_phone" class="col-sm-3 form-control-label">Phone Number</label>
			<div class="col-sm-9">
				<input type="text" id="account_phone" name="account_phone" placeholder="Phone Number" class="account_phone form-control">
			</div>
		</div>
		<div class="form-group row">
			<label for="account_county" class="col-sm-3 form-control-label">County</label>
			<div class="col-sm-9">
				<select name="account_county" id="account_county" class="account_county form-control">
					<?php
						$res = $db->query('SELECT * FROM county;');
						if($res):
							echo '<option disabled selected>Select Your County</option>';
							foreach ($res as $row):
								echo '<option value="' . $row->county_id . '">' . $row->name . '</option>';
							endforeach;
						endif;
					?>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="account_paypal_email" class="col-sm-3 form-control-label">Paypal Email</label>
			<div class="col-sm-9">
				<input type="email" id="account_paypal_email" name="account_paypal_email" placeholder="Paypal Email" class="account_paypal_email form-control">
				<div class="checkbox text-muted">
					<label>
						<input type="checkbox" id="same_as_email"> Same As Email
					</label>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label for="account_tax_id" class="col-sm-3 form-control-label">Tax ID</label>
			<div class="col-sm-9">
				<input type="text" id="account_tax_id" name="account_tax_id" placeholder="Tax ID" class="account_tax_id form-control">
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-offset-3 col-sm-9">
				<button type="submit" class="btn btn-secondary">Signup</button>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var contentObj = {
			company: [{
				name: 'Company Name',
				type: 'text',
				id: 'account_company_name'
			}, {
				name: 'Company Type',
				type: 'select',
				id: 'account_company_type',
				content:
				<?php
					unset($res);
					$res = $db->query('SELECT * FROM company_type;');
					if($res):
						$json_array = array();
						foreach ($res as $row):
							$json_array[] = array('name'=>$row->name, 'val'=>$row->id);
						endforeach;
						echo json_encode($json_array);
					else:
						echo '[]';
					endif;
				?>,
				small_text: 'What type of company do you have?'
			} ],
			referrer: [{
				name: 'First Name',
				type: 'text',
				id: 'account_first_name'
			},
			{
				name: 'Last Name',
				type: 'text',
				id: 'account_last_name'
			}
			]
		};
		$('#account_type').change(function(){
			$('.signup-form').html('');
			contentObj[$(this).val()].forEach(function(item){
				$('.signup-form').append(newFormElement(item.name, item.type, item.id, item.content, item.small_text));
			});
		});
	});
</script>