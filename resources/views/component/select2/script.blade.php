<script>
    var select2Id = '{{implode(', ', $id)}}';
    $(function () {
        $(select2Id).select2({
            theme: "bootstrap",
            placeholder: "Select",
            containerCssClass: ':all:',
            width: '100%',
            allowClear: true
        });
    });
</script>