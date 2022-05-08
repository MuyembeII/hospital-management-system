@extends('template')

@section('content')
<section class="hero is-info">
    <div class="hero-body">
        <div class="container">
            <div class="card">
                <div class="card-content">
                    <form method="post" action="#">
		<div class="field">
			<label class="label" for="the_name">Your Name</label>
			<input type="text" name="name" id="the_name" class="input">
		</div>

		<div class="field">
			<label class="label" for="the_email">Email Address</label>
			<input type="email" name="email" id="the_email" class="input">
		</div>
		<div class="field">
			<label class="label">Reason for Feedback</label>
			<div class="control">
				<div class="select">
					<select name="reason" id="the_reason" class="regular-text">
						<option>Choose One</option>
						<option value="positive">Positive Feedback</option>
						<option value="negative">Negative Feedback</option>
						<option value="suggestion">I have a suggestion</option>
					</select>

				</div>
			</div>
		</div>
		<div class="field">
			<label class="label" for="the_message">Feedback</label>
			<textarea name="message" id="the_message" class="textarea"></textarea>
		</div>

		<div class="field">
			<input type="submit" class="button is-primary">
		</div>
	</form>
                </div>
            </div>
        </div>
    </div>
</section>
