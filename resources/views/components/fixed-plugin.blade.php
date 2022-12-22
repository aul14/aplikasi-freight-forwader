<div class="fixed-plugin">

    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3 ">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Wfreight Configurator</h5>
                <p>See our dashboard options.</p>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0 overflow-auto">
            @php
                $template = App\Models\WebTemplate::where('user_id', auth()->user()->id)->first() == null ? (object) ['sidebar_color' => '', 'sidebar_type' => '', 'mode' => ''] : App\Models\WebTemplate::where('user_id', auth()->user()->id)->first();
            @endphp
            <!-- Sidebar Backgrounds -->
            <form action="{{ route('update.template') }}" method="post">
                @csrf
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span
                            class="badge filter bg-gradient-primary {{ $template->sidebar_color == 'data-color="primary"' ? 'active' : '' }}"
                            data-color="primary" onclick="sidebarColor(this)"></span>
                        <span
                            class="badge filter bg-gradient-dark {{ $template->sidebar_color == 'data-color="dark"' ? 'active' : '' }}"
                            data-color="dark" onclick="sidebarColor(this)"></span>
                        <span
                            class="badge filter bg-gradient-info {{ $template->sidebar_color == 'data-color="info"' ? 'active' : '' }}"
                            data-color="info" onclick="sidebarColor(this)"></span>
                        <span
                            class="badge filter bg-gradient-success {{ $template->sidebar_color == 'data-color="success"' ? 'active' : '' }}"
                            data-color="success" onclick="sidebarColor(this)"></span>
                        <span
                            class="badge filter bg-gradient-warning {{ $template->sidebar_color == 'data-color="warning"' ? 'active' : '' }}"
                            data-color="warning" onclick="sidebarColor(this)"></span>
                        <span
                            class="badge filter bg-gradient-danger {{ $template->sidebar_color == 'data-color="danger"' ? 'active' : '' }}"
                            data-color="danger" onclick="sidebarColor(this)"></span>
                        <input type="hidden" value="{{ $template->sidebar_color }}" name="sidebar_color"
                            id="sidebar_color">
                    </div>
                </a>
                <!-- Navbar Fixed -->
                <hr class="horizontal dark my-sm-4">
                <div class="mt-2 mb-5 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                            <?= $template->mode == 'dark' ? 'checked="true"' : '' ?> name="mode" value="dark"
                            onclick="darkMode(this)">
                    </div>
                </div>
                <!-- Sidenav Type -->
                <div class="mt-3" id="title-type">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button
                        class="btn bg-gradient-primary w-100 px-3 mb-2 {{ $template->sidebar_type == 'bg-white' ? 'active' : '' }} me-2"
                        type="button" id="btn-type" data-class="bg-white" onclick="sidebarType(this)">White</button>
                    <button
                        class="btn bg-gradient-primary w-100 px-3 mb-2 {{ $template->sidebar_type == 'bg-default' ? 'active' : '' }}"
                        type="button" id="btn2-type" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
                    <input type="hidden" name="sidebar_type" value="{{ $template->sidebar_type }}" id="sidebar_type">
                </div>
                {{-- <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p> --}}
                <hr class="horizontal dark my-sm-4">
                <div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
