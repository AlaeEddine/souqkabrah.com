<div class="modal" data-bs-backdrop="static" data-bs-keyboard="false" id="plans" tabindex="-1" aria-labelledby="plansLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="plansLabel">{{ __('اختر الإشتراك المناسب') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           @foreach (App\Http\Controllers\AccountController::getPlans() as $Plan)

           @endforeach
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
</div>
