@extends('master')

@section('content')
    <section id="appointment" class="appointment section">
        @if (session('info_success'))
            <div class="alert alert-success">
                {{ session('info_success') }}
            </div>
        @endif
        @if (session('info_danger'))
            <div class="alert alert-danger">
                {{ session('info_danger') }}
            </div>
        @endif

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Filling Info</h2>
            <h4>အချက်အလက်များအား မှန်ကန်စွာ ဖြည့်ပေးပါ။</h4>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <form action="{{ url('/success-booking') }}" method="post" enctype="multipart/form-data" role="form">
                @csrf
                <div class="row">
                    <!-- From Date -->
                    <input type="hidden" name="ndp_id" value="{{ $ndp_id }}" class="form-control" id="ndp_id"
                        readonly>
                    <input type="hidden" name="township_id" value="{{ $township_id }}" class="form-control" id="ndp_id"
                        readonly>
                    <div class="col-md-6 form-group mt-3 ">
                        <label for="start_date" class="form-label"><strong>From Date:</strong></label>
                        <input name="start_date" value="{{ $start_date }}" class="form-control" id="start_date" readonly>
                    </div>
                    <!-- To Date -->
                    <div class="col-md-6 form-group mt-3 ps-4">
                        <label for="end_date" class="form-label"><strong>To Date:</strong></label>
                        <input name="end_date" value="{{ $end_date }}" class="form-control" id="end_date" readonly>
                    </div>
                    <div class="col-md-6 form-group mt-3 pe-2">
                        <h4 class=" text-center mb-3">Owner's Info</h4>
                        <div class="d-flex align-items-center ">
                            <label for="owner_name" class="form-label me-2" style="width: 150px"><strong>Name
                                    :</strong></label>
                            <input type="text" id="owner_name" name="owner_name" class="form-control"
                                placeholder="Owner's Name" value="" required>
                        </div>
                        <div class="d-flex align-items-center mt-4">
                            <label for="owner_nrc" class="form-label me-2" style="width: 150px"><strong>NRC
                                    :</strong></label>
                            <input type="text" name="owner_nrc" id="owner_nrc" class="form-control"
                                placeholder="NRC's Name" value="" required>
                        </div>

                        <div class="d-flex align-items-center mt-4">
                            <label for="owner_father_name" class="form-label me-2" style="width: 150px"><strong>Father's
                                    Name
                                    :</strong></label>
                            <input type="text" name="owner_father_name" id="owner_father_name" class="form-control"
                                placeholder="Father's Name" value="" required>
                        </div>

                        <div class="d-flex align-items-center mt-4">
                            <label for="patient_relative" class="form-label me-2" style="width: 150px"><strong>
                                    Relative
                                    :</strong></label>
                            <input type="text" name="patient_relative" id="patient_relative" class="form-control"
                                placeholder="Patient's Relative" value="" required>
                        </div>

                        <div class="d-flex align-items-center mt-4">
                            <label for="owner_phone" class="form-label me-2" style="width: 150px"><strong>Phone :
                                </strong></label>
                            <input type="text" name="owner_phone" value="" class="form-control"
                                placeholder="09********" id="owner_phone" required>
                        </div>
                        <p id="owner-phone-error" class="text-danger mt-2" style="font-size: 15px; display: none;">
                        </p>
                        <div class="d-flex align-items-center mt-4">
                            <label for="owner_address" class="form-label me-2" style="width: 150px"><strong>Address :
                                </strong></label>
                            <input type="text" name="owner_address" id="owner_address" value=""
                                class="form-control" placeholder="Your Addresss" required>
                        </div>
                        <div class="d-flex align-items-center mt-4">
                            <label for="owner_remark" class="form-label me-2" style="width: 150px"><strong>Remark
                                    :</strong></label>
                            <input type="text" name="owner_remark" id="owner_remark" class="form-control"
                                placeholder="remark">
                        </div>
                    </div>
                    <!-- Patient -->
                    <div class="col-md-6 form-group mt-3">
                        <h4 class=" text-center mb-3">Patient's Info</h4>
                        <div class="remove-border border-start border-primary ps-3">
                            <div class=" d-flex align-items-center">
                                <label for="township" class="form-label" style="width: 150px"><strong>Medical
                                        Center</strong></label>
                                <input type="text" name="township" id="township" class="form-control"
                                    value="{{ $township->name }}" readonly>
                            </div>
                            <div class="d-flex align-items-center mt-4">
                                <label for="patient_name" class="form-label me-2" style="width: 150px"><strong>Name
                                        :</strong></label>
                                <input type="text" name="patient_name" id="patient_name" value=""
                                    class="form-control" placeholder="Patient's Name" required>
                            </div>
                            <div class="d-flex align-items-center mt-4">
                                <label for="patient_age" class="form-label me-2" style="width: 150px"><strong>Age
                                        :</strong></label>
                                <input type="number" name="patient_age" id="patient_age" value=""
                                    class="form-control" placeholder="Patient's Age" required>
                            </div>
                            <div class="d-flex align-items-center mt-4">
                                <label for="gender" class="form-label me-2"
                                    style="width: 150px"><strong>Gender:</strong></label>
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="d-flex align-items-center mt-4">
                                <label for="diagnotic" class="form-label me-2" style="width: 150px"><strong>Diagnotic
                                        :</strong></label>
                                <input type="text" name="diagnotic" id="diagnotic" value=""
                                    class="form-control" placeholder="diagnotic" required>
                            </div>
                            <div class="d-flex align-items-center mt-4">
                                <label for="patient_phone" class="form-label me-2" style="width: 150px"><strong>Phone :
                                    </strong></label>
                                <input type="text" name="patient_phone" class="form-control" value=""
                                    placeholder="09********" id="patient_phone" required>
                            </div>

                            <p id="patient-phone-error" class="text-danger mt-2" style="font-size: 15px; display: none;">
                            </p>


                            <div class="d-flex align-items-center mt-4">
                                <label for="patient_address" class="form-label me-2" style="width: 150px"><strong>Address
                                        :
                                    </strong></label>
                                <input type="text" name="patient_address" id="patient_address" value=""
                                    class="form-control" placeholder="Your Addresss" required>
                            </div>
                            <div class="d-flex align-items-center mt-4">
                                <label for="patient_remark" class="form-label me-2" style="width: 150px"><strong>Remark
                                        :</strong></label>
                                <input type="text" name="patient_remark" id="patient_remark" class="form-control"
                                    placeholder="remark">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="text-center"><button type="submit" class="btn btn-primary">Save</button>
                    </div>
            </form>
        </div>

    </section>
    <script>
        function validatePhoneNumber(inputId, errorElementId) {
            const input = document.getElementById(inputId);
            const errorElement = document.getElementById(errorElementId);
            const phonePattern = /^\+?[0-9]{9,15}$/; // Allows phone numbers with 9 to 15 digits, with or without '+'

            input.addEventListener('input', function() {
                const value = input.value.trim();

                if (value === '') {
                    errorElement.style.display = 'none';
                } else if (!phonePattern.test(value)) {
                    errorElement.textContent = 'Please enter a valid phone number (e.g., 09******** or +123456789)';
                    errorElement.style.display = 'block';
                } else {
                    errorElement.style.display = 'none';
                }
            });
        }

        validatePhoneNumber('owner_phone', 'owner-phone-error');
        validatePhoneNumber('patient_phone', 'patient-phone-error');
    </script>
@endsection
