<div class="modal" id="delete-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete data</h4>
            </div>
            <div class="modal-body" align="center">
                <h3>Are you sure you want to delete this?</h3>
                <form action="" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="Yes" name="" class="btn btn-danger" />
                    <button id="no-button" class="btn bg-default" data-dismiss="modal">NO</button>
                </form>
            </div>
        </div>
    </div>
</div>