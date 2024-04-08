<script>
    "use strict";
    const config = {
        lang: "{{ getLang() }}",
        baseURL: "{{ url('/') }}",
        primaryColor: "{{ $settings['website_primary_color'] }}",
        secondaryColor: "{{ $settings['website_secondary_color'] }}",
        alertActionTitle: "{{ lang('Are you sure?', 'user') }}",
        alertActionText: "{{ lang('Confirm that you want do this action', 'user') }}",
        alertActionConfirmButton: "{{ lang('Confirm', 'user') }}",
        alertActionCancelButton: "{{ lang('Cancel', 'user') }}",
        copiedToClipboardSuccess: "{{ lang('Copied to clipboard') }}",
    };
</script>
@stack('config')
<script>
    "use strict";
    let configObjects = JSON.stringify(config),
        getConfig = JSON.parse(configObjects);
</script>
