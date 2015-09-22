<?php $this->load->view('admin/components/page_head'); ?>
<body style="background:#555555">
<div class=" modal-dialog show" role="dialog">
    <div class="modal-content jumbotron col333">
		<?php $this->load->view($subview); //Sub view is set in  controller ?>
    	<div class="modal-footer">
        </div>
    </div>
 </div>
<?php $this->load->view('admin/components/page_foot'); ?>