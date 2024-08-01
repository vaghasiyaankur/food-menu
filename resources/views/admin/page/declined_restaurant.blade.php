<x-restaurant-table
    title="Declined Restaurants"
    headerTitle="Declined Restaurants"
    :button="false"
    :back="true"
    route="{{ route('super-admin.restaurant') }}"
/>

{{-- Restaurants Declined Reason Show Modal --}}
<div class="modal fade" id="declinedReasonModal" tabindex="-1" aria-labelledby="declinedReasonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="declinedReasonModalLabel">Declined Reason</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>