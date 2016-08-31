<div class="form-group">
				<label for="newsletter">Sign up for our Newsletter?</label><br>
				<div class="checkbox">
					<label><input 
						type="checkbox" 
						class="checkbox"
						name="newsletter" 
						checked> Yes! </label>
				</div>
			</div>
			@include('partials.error', ['field' => 'newsletter'])