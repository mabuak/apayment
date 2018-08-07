<script>
    var select2Id_{{$name}} = $('{{$id}}');

    @if($value)
    var x{{$name}} = $('#x{{$name}}').val();
    var x{{$name}}_option = $('#x{{$name}}_option').val();

    select2Id_{{$name}}.on("change", function () {
        var select2Data = select2Id_{{$name}}.select2("data");

        console.log(select2Data);
        $('#x{{$name}}').val(select2Data[0].id);
        $('#x{{$name}}_option').val(select2Data[0].text);
    });

    select2Id_{{$name}}.append('<option value="' + x{{$name}} + '" selected="selected">' + x{{$name}}_option + '</option>');
    @endif

    select2Id_{{$name}}.select2({
        theme: "bootstrap",
        placeholder: "Select",
        width: '100%',
        containerCssClass: ':all:',
        allowClear: '{{$allowClear}}',
        ajax: {
            url: '{{$url}}',
            dataType: 'json',
            delay: 250,
            data: function (params) {

                return {
                    term: params.term,
                    page: params.page
                };
            },
            processResults: function (data, params) {

                params.page = params.page || 1;

                return {
                    results: data.data,
                    pagination: {
                        more: (params.page * data.per_page) < data.total
                    }
                };
            },
            cache: true,
        }
    });

</script>