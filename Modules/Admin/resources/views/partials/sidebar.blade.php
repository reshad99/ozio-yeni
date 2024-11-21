<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
     data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="
{{--        {{ route('admin.dashboard') }}--}}
        ">
            <img alt="Logo" src="{{ asset('admin/assets/media/logos/custom-1.png') }}"
                 class="h-45px app-sidebar-logo-default"/>
            <img alt="Logo" src="{{ asset('admin/assets/media/custom-1.png') }}"
                 class="h-40px app-sidebar-logo-minimize"/>
        </a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <!--begin::Minimized sidebar setup:
            if (isset($_COOKIE["sidebar_minimize_state"]) && $_COOKIE["sidebar_minimize_state"] === "on") {
                1. "src/js/layout/sidebar.js" adds "sidebar_minimize_state" cookie value to save the sidebar minimize state.
                2. Set data-kt-app-sidebar-minimize="on" attribute for body tag.
                3. Set data-kt-toggle-state="active" attribute to the toggle element with "kt_app_sidebar_toggle" id.
                4. Add "active" class to to sidebar toggle element with "kt_app_sidebar_toggle" id.
            }
        -->
        <div id="kt_app_sidebar_toggle"
             class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
             data-kt-toggle-name="app-sidebar-minimize">
            <i class="ki-duotone ki-black-left-line fs-3 rotate-180">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
            <!--begin::Scroll wrapper-->
            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true"
                 data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                 data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                 data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                 data-kt-scroll-save-state="true">
                <!--begin::Menu-->
{{--                <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"--}}
{{--                     data-kt-menu="true" data-kt-menu-expand="false">--}}
{{--                    @foreach (config('admin.sidebar') as $item)--}}
{{--                        @if (request()->user()->hasPermission($item['permission']))--}}
{{--                            @php--}}
{{--                                $user = request()->user();--}}
{{--                                $perm = $item['permission'] ?? false;--}}
{{--                            @endphp--}}
{{--                            @if (!$perm || $user->hasPermission($item['permission']))--}}
{{--                                <!-- Menu item -->--}}
{{--                                @php--}}
{{--                                    $activeParent = isActiveParent($item['children'] ?? [], 'here show');--}}
{{--                                @endphp--}}
{{--                                <div data-kt-menu-trigger="click"--}}
{{--                                     class="menu-item {{ $activeParent }} {{ isset($item['children']) ? 'menu-accordion' : '' }}">--}}
{{--                                    <!-- Menu link -->--}}

{{--                                    @if (isset($item['children']))--}}
{{--                                        <span class="menu-link">--}}
{{--                                        @if (isset($item['icon']))--}}
{{--                                                <span class="menu-icon">--}}
{{--                                                <i class="{{ $item['icon'] }}">--}}
{{--                                                    <!-- Add more path spans if needed -->--}}
{{--                                                </i>--}}
{{--                                            </span>--}}
{{--                                            @endif--}}
{{--                                        <span class="menu-title">{{ $item['name'] }}</span>--}}
{{--                                        <span class="menu-arrow"></span>--}}
{{--                                    </span>--}}
{{--                                    @else--}}
{{--                                        <a class="menu-link" href="{{ route($item['url']) }}">--}}
{{--                                        <span class="menu-icon">--}}
{{--                                            <i class="{{ $item['icon'] }}">--}}
{{--                                            </i>--}}
{{--                                        </span>--}}
{{--                                            <span class="menu-title">{{ $item['name'] }} </span>--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
{{--                                    <!-- Submenu -->--}}
{{--                                    @if (isset($item['children']))--}}
{{--                                        <div class="menu-sub menu-sub-accordion">--}}
{{--                                            @foreach ($item['children'] as $child)--}}
{{--                                                @php--}}
{{--                                                    $activeParent = isActiveRoute($child['url']);--}}
{{--                                                    $childPerm = $child['permission'] ?? '';--}}
{{--                                                @endphp--}}
{{--                                                @if (!$childPerm || $user->hasPermission($childPerm))--}}
{{--                                                    <div class="menu-item">--}}
{{--                                                        <a class="menu-link {{ $activeParent }}"--}}
{{--                                                           href="{{ route($child['url']) }}">--}}
{{--                                                        <span class="menu-bullet"><span--}}
{{--                                                                class="bullet bullet-dot"></span></span>--}}
{{--                                                            <span class="menu-title">{{ $child['name'] }}</span>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                </div>--}}
                <!--end::Menu-->
            </div>
            <!--end::Scroll wrapper-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
    <!--begin::Footer-->

    <!--end::Footer-->
</div>
