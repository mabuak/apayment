<tr>
    <td>@lang('auth.index_users')</td>
    <td class="text-center">
        <div class="checkbox checkbox-success">
            <input type="checkbox" value="ok" class="styled user_all" id="user_all" name="user_all" {{ old('user_all') || (isset($role->permissions) && array_key_exists('user.all', $role->permissions)) ? 'checked' : ''}}>
            <label></label>
        </div>
    </td>
    <td class="text-center">
        <div class="checkbox checkbox-success">
            <input type="checkbox" value="ok" class="styled user" name="user_create" {{ old('user_create') || (isset($role->permissions) && array_key_exists('user.create', $role->permissions)) ? 'checked' : ''}}>
            <label></label>
        </div>
    </td>
    <td class="text-center">
        <div class="checkbox checkbox-success">
            <input type="checkbox" value="ok" class="styled user" name="user_edit" {{ old('user_edit') || (isset($role->permissions) && array_key_exists('user.edit', $role->permissions)) ? 'checked' : ''}}>
            <label></label>
        </div>
    </td>
    <td class="text-center">
        <div class="checkbox checkbox-success">
            <input type="checkbox" value="ok" class="styled user" name="user_show" {{ old('user_show') || (isset($role->permissions) && array_key_exists('user.show', $role->permissions))  ? 'checked' : ''}}>
            <label></label>
        </div>
    </td>
    <td class="text-center">
        <div class="checkbox checkbox-success">
            <input type="checkbox" value="ok" class="styled user" name="user_destroy" {{ old('user_destroy') || (isset($role->permissions) && array_key_exists('user.destroy', $role->permissions))  ? 'checked' : ''}}>
            <label></label>
        </div>
    </td>
    <td>
        <div class="checkbox checkbox-success">
            <input type="checkbox" value="ok" id="user_status" class="styled user" name="user_status" {{ old('user_status') || (isset($role->permissions) && array_key_exists('user.status', $role->permissions))  ? 'checked' : ''}}>
            <label for="user_status"> @lang('auth.index_status_th')</label>
        </div>
    </td>
</tr>

<script>

    $('#user_all').on('click', function () {
        var user = $('#user_all');
        if (user.is(":checked")) {
            $('.user').prop('checked', true);
        } else {
            $('.user').prop('checked', false);
        }
    });
</script>