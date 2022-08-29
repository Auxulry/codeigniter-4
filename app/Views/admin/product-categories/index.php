<?= $this->extend('layouts/admin')  ?>

<?= $this->section('styles') ?>
    <style>
        #products {
            width: 100% !important;
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h3>List of product categories</h3>
        <button class="btn btn-success" onclick="create()">Create</button>
    </div>
    <div class="mb-2 table-responsive card p-2">
        <table id='products' class='display dataTable'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="modal fade" id="modal_form" tabindex="-1" aria-labelledby="modal_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal_title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form" action="#">
                            <input type="hidden" name="id" id="category_id">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Product Name">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="submit()">Save changes</button>
                    </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#products').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "/api/product-categories/ajax-load",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [],
                "orderable": false,
            }, ],
        });
    });

    let method; // Methods

    function create() {
        method = 'POST';

        $('#modal_form').modal('show');
        $('#modal_title').text('Create Product Category');
    }

    function update(id) {
        method = 'PUT';

        $('#form')[0].reset(); // reset form on modals
        //Ajax Load data from ajax
        $.ajax({
            url : "/api/product-categories/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('#category_id').val(data.data.id)
                $('#name').val(data.data.name);
                $('#modal_form').modal('show');
                $('#modal_title').text('Update Product Category');

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log(jqXHR);
                alert('Error get data from ajax');
            }
        });
    }

    function destroy(id){
      if(confirm('Are you sure delete this data?')) {
        // ajax delete data from database
          $.ajax({
            url : `/api/product-categories/${id}`,
            type: "DELETE",
            dataType: "JSON",
            success: function(data)
            {
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

      }
    }

    function submit() {
        let url;
        const id = $('#category_id').val();
        if (method === 'POST') {
            url = '/api/product-categories'
        } else {
            url = `/api/product-categories/${id}`
        }

        $.ajax({
            url : url,
            type: method,
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                $('#modal_form').modal('hide');
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
            }
        });
    }

</script>
<?= $this->endSection() ?>