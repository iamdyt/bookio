<div class="page-wrapper">
    <?php $this->load->view('admin/include/breadcrumb'); ?>
    <section class="page-content container-fluid pt-4 mb-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="alert alert-info">
                    <strong>Note:</strong>
                   Agents PLANS can be updated by visiting the agent's  panel
                </div>
                <div class="card text-white">
                    <div class="card-header bg-primary">New Agent Form</div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/agents/save') ?>" method="post">
                            <label class="text-dark" for="">Name</label>
                            <input type="text" required name="name" placeholder="Agent Name" id="" class="form-control">
                            <label class="text-dark" for="">Phone Number</label>
                            <input type="text" name="phone" placeholder="Phone number" id="" class="form-control">
                            <label class="text-dark" for="">Email</label>
                            <input type="email" required name="email" placeholder="E-mail" id="" class="form-control">
                            <label class="text-dark" for="">Username</label>
                            <input type="text" required name="username" placeholder="Username" id="" class="form-control">
                            <label class="text-dark" for="">Password</label>
                            <input type="password" required name="password" placeholder="Password" id="" class="form-control">
                            <label class="text-dark" for="">Plan</label>
                            <select name="plan" id="" class="form-control" >
                                <option value="">Select a Plan</option>
                                <?php foreach( $agent_plans as $ap) { ?>
                                    <option value="<?=$ap->id?>"> <?=$ap->plan_name?> </option>
                                <?php } ?>
                            </select>

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
