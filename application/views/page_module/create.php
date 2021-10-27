<div class="page-wrapper">
    <?php $this->load->view('admin/include/breadcrumb'); ?>
    <section class="page-content container-fluid pt-4 mb-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header bg-primary text-white">New Page </div>
                    <div class="card-body text-dark">
                        <form action="<?= base_url('admin/pages/save_page') ?>" method="post">
                            <label for="">Title</label>
                            <input type="text" required name="title" placeholder="Page Title" id="" class="form-control">
                            <label for="">Link</label> &emsp;<small>(Not Mnadatory)</small>
                            <input type="text" name="link" placeholder="e.g http://www.google.com" id="" class="form-control">
                            <label for="">Location</label>
                            <select name="location" required id="" class="form-control">
                                <option value="">Choose a Location</option>
                                <option value="agent">Agent's Dashboard</option>
                                <option value="user">User's Dashboard </option>
                            </select>
                            <label for="">Content</label>
                            <textarea name="content" id="summernote" class="form-control mt-2" cols="30" rows="5"></textarea>
                             <!-- csrf token -->
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            <div class="mt-4">
                                <button class="btn btn-block btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
