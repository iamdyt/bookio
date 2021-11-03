<div class="page-wrapper">
    <?php $this->load->view('admin/include/breadcrumb'); ?>
    <section class="page-content container-fluid pt-4 mb-4">
        <div class="row">
            <div class="col-md-12">
                <a href="<?= base_url('admin/agents/create')?>" class="btn btn-primary"> <i class="fas fa-users"></i> New Agent &plus; </a>
                <div class="mt-4 card card-body">
                    <table class="table table-striped mt-5 p-4 rounded" id="ditable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>E-mail</th>
                                <th>Role</th>
                                <th>Plan</th>
                                <th>Change Plan</th>
                                <th>Manage</th>
                            </tr>
                        </thead>

                        <tbody>
                            
                            <?php foreach( $agents as $agent) {  ?>
                                <tr> <td> <?= $agent->name ?> </td> <td><?= $agent->user_name ?></td>  <td> <?= $agent->phone ?> </td>  <td><?= $agent->email ?></td> <td><?= $agent->role ?></td> <td><?=$agent->plan_name?></td> 
                                <td> 
                                    <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle py-1 text-white" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Plans
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <?php foreach($agent_plans as $ap) { ?>
                                            <li><a class="dropdown-item" href="<?= base_url('admin/agents/plan_update/'.$agent->user_id.'/'.$ap->id.'/?plan='.$agent->plan_name) ?>"><?=$ap->plan_name?></a></li>
                                        <?php } ?>
                                    </ul>
                                    </div>
                                </td> 
                                <td><a href="<?= base_url('admin/agents/delete/').$agent->user_id;?>"  class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a></td></tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
