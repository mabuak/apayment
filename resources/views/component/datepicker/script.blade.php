<script>
    var datePickerId = '{{implode(', ', $id)}}';

    $(function () {
        $(datePickerId).datepicker({
            dateFormat : 'yy-mm-dd',
            changeMonth: true,
            changeYear : true,
            yearRange  : "-100:+0"
        });
    });
</script>