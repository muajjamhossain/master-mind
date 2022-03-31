@extends('admin.layouts.app')
@section('title', 'Website settings')

@section('content')
<div class="row mt-2">
	<div class="col-xl-12">
		<div class="tabs-vertical-env">
			<ul class="nav nav-tabs flex-column nav tabs-vertical" role="tablist">
				<li class="nav-item"> <a class="nav-link show active" id="v-basic-tab" data-toggle="tab" href="#v-basic" role="tab" aria-controls="v-basic" aria-selected="false">Basic Information</a>
				</li>
				<li class="nav-item"> <a class="nav-link show" id="v-social-tab" data-toggle="tab" href="#v-social" role="tab" aria-controls="v-social" aria-selected="false">Social Media</a>
				</li>
				<li class="nav-item"> <a class="nav-link show " id="v-contact-tab" data-toggle="tab" href="#v-contact" role="tab" aria-controls="v-contact" aria-selected="true">Contact Information</a>
				</li>
				<li class="nav-item"> <a class="nav-link show" id="v-page-tab" data-toggle="tab" href="#v-page" role="tab" aria-controls="v-page" aria-selected="false">All page Content</a>
				</li>
				<li class="nav-item"> <a class="nav-link show" id="v-copywrite-tab" data-toggle="tab" href="#v-copywrite" role="tab" aria-controls="v-copywrite" aria-selected="false">Copywrite Information</a>
				</li>
            </ul>

			<div class="tab-content col-xl-12">
				<div class="tab-pane show active" id="v-basic" role="tabpanel" aria-labelledby="v-basic-tab">
                    @include('admin.settings.basic')
				</div>
				<div class="tab-pane show" id="v-social" role="tabpanel" aria-labelledby="v-social-tab">
					@include('admin.settings.social')
				</div>
				<div class="tab-pane show " id="v-contact" role="tabpanel" aria-labelledby="v-contact-tab">
                    @include('admin.settings.contact')
				</div>
				<div class="tab-pane show" id="v-page" role="tabpanel" aria-labelledby="v-page-tab">
                    @include('admin.settings.page')
				</div>
				<div class="tab-pane show" id="v-copywrite" role="tabpanel" aria-labelledby="v-copywrite-tab">
                    @include('admin.settings.copywrite')
				</div>

	        </div>

</div>
@endsection




