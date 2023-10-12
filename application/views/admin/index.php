<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="#" class="text-secondary text-decoration-none">Faculty Data</a></div>
                            </div>
                            <div class="col-auto">
                                <h3><?php echo $jurusan_data; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="#" class="text-secondary text-decoration-none">Repository Data</a></div>
                            </div>
                            <div class="col-auto">
                                <h3><?php echo $total_data; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="#" class="text-secondary text-decoration-none">Student Data</a></div>
                            </div>
                            <div class="col-auto">
                                <h3><?php echo $mahasiswa_data; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Report Data Repository</h5>
                    <canvas id="repositoryChart" style="width: 50px; height: 50px;"></canvas>
                </div>
            </div>
        </div>
    </div>



</div>
</div>

<!-- /.container-fluid -->
<!-- End of Main Content -->