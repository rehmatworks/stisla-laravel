@extends('layouts.admin-master')

@section('title')
Create User
@endsection

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Add User</h1>
  </div>
  <div class="section-body">
      <adduser-component></adduser-component>
  </div>
</section>
@endsection
