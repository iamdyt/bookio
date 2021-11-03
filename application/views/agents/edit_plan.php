<div class="page-wrapper">
    <?php $this->load->view('admin/include/breadcrumb'); ?>
    <section class="page-content container-fluid pt-4 mb-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="alert alert-info">
                    <strong>Note:</strong>
                   Here, you can change the plan price, name and the number of business an agent can register per plan.
                </div>
                <div class="card text-white">
                    <div class="card-header bg-primary">Edit Plan</div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/agents/update_agent_plan/'.$plan->id) ?>" method="post">
                            <label class="text-dark" for="">Name</label>
                            <input type="text" required name="name" placeholder="Agent Name" value="<?=$plan->plan_name?>" id="" class="form-control">
                            <label class="text-dark" for="">Price</label>
                            <input type="number" min=1 name="price" placeholder="Price" value="<?=$plan->price?>" id="" class="form-control">
                            <label class="text-dark" for="">Number of Business</label>
                            <input type="number" min=1 required name="biz" placeholder="Business Count" value="<?=$plan->permitted_biz?>" id="" class="form-control">

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
