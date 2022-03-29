<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('keenthemes/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('keenthemes/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
@guest
<script src="{{asset('js/auth.js')}}"></script>
@endguest
<!--end::Page Custom Javascript-->
@auth
<script src="{{asset('js/plugin.js')}}"></script>
<script src="{{asset('js/method.js')}}"></script>
<script>
    var today = new Date();
    var curHr = today.getHours();
    if (curHr < 11) {
        $("#title_greet").html("{{__('custom.morning')}},");
    } else if (curHr >= 11 && curHr <= 15) {
        $("#title_greet").html("{{__('custom.afternoon')}},");
    }else if (curHr >= 15 && curHr <= 19) {
        $("#title_greet").html("{{__('custom.afternoons')}},");
    } else {
        $("#title_greet").html("{{__('custom.evening')}},");
    }
</script>
@endauth