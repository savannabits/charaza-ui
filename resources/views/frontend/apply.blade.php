@extends('layouts.frontend')
@section('content')
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>Apply Form</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero End -->
    <!-- Apply Area Start -->
    <div class="apply-area pt-150 pb-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="apply-wrapper">
                        <!-- Form -->
                        <form action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-form">
                                        <label>* LOAN AMOUNT ($) </label>
                                        <input type="text" name="" placeholder="Enter name">
                                    </div>
                                </div>
                                <!-- Nice Select -->
                                <div class="col-lg-6">
                                    <div class="single-form">
                                        <label>* PURPOSE OF LOAN </label>
                                        <div class="select-option mb-10">
                                            <select name="select" id="select1">
                                                <option value="">Choose Categories</option>
                                                <option value="">Category 1</option>
                                                <option value="">Category 2</option>
                                                <option value="">Category 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Radio -->
                                <div class="col-lg-12">
                                    <div class="single-form  d-flex">
                                        <label>* Select Gender :</label>
                                        <!--Radio Select -->
                                        <div class="select-radio6">
                                            <div class="radio">
                                                <input id="radio" name="radio" type="radio" checked="">
                                                <label for="radio-6" class="radio-label">Male</label>
                                            </div>
                                            <div class="radio">
                                                <input id="radio" name="radio" type="radio">
                                                <label for="radio-7" class="radio-label">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- First Name -->
                                <div class="col-lg-6">
                                    <div class="single-form">
                                        <label>* FIRST NAME</label>
                                        <input type="text" name="" placeholder="Enter name">
                                    </div>
                                </div>
                                <!-- Last Name -->
                                <div class="col-lg-6">
                                    <div class="single-form">
                                        <label>* Last NAME</label>
                                        <input type="text" name="" placeholder="Enter name">
                                    </div>
                                </div>
                                <!-- Nice Select -->
                                <!-- Nice Select -->
                                <div class="col-lg-12">
                                    <div class="single-form">
                                        <label>* NUMBER OF DEPENDANTS</label>
                                        <div class="select-option mb-10">
                                            <select name="select" id="select1">
                                                <option value="">Choose Option</option>
                                                <option value="">Category 1</option>
                                                <option value="">Category 2</option>
                                                <option value="">Category 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- First Name -->
                                <div class="col-lg-6">
                                    <div class="single-form">
                                        <label>* Email Adderess</label>
                                        <input type="email" name="" placeholder="Enter email">
                                    </div>
                                </div>
                                <!-- Last Name -->
                                <div class="col-lg-6">
                                    <div class="single-form">
                                        <label>* Phone Number</label>
                                        <input type="text" name="" placeholder="Enter Number">
                                    </div>
                                </div>
                                <!-- Nice Select -->
                                <div class="col-lg-12">
                                    <div class="single-form">
                                        <label>* MARITAL STATUS</label>
                                        <div class="select-option mb-10">
                                            <select name="select" id="select1">
                                                <option value="">Choose Categories</option>
                                                <option value="">Category 1</option>
                                                <option value="">Category 2</option>
                                                <option value="">Category 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- First Name -->
                                <div class="col-lg-6">
                                    <div class="single-form">
                                        <label>* FIRST NAME</label>
                                        <input type="text" name="" placeholder="Enter name">
                                    </div>
                                </div>
                                <!-- TOWN/CITY-->
                                <div class="col-lg-6">
                                    <div class="single-form">
                                        <label>* TOWN/CITY</label>
                                        <input type="text" name="" placeholder="Enter city">
                                    </div>
                                </div>
                                <!-- Street Address -->
                                <div class="col-lg-6">
                                    <div class="single-form">
                                        <label>* STREET</label>
                                        <input type="text" name="" placeholder="Enter Street Address">
                                    </div>
                                </div>
                                <!-- HOUSE NAME/NUMBER -->
                                <div class="col-lg-6">
                                    <div class="single-form">
                                        <label>* HOUSE NAME/NUMBER</label>
                                        <input type="text" name="" placeholder="Enter House Name">
                                    </div>
                                </div>
                                <!-- Nice Select -->
                                <div class="col-lg-12">
                                    <div class="single-form">
                                        <label>* HOMEOWNER STATUS </label>
                                        <div class="select-option mb-10">
                                            <select name="select" id="select1">
                                                <option value="">Enter Houseowner ststus</option>
                                                <option value="">Category 1</option>
                                                <option value="">Category 2</option>
                                                <option value="">Category 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--  EMPLOYMENT INDUSTRY -->
                                <div class="col-lg-6">
                                    <div class="single-form">
                                        <label>* EMPLOYMENT INDUSTRY</label>
                                        <input type="text" name="" placeholder="Enter INDUSTRY">
                                    </div>
                                </div>
                                <!-- Last Name -->
                                <div class="col-lg-6">
                                    <div class="single-form">
                                        <label>* EMPLOYER NAME</label>
                                        <input type="text" name="" placeholder="Enter name">
                                    </div>
                                </div>
                                <!--PHONE NUMBER -->
                                <div class="col-lg-6">
                                    <div class="single-form">
                                        <label>* WORK PHONE NUMBER</label>
                                        <input type="text" name="" placeholder="Phone Number">
                                    </div>
                                </div>
                                <!--  MONTHLY INCOME -->
                                <div class="col-lg-6">
                                    <div class="single-form">
                                        <label>* MONTHLY INCOME ($)</label>
                                        <input type="text" name="" placeholder="Enter name">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End From -->
                        <!-- Form btn -->
                        <a href="#" class="btn apply-btn mt-30">APPLY NOW </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Apply Area End -->
@endsection
