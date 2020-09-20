@extends('layouts.app', ['title' => 'Registrar Staff'])

@push('js')
<script src="{{ asset('vendor/jquery-mask-plugin-1.14.16/jquery.mask.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
  let intervalFunc = function () {
      let image_path = $('#profile_picture').val().split('\\');
      $('#browse-image').html(image_path[image_path.length - 1]);
  };

  $('#profile_picture').on('click', function () {
      setInterval(intervalFunc, 1);
  });

  $("#btnSubmit").click(function(){
      $('.input-mask').unmask();
  });
});
</script>
@endpush

@section('content')
    @include('layouts.headers.header', ['title' => 'Show Registrar Staff'])

    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col col-lg-5 order-lg-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <img alt="Profile Picture placeholder"
                                    src="{{ asset('img/profile_pictures/' . $user->profile_picture) }}"
                                    class="rounded-circle">
                            </div>
                        </div>
                    </div>

                    <div class="card-body mt-8 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="text-center">
                                    <h2>
                                        {{ $user->getName() }}
                                    </h2>
                                    <div class="h4 font-weight-300">
                                        Employee No. {{ $user->employee->getEmployeeNo() }}
                                    </div>
                                    <div class="h4 font-weight-300 mt-3">
                                        {{ $user->email }}
                                    </div>
                                </div>

                                <hr class="my-4">

                                <dl class="row text-sm">
                                    <dt class="col-5 text-right">
                                        Username:
                                    </dt>
                                    <dd class="col-7">
                                        {{ $user->username }}
                                    </dd>

                                    <dt class="col-5 text-right">
                                        Status:
                                    </dt>
                                    <dd class="col-7">
                                        {{ $user->employee->getStatus() }}
                                    </dd>

                                    <dt class="col-5 text-right">
                                        Date Employed:
                                    </dt>
                                    <dd class="col-7">
                                        @if($user->employee->getDateEmployed() != null)
                                        {{ $user->employee->getDateEmployed() }}
                                        @else
                                        -
                                        @endif
                                    </dd>

                                    <h6 class="col-12 heading-small text-muted mt-3">
                                        Personal Information
                                    </h6>

                                    @if($user->getGender() != null)
                                    <dt class="col-5 text-right">
                                        Gender:
                                    </dt>
                                    <dd class="col-7">
                                        {{ $user->getGender() }}
                                    </dd>
                                    @endif

                                    <dt class="col-5 text-right">
                                        Birthdate:
                                    </dt>
                                    <dd class="col-7">
                                    @if($user->getBirthdate() != null)
                                        {{ $user->getBirthdate() }}
                                    @else
                                        -
                                    @endif
                                    </dd>

                                    @if($user->contact_no != null)
                                    <dt class="col-5 text-right">
                                        Contact No:
                                    </dt>
                                    <dd class="col-7">
                                        {{ $user->contact_no }}
                                    </dd>
                                    @endif

                                    <dt class="col-5 text-right">
                                        Address:
                                    </dt>
                                    <dd class="col-7">
                                    @if($user->address != null)
                                        {{ $user->address }}
                                    @else
                                        -
                                    @endif
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col col-lg-7 order-lg-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Registrar Staff</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="/registrars" class="btn btn-sm btn-outline-secondary">
                                    Back to list
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form-post" method="POST" action="{{ action('RegistrarController@update', $user->id) }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @method('PUT')

                            <h6 class="heading-small text-muted mb-4">
                                Profile Picture
                            </h6>
                            <div class="pl-lg-4 row">
                                <div class="col-12 col-lg-5">
                                  <div class="form-group{{ $errors->has('profile_picture') ? ' has-danger' : '' }}">
                                        <label id="browse-image" for="profile_picture" class="btn btn-outline-default">Choose Profile Picture</label>
                                        <input type="file" id="profile_picture" name="profile_picture" style="display: none">

                                        @if ($errors->has('profile_picture'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('profile_picture') }}</strong>
                                            </span>
                                        @endif
                                  </div>
                                </div>
                            </div>

                            <h6 class="heading-small text-muted mb-4">
                                Employee information
                            </h6>
                            <div class="pl-lg-4 row">
                                <div class="form-group{{ $errors->has('employee_no') ? ' has-danger' : '' }} col-lg-6">
                                    <label class="form-control-label" for="employee_no">Employee No.</label>
                                    <input type="text" name="employee_no" id="employee_no" class="input-mask form-control form-control-alternative{{ $errors->has('employee_no') ? ' is-invalid' : '' }}" placeholder="e.g. K-200" value="{{ old('employee_no', $user->employee->employee_no) }}" data-mask="S-000"  data-mask-clearifnotmatch="true" required autofocus>

                                    @if ($errors->has('employee_no'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('employee_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('date_employed') ? ' has-danger' : '' }} col-lg-6">
                                    <label class="form-control-label" for="date_employed">Date Employed</label>
                                    <input type="date" name="date_employed" id="date_employed" class="form-control form-control-alternative{{ $errors->has('date_employed') ? ' is-invalid' : '' }}" value="{{ old('date_employed', $user->employee->date_employed) }}" required>

                                    @if ($errors->has('date_employed'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('date_employed') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <h6 class="heading-small text-muted mb-4 mt-3">
                                Personal information
                            </h6>
                            <div class="pl-lg-4 row">
                                <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }} col-lg-12">
                                    <label class="form-control-label" for="first_name">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control form-control-alternative{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="e.g. Juan" value="{{ old('first_name', $user->first_name) }}" required>

                                    @if ($errors->has('first_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('middle_name') ? ' has-danger' : '' }} col-lg-12">
                                    <label class="form-control-label" for="middle_name">Middle Name (optional)</label>
                                    <input type="text" name="middle_name" id="middle_name" class="form-control form-control-alternative{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" placeholder="e.g. Floresta" value="{{ old('middle_name', $user->middle_name) }}">

                                    @if ($errors->has('middle_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('middle_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }} col-lg-12">
                                    <label class="form-control-label" for="last_name">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control form-control-alternative{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="e.g. Dela Cruz" value="{{ old('last_name', $user->last_name) }}" required>

                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-4 row">
                                <div class="form-group{{ $errors->has('birthdate') ? ' has-danger' : '' }} col-lg-6">
                                    <label class="form-control-label" for="birthdate">Birthdate</label>
                                    <input type="date" name="birthdate" id="birthdate" class="form-control form-control-alternative{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" value="{{ old('birthdate', $user->birthdate) }}" required>

                                    @if ($errors->has('birthdate'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('birthdate') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('contact_no') ? ' has-danger' : '' }} col-lg-6">
                                    <label class="form-control-label" for="contact_no">Contact No (optional)</label>
                                    <input type="text" name="contact_no" id="contact_no" class="input-mask form-control form-control-alternative{{ $errors->has('contact_no') ? ' is-invalid' : '' }}" placeholder="e.g. 09XX XXX XXXX" value="{{ old('contact_no', $user->contact_no) }}" data-mask="0000-000-0000"  data-mask-clearifnotmatch="true" >

                                    @if ($errors->has('contact_no'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('contact_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-4 row">
                                <div class="form-group col row">
                                    <div class="form-control-label pl-3">
                                        Gender
                                    </div>
                                    <div class="ml-3 custom-control custom-radio mb-3">
                                        <input name="gender" class="custom-control-input" id="gender1" type="radio" value="M" {{ old('gender', $user->gender) == 'M' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="gender1">Male</label>
                                    </div>
                                    <div class="ml-3 custom-control custom-radio mb-3">
                                        <input name="gender" class="custom-control-input" id="gender2" type="radio" value="F" {{ old('gender', $user->gender) == 'F' ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="gender2">Female</label>
                                    </div>
                                    <div class="ml-3 custom-control custom-radio mb-3">
                                        <input name="gender" class="custom-control-input" id="gender3" type="radio" value="" {{ old('gender', $user->gender) == null ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="gender3">Prefer not to say</label>
                                    </div>

                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gender') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-4 row">
                                <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }} col">
                                    <label class="form-control-label" for="address">Address (optional)</label>
                                    <input type="text" name="address" id="address" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="e.g. 10th Avenue, Caloocan" value="{{ old('address', $user->address) }}">

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <h6 class="heading-small text-muted mb-4 mt-3">
                                Account information
                            </h6>
                            <div class="pl-lg-4 row">
                                <div class="form-group{{ $errors->has('username') ? ' has-danger' : '' }} col col-lg-6">
                                    <label class="form-control-label" for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control form-control-alternative{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Username" value="{{ old('username', $user->username) }}" required>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-4 row">
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} col col-lg-6">
                                    <label class="form-control-label" for="input-email">Email (optional)</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="e.g. juandelacruz@gmail.com" value="{{ old('email', $user->email) }}">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-4 row">
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }} col col-lg-8">
                                    <label class="form-control-label" for="input-password">Change Password (optional)</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Enter password to change the current one.">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="pl-lg-4 row">
                                <div class="form-group col col-lg-8">
                                    <label class="form-control-label" for="input-password-confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="Confirm Password">
                                </div>
                            </div>

                            <div class="pl-lg-4 row mt-4">
                                <div class="col">
                                    <button id="btnSubmit" type="submit" class="btn btn-success">
                                        Update Registrar Staff
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary" onclick="javascript:history.back()">Return</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        @include('layouts.footers.auth')
    </div>
@endsection