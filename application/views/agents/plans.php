<div class="page-wrapper">
    <?php $this->load->view('admin/include/breadcrumb'); ?>
    <section class="page-content container-fluid pt-4 mb-4">
        <div class="row">
            <div class="col-md-12">
                
                <div class="mt-4 card card-body">
                    <table class="table table-striped mt-5 p-4 rounded" id="ditable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Bill-Type</th>
                                <th>Number of Business</th>
                                <th>Manage</th>
                            </tr>
                        </thead>

                        <tbody>
                            
                            <?php foreach( $agent_plans as $ap) {  ?>
                                <tr> <td> <?= $ap->plan_name ?> </td> <td><?= $ap->price ?></td>  <td> <?= strtoupper($ap->bill_type) ?> </td> <td><?=$ap->permitted_biz?></td> <td><a href="<?= base_url('admin/agents/edit_plan/'.$ap->id)?>" class="btn text-white btn-info">Edit</a></td> </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
