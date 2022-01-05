<div class="modal fade" tabindex="-1" role="dialog" id="articleModal">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Baca Juga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe id="modal-iframe" src="{{ route('post.popup') }}" width="100%" height="800" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>