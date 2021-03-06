@extends('layouts.main')
@section('content')
	<div class="content col-md-12">
		<div class="row">
			<div class="md-col-12">
				<h1>Edit Profile</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				{{ Form::open(array('url'=>'user/edit/' . $user->id, 'method'=>'PUT' )) }}
					<!-- First Name -->
					<div class="form-group">
						<label for="fname">First Name:</label>
						<input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name" value="{{ $user->fname }}"/>
					</div>
					<!-- Last Name -->
					<div class="form-group">
						<label for="fname">Last Name:</label>
						<input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name" value="{{ $user->lname }}"/>
					</div>
					<!-- Email -->
					<div class="form-group">
						<label for="email">Email Address:</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{ $user->email}}"/>
					</div>
					<!-- URL -->
					<div class="form-group">
						<label for="url">URL:</label>
						<input type="url" class="form-control" name="url" id="url" placeholder="Enter URL" value="{{ $user->url }}"/>
					</div>
					<!-- Phone -->
					<div class="form-group">
						<label for="phone">Phone number:</label>
						<input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter phone" value="{{ $user->phone }}"/>
					</div>
					<!-- TODO: Organization -->
					<!-- Location -->
					<!-- TODO: autofill / check location exists -->
					<!-- Password -->
					<div class="form-group">
						<label for="password_1">Change password:</label>
						<input type="password" class="form-control" name="password_1" id="password_1" placeholder="New password" value=""/>
					</div>
					<div class="form-group">
						<label for="password_2">Confirm password:</label>
						<input type="password" class="form-control" name="password_2" id="password_2" placeholder="Repeat new password" value=""/>
					</div>
					<div class="checkbox">
						@if($user->verified())
							<label>
								<input name="verify" id="verify" type="checkbox" checked disabled> Request 'Verified Account' is '{{ $user->verified() }}'
							</label>
						@else
							<label>
								<input name="verify" id="verify" type="checkbox"> Request 'Verified Account'
							</label>
						@endif
					</div>
					<div class="form-group">
						@if($user->hasRole('Independent Sponsor'))
							<p><span class="glyphicon glyphicon-check"></span> Your account is able to sponsor documents as an individual.</p>
						@elseif($user->getSponsorStatus() && $user->getSponsorStatus()->meta_value == 0)
							<p>Your request to become an Independent Sponsor is 'pending'</p>
						@else
							<p>Want to be a document sponsor? <a href="/documents/sponsor/request">Request to be an Independent Sponsor</a></p>
						@endif
					</div>
					<div class="form-group">
						<!-- Change avatar at gravatar.com -->
						<a href="https://gravatar.com" target="_blank" class="red">Change your avatar at Gravatar.com</a>
					</div>
					<button type="submit" class="btn btn-default" id="submit">Submit</button>
					{{ Form::token() }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
@endsection