<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="{{route('office.dashboard')}}">
            <img alt="Logo" src="{{asset('img/icon.png')}}" class="h-25px logo" />
        </a>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="black" />
                    <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black" />
                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black" />
                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">{{__('menu.dashboard')}}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link active" href="{{route('office.dashboard')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Visitor</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Menu Utama</span>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-5">
                                
                            </span>
                        </span>
                        <span class="menu-title">{{__('menu.master_data')}}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('office.product.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.product')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('office.bank.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Bank</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('office.isic-type.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.isic')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.regional')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.due_reminder')}}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
                                    <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">CRM</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('office.customer.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.customers')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('office.partner.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.partners')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('office.lead.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.leads')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('office.client.index')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.clients')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.projects')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.quotations')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.mou')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.invoices')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.moh')}}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-5">
                                
                            </span>
                        </span>
                        <span class="menu-title">{{__('menu.finance')}}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.sales')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.payroll')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.journal')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.ledger')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.cashflow')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.balance_sheet')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.profit_loss')}}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-5">
                                
                            </span>
                        </span>
                        <span class="menu-title">{{__('menu.legality')}}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.docs')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.policy')}}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
                                    <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z" fill="black" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">HRM</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.department')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.vacancy_job')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.employee')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.certificates')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.schedules')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.todo_task')}}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-5">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64"><defs><style>.cls-1{fill:url(#linear-gradient);}.cls-2{fill:#cf4055;}.cls-3{fill:url(#linear-gradient-2);}.cls-4{fill:url(#linear-gradient-3);}.cls-5{fill:#c7cdd8;}.cls-6{fill:url(#linear-gradient-6);}.cls-7{fill:url(#linear-gradient-7);}.cls-8{fill:url(#linear-gradient-8);}.cls-9{fill:#8288a1;}</style><linearGradient id="linear-gradient" x1="15" y1="39" x2="15" y2="19" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#da5466"/><stop offset="1" stop-color="#f4929c"/></linearGradient><linearGradient id="linear-gradient-2" x1="4" y1="37" x2="4" y2="21" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#d4d8e1"/><stop offset="1" stop-color="#f3f4f5"/></linearGradient><linearGradient id="linear-gradient-3" x1="23" y1="29" x2="51" y2="29" xlink:href="#linear-gradient-2"/><linearGradient id="linear-gradient-6" x1="51" y1="29" x2="57" y2="29" xlink:href="#linear-gradient-2"/><linearGradient id="linear-gradient-7" x1="57" y1="29" x2="63" y2="29" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#a0a6ba"/><stop offset="1" stop-color="#c6ccda"/></linearGradient><linearGradient id="linear-gradient-8" x1="18" y1="63" x2="18" y2="39" xlink:href="#linear-gradient-7"/></defs><title>Marketing</title><g id="Marketing"><rect class="cls-1" x="7" y="19" width="16" height="20"/><rect class="cls-2" x="7" y="37" width="16" height="2"/><path class="cls-3" d="M5,21H7a0,0,0,0,1,0,0V37a0,0,0,0,1,0,0H5a4,4,0,0,1-4-4V25A4,4,0,0,1,5,21Z"/><path class="cls-4" d="M51,5V53l-.46-.74A32.47,32.47,0,0,0,38.75,41.07C34,38.44,28.6,38,23,38V20c11.2,0,21.61-4.77,27.54-14.26Z"/><path class="cls-3" d="M5,21H7a0,0,0,0,1,0,0V37a0,0,0,0,1,0,0H5a4,4,0,0,1-4-4V25A4,4,0,0,1,5,21Z"/><path class="cls-4" d="M51,5V53l-.46-.74A32.47,32.47,0,0,0,38.75,41.07C34,38.44,28.6,38,23,38V20c11.2,0,21.61-4.77,27.54-14.26Z"/><path class="cls-5" d="M7,34v3H5a4,4,0,0,1-4-4V30a4,4,0,0,0,4,4Z"/><path class="cls-5" d="M51,50v3l-.46-.74A32.47,32.47,0,0,0,38.75,41.07C34,38.44,28.6,38,23,38V35c5.6,0,11,.44,15.75,3.07A32.47,32.47,0,0,1,50.54,49.26Z"/><rect class="cls-6" x="51" y="1" width="6" height="56" rx="3"/><polygon class="cls-7" points="57 23 63 25 63 33 57 35 57 23"/><path class="cls-8" d="M23,57,20,39H10l3.58,21.49a3,3,0,0,0,3,2.51H26V60a3,3,0,0,0-3-3Z"/><path class="cls-9" d="M26,61v2H16.54a3,3,0,0,1-2.87-2.13,2.78,2.78,0,0,0,.87.13Z"/><path class="cls-2" d="M19,24H11a1,1,0,0,1,0-2h8a1,1,0,0,1,0,2Z"/><path class="cls-2" d="M19,28H11a1,1,0,0,1,0-2h8a1,1,0,0,1,0,2Z"/><path class="cls-2" d="M19,32H11a1,1,0,0,1,0-2h8a1,1,0,0,1,0,2Z"/><path class="cls-2" d="M19,36H11a1,1,0,0,1,0-2h8a1,1,0,0,1,0,2Z"/></g></svg>
                            </span>
                        </span>
                        <span class="menu-title">{{__('menu.customer_service')}}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.chat')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">E-Mail</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.support_ticket')}}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-5">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 998 758"><defs><style>.cls-1{fill:#fadb93;}.cls-2{fill:#e2e2e2;}.cls-3{fill:#fff;}.cls-4{fill:#7ce5e0;opacity:0.8;}.cls-5{fill:none;stroke:#ab8fe2;stroke-miterlimit:10;stroke-width:3.52px;}</style></defs><title>imac</title><g id="Layer_2" data-name="Layer 2"><g id="Layer_2-2" data-name="Layer 2"><rect class="cls-1" x="56.5" width="866" height="621" rx="21.43" ry="21.43"/><path class="cls-2" d="M77.93,0H901.07A21.43,21.43,0,0,1,922.5,21.43V531a0,0,0,0,1,0,0H56.5a0,0,0,0,1,0,0V21.43A21.43,21.43,0,0,1,77.93,0Z"/><rect class="cls-3" x="84.5" y="33" width="803" height="460"/><path class="cls-2" d="M564.2,758H410.05A30.31,30.31,0,0,1,380,723.74L393.5,621h188l12.78,103A30.31,30.31,0,0,1,564.2,758Z"/><circle class="cls-4" cx="489.5" cy="575" r="24"/><rect class="cls-4" x="504" y="60.5" width="494" height="219"/><line class="cls-5" y1="318.5" x2="471" y2="318.5"/><line class="cls-5" y1="355" x2="471" y2="355"/><line class="cls-5" y1="392" x2="471" y2="392"/><line class="cls-5" y1="429" x2="471" y2="429"/><circle class="cls-1" cx="18" cy="89.5" r="11"/><circle class="cls-1" cx="49" cy="89.5" r="11"/><circle class="cls-1" cx="80" cy="89.5" r="11"/><circle class="cls-1" cx="111" cy="89.5" r="11"/><circle class="cls-1" cx="142" cy="89.5" r="11"/><circle class="cls-1" cx="173" cy="89.5" r="11"/><circle class="cls-1" cx="18" cy="153.5" r="11"/><circle class="cls-1" cx="49" cy="153.5" r="11"/><circle class="cls-1" cx="80" cy="153.5" r="11"/><circle class="cls-1" cx="111" cy="153.5" r="11"/><circle class="cls-1" cx="142" cy="153.5" r="11"/><circle class="cls-1" cx="173" cy="153.5" r="11"/><circle class="cls-1" cx="34" cy="121.5" r="11"/><circle class="cls-1" cx="65" cy="121.5" r="11"/><circle class="cls-1" cx="96" cy="121.5" r="11"/><circle class="cls-1" cx="127" cy="121.5" r="11"/><circle class="cls-1" cx="158" cy="121.5" r="11"/><circle class="cls-1" cx="189" cy="121.5" r="11"/><circle class="cls-1" cx="34" cy="185.5" r="11"/><circle class="cls-1" cx="65" cy="185.5" r="11"/><circle class="cls-1" cx="96" cy="185.5" r="11"/><circle class="cls-1" cx="127" cy="185.5" r="11"/><circle class="cls-1" cx="158" cy="185.5" r="11"/><circle class="cls-1" cx="189" cy="185.5" r="11"/></g></g></svg>
                            </span>
                        </span>
                        <span class="menu-title">{{__('menu.settings')}}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.company')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.banner')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.history')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.service')}}</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="../../demo3/dist/pages/profile/overview.html">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">{{__('menu.corporate_mail')}}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="menu-item d-none">
                    <div class="menu-content">
                        <div class="separator mx-1 my-4"></div>
                    </div>
                </div>
                <div class="menu-item d-none">
                    <a class="menu-link" href="../../demo1/dist/documentation/getting-started/changelog.html">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/coding/cod003.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M16.95 18.9688C16.75 18.9688 16.55 18.8688 16.35 18.7688C15.85 18.4688 15.75 17.8688 16.05 17.3688L19.65 11.9688L16.05 6.56876C15.75 6.06876 15.85 5.46873 16.35 5.16873C16.85 4.86873 17.45 4.96878 17.75 5.46878L21.75 11.4688C21.95 11.7688 21.95 12.2688 21.75 12.5688L17.75 18.5688C17.55 18.7688 17.25 18.9688 16.95 18.9688ZM7.55001 18.7688C8.05001 18.4688 8.15 17.8688 7.85 17.3688L4.25001 11.9688L7.85 6.56876C8.15 6.06876 8.05001 5.46873 7.55001 5.16873C7.05001 4.86873 6.45 4.96878 6.15 5.46878L2.15 11.4688C1.95 11.7688 1.95 12.2688 2.15 12.5688L6.15 18.5688C6.35 18.8688 6.65 18.9688 6.95 18.9688C7.15 18.9688 7.35001 18.8688 7.55001 18.7688Z" fill="black" />
                                    <path opacity="0.3" d="M10.45 18.9687C10.35 18.9687 10.25 18.9687 10.25 18.9687C9.75 18.8687 9.35 18.2688 9.55 17.7688L12.55 5.76878C12.65 5.26878 13.25 4.8687 13.75 5.0687C14.25 5.1687 14.65 5.76878 14.45 6.26878L11.45 18.2688C11.35 18.6688 10.85 18.9687 10.45 18.9687Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Changelog v8.0.37</span>
                    </a>
                </div>
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
    <!--begin::Footer-->
    <div class="aside-footer flex-column-auto pt-5 pb-7 px-5 d-none" id="kt_aside_footer">
        <a href="../../demo1/dist/documentation/getting-started.html" class="btn btn-custom btn-primary w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="200+ in-house components and 3rd-party plugins">
            <span class="btn-label">Docs &amp; Components</span>
            <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
            <span class="svg-icon btn-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z" fill="black" />
                    <rect x="7" y="17" width="6" height="2" rx="1" fill="black" />
                    <rect x="7" y="12" width="10" height="2" rx="1" fill="black" />
                    <rect x="7" y="7" width="6" height="2" rx="1" fill="black" />
                    <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </a>
    </div>
    <!--end::Footer-->
</div>