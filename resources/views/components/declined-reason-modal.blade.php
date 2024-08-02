<div class="modal fade" id="declineModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="declineModalLabel">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="declineModalLabel">Declined Reason</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <label for="declined_reason" class="form-label"> Declined Reason </label>
                        <textarea 
                            class="form-control" 
                            type="text" 
                            id="declined_reason" 
                            name="declined_reason"
                            rows="3"
                            placeholder="Type Declined Reason..."
                        ></textarea>
                        <div class="mt-2">
                            <span id="declined_reason_error" style="color: red;"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"> Close </button>
                <button type="button" class="btn btn-primary confirmDeclined" id="confirmDecline">Confirm Declined</button>
            </div>
        </form>
    </div>
</div>