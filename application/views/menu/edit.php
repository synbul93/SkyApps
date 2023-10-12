<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('menu/edit/' . $user_sub_menu['id']) ?>" method="post">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Sub Menu Title" value="<?= $user_sub_menu['title'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="select_menu">Select Menu</label>
                                <select name="menu_id" id="menu_id" class="form-control">
                                    <option value="">Select Menu</option>
                                    <?php foreach ($menu as $m) : ?>
                                        <option value="<?= $m['id'] ?>" <?= ($m['id'] == $user_sub_menu['menu_id']) ? 'selected' : '' ?>><?= $m['menu'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sub_menu_level">Sub Menu Level / Url</label>
                                <input type="text" class="form-control" id="level" name="level" placeholder="Sub Menu Level" value="<?= $user_sub_menu['level'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="url">Url</label>
                                <input type="text" class="form-control" id="url" name="url" placeholder="Sub Menu Url" value="<?= $user_sub_menu['url'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <input type="text" class="form-control" id="icon" name="icon" placeholder="Sub Menu Icon" value="<?= $user_sub_menu['icon'] ?>">
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-input" type="checkbox" value="1" id="is_active" name="is_active" <?= ($user_sub_menu['is_active'] == 1) ? 'checked' : '' ?>>
                                    <label class="form-label" for="is_active">
                                        Active?
                                    </label>
                                </div>
                            </div>
                            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>