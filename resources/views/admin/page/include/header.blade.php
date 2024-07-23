<div class="card-header flex-column flex-md-row pb-0">
    <div class="head-label d-flex align-items-center justify-content-between w-100">
        <div class="d-flex align-items-center">
            @if ($back)
                <a href="{{ $route }}" class="d-flex align-items-center me-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                        <path d="M12.707 17.293 8.414 13H18v-2H8.414l4.293-4.293-1.414-1.414L4.586 12l6.707 6.707z"></path>
                    </svg>
                </a>
            @endif
            <h5 class="card-title mb-0">{{ $title }}</h5>
        </div>
        @if ($button)
            <div>
                <button type="button" data-bs-toggle="modal" data-bs-target="#backDropModal" class="btn btn-primary addUser">Add</button>
            </div>
        @endif
    </div>
</div>