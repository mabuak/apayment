<tr>
    <td>@lang('paymentItem.title')</td>
    <td class="text-center">
        <div class="checkbox checkbox-success">
            <input type="checkbox" value="ok" class="styled payment_item_all" id="payment_item_all" name="payment_item_all" {{ old('payment_item_all') || (isset($role->permissions) && array_key_exists('payment_item.all', $role->permissions)) ? 'checked' : ''}}>
            <label></label>
        </div>
    </td>
    <td class="text-center">
        <div class="checkbox checkbox-success">
            <input type="checkbox" value="ok" class="styled payment_item" name="payment_item_create" {{ old('payment_item_create') || (isset($role->permissions) && array_key_exists('payment_item.create', $role->permissions)) ? 'checked' : ''}}>
            <label></label>
        </div>
    </td>
    <td class="text-center">
        <div class="checkbox checkbox-success">
            <input type="checkbox" value="ok" class="styled payment_item" name="payment_item_edit" {{ old('payment_item_edit') || (isset($role->permissions) && array_key_exists('payment_item.edit', $role->permissions)) ? 'checked' : ''}}>
            <label></label>
        </div>
    </td>
    <td class="text-center">
        <div class="checkbox checkbox-success">
            <input type="checkbox" value="ok" class="styled payment_item" name="payment_item_show" {{ old('payment_item_show') || (isset($role->permissions) && array_key_exists('payment_item.show', $role->permissions))  ? 'checked' : ''}}>
            <label></label>
        </div>
    </td>
    <td class="text-center">
        <div class="checkbox checkbox-success">
            <input type="checkbox" value="ok" class="styled payment_item" name="payment_item_destroy" {{ old('payment_item_destroy') || (isset($role->permissions) && array_key_exists('payment_item.destroy', $role->permissions))  ? 'checked' : ''}}>
            <label></label>
        </div>
    </td>
    <td>
        <div class="checkbox checkbox-success">
            <input type="checkbox" value="ok" id="payment_item_grant" class="styled payment_item" name="payment_item_grant" {{ old('payment_item_grant') || (isset($role->permissions) && array_key_exists('payment_item.grant', $role->permissions))  ? 'checked' : ''}}>
            <label for="payment_item_grant"> @lang('global.grant')</label>
        </div>
    </td>
</tr>

<script>

    $('#payment_item_all').on('click', function () {
        var payment_item = $('#payment_item_all');
        if (payment_item.is(":checked")) {
            $('.payment_item').prop('checked', true);
        } else {
            $('.payment_item').prop('checked', false);
        }
    });
</script>