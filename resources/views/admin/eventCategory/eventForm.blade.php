@extends('layouts.admin')

@section('title', 'Dashboard')
@section('content')
    <!DOCTYPE html>
    <html lang="en">



    <body>
        <section class="tab-components">
            <div class="container-fluid">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title mb-30">
                                <h2>Event Form</h2>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-6">
                            <div class="breadcrumb-wrapper mb-30">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#0">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#0">Forms</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Form Elements
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- ========== title-wrapper end ========== -->

                <!-- ========== form-elements-wrapper start ========== -->
                <div class="form-elements-wrapper">

                    <div class="card-style mb-30">
                        <h1>Registration Section</h1><br>
                        <div class="row">
                        <form>
                            <div class="col-lg-6">
                                <div class="input-style-1">
                                    <label>Section Name</label>
                                    <input type="text" />
                                </div>
                                <!-- end input -->
                            </div>
                            {{-- /// --}}
                            <div class="col-lg-6">
                                <div class="input-style-1">
                                    {{-- <label>ID</label> --}}
                                    <input type="hidden" />
                                </div>
                                <!-- end input -->
                            </div>
                        </form>
                           
                            <hr>
                            <br>
                            <br>
                            
                            <h1><label>Custom Field</label></h1>
                            <form>

                                    <div class="col-lg-6">
                                        <div class="input-style-1">
                                            <label>FIELD NAME</label>
                                            <input type="text" />
                                        </div>
                                        <!-- end input -->
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="input-style-1">
                                            <label>LABELNAME</label>
                                            <input type="text" />
                                        </div>
                                        <!-- end input -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="select-style-1">
                                            <label>OPTIONS</label>
                                            <div class="select-position">
                                                <select>
                                                    <option value="">checkbox</option>
                                                    <option value="">radio</option>
                                                    <option value="">====</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end select -->
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="select-style-1">
                                            <label>SECTION_ID</label>
                                            <div class="select-position">
                                                <select>
                                                    <option value="">checkbox</option>
                                                    <option value="">radio</option>
                                                    <option value="">====</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end select -->
                                    </div>
                            </form>
                            
                            <hr>
                        

                        </div>
                        <!-- end input -->
                    </div>

                    <!-- end row -->
                </div>
                <!-- ========== form-elements-wrapper end ========== -->
            </div>
            <!-- end container -->
        </section>

        </main>

    </body>

    </html>
@endsection
