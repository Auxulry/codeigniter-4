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
        <h3>List of products</h3>
        <button class="btn btn-success" onclick="create()">Create</button>
    </div>
    <div class="mb-2 table-responsive card p-2">
        <table id='products' class='display dataTable'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Price</th>
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
                    <form action="#" id="form" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Product Name">
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select id="category_id" class="form-control" name="category_id">
                                <option value=''>-- Select Category --</option>
                                <?php foreach ($categories as $category) { ?>
                                    <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <img class="img-responsive" id="preview" alt="image" style="display: none;">
                        </div>
                        <div class="mb-3" id="form-image">
                            <label for="image" class="form-label">Image</label>
                            <input class="form-control form-control-sm" accept="image/*" id="image" name="image" type="file" onchange="onFileChange">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Product Price">
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
    let method;
    let imageRequest = false;
    function onFileChange() {
        imageRequest = true
    }

    function create() {
        method = 'POST';

        $('#modal_form').modal('show');
        $('#form-image').css('display', 'block');
        $('#image').css('display', 'block');
        $('#modal_title').text('Create Product');
    }

    function update(id) {
        method = 'PUT';

        $('#form')[0].reset(); // reset form on modals
        //Ajax Load data from ajax
        $.ajax({
            url : "/api/products/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('#id').val(data.data.id);
                $('#category_id').val(data.data.category_id);
                $('#name').val(data.data.name);
                $('#description').val(data.data.description);
                $('#price').val(data.data.price);
                $('#form-image').css('display', 'none');
                $('#image').css('display', 'none');
                $('#preview').attr('src', data.data.image).css('display', 'block');
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

    function submit() {
        let url;
        const id = $('#id').val();
        if (method === 'POST') {
            url = '/api/products'
        } else {
            url = `/api/products/${id}`
        }

        const data = new FormData(document.getElementById('form'));
        data.append('image_request', imageRequest)
        if (method !== 'POST') {
            data.append('_method', 'PUT');
            method = 'POST'
        }
        $.ajax({
            processData: false,
            contentType: false,
            url : url,
            type: method,
            data: data,
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

    function destroy(id){
      if(confirm('Are you sure delete this data?')) {
        // ajax delete data from database
          $.ajax({
            url : `/api/products/${id}`,
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

    $(document).ready(function(){
        $('#products').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "/api/products/ajax-load",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [],
                "orderable": false,
            }, ],
        });
    });
</script>
<?= $this->endSection() ?>