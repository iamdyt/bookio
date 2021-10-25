<div class="page-wrapper">
    <?php $this->load->view('admin/include/breadcrumb'); ?>
    <section class="page-content container-fluid pt-4 mb-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card"> 
                    <div class="card-header bg-primary text-white"><?= $single->title ?> </div>
                    <div class="card-body text-dark">
                        <p class=" text-justify">
                            <?= $single->content ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
