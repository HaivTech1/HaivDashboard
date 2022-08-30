<div class="dropdown d-inline-block">
    @if ($hasNotifications)
        <button type="button" class="btn header-item noti-icon waves-effect"
            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="bx bx-bell bx-tada"></i>
            <livewire:components.nav.count>
        </button>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
            aria-labelledby="page-header-notifications-dropdown">
            <div class="p-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="m-0" key="t-notifications"> Notifications </h6>
                    </div>
                    <div class="col-auto">
                        <a href="#!" class="small" key="t-view-all"> View All</a>
                    </div>
                </div>
            </div>
            <div data-simplebar style="max-height: 230px;">
                @if (!$notifications->empty())
                    {{ $notifications->links() }}
                    
                @endif
            </div>

            <div class="p-2 border-top d-grid">
                <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                    <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View
                        More..</span>
                </a>
            </div>
        </div>
    @endif
</div>