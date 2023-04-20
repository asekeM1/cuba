<div class="modal fade" id="endSessionModal" tabindex="-1" role="dialog" aria-labelledby="endSessionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="endSessionModalLabel">End Session</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to end this session?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form id="endSessionForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">End Session</button>
                </form>
            </div>
        </div>
    </div>
</div>
