@extends('layouts.admin-master')

@section('title')
Edit Profile ({{ $user->name }})
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Edit Profile</h1>
  </div>
  <div class="section-body">
      <profile-component user='{!! $user->toJson() !!}'></profile-component>
  </div>
</section>
@endsection
