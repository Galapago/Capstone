<div class="form-group">
				<label for="sex">Sex </label><br>
				<div class="radio-inline">
					<input 
						type="radio" 
						class="radio-inline"
						name="sex" 
						value="male"> Male
				</div>
				<div class="radio-inline">
					<input 
						type="radio" 
						class="radio-inline"
						name="sex" 
						value="female"> Female
				</div>		
			</div>
			@include('partials.error', ['field' => 'sex'])