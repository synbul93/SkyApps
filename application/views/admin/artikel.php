<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <!-- Page Heading -->

    <div class="row">

        <div class="col-lg">

            <div class="col-md-6">
                <?= $this->session->flashdata('message'); ?>
                <a href="<?= base_url(); ?>admin/tambahArtikel" class="btn btn-primary">Tambah Berita</a>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <form action="" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Article Data.." name="keyword">
                            <div class="input-group-append ">
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg">
                    <?php if (empty($artikel)) : ?>
                        <div class="alert alert-danger" role="alert">
                            Data not found.
                        </div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Ringkasan Berita</th>
                                        <th scope="col">Isi Berita</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Waktu</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($artikel as $art) : ?>
                                        <tr>
                                            <th scope="row"><?= $i++; ?></th>
                                            <td><?= $art['judul'] ?></td>
                                            <td><?= $art['ringkasan_berita'] ?></td>
                                            <td><?= $art['editor'] ?></td>
                                            <td><img src="<?= base_url('assets/img/artikel/') . $art['image'] ?>" width="70px"></td>
                                            <td><?= $art['waktu'] ?></td>
                                            <td><a href="<?= base_url(); ?>admin/editArtikel/<?= $art['id']; ?>" class="badge badge-primary">Edit</a><br>
                                                <a href="<?= base_url(); ?>admin/detailArtikel/<?= $art['id']; ?>" class="badge badge-success">Detail</a>
                                                <a href="<?= base_url(); ?>" data-toggle="modal" data-target="#deleteModal" class="badge badge-danger">Delete</a>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- delete modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete it?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Delete" if you are sure.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="<?= base_url(); ?>admin/hapusArtikel/<?= $art['id']; ?>">Delete</a>
            </div>
        </div>
    </div>
</div>
</div>

<!-- End of Main Content -->