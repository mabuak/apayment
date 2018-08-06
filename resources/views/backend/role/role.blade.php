<tr>
    <td>@lang('auth.index_roles')</td>
    <td class="text-center">
        <div class="checkbox checkbox-success">
            <input type="checkbox" value="ok" class="styled role_all" id="role_all" name="role_all" {{ old('role_all') || (isset($role->permissions) && array_key_exists('role.all', $role->permissions)) ? 'checked' : ''}}>
            <label></label>
        </div>
    </td>
    <td class="text-center">
        <div class="checkbox checkbox-success">
            <input type="checkbox" value="ok" class="styled role" name="role_create" {{ old('role_create') || (isset($role->permissions) && array_key_exists('role.create', $role->permissions)) ? 'checked' : ''}}>
            <label></label>
        </div>
    </td>
    <td class="text-center">
        <div class="checkbox checkbox-success">
            <input type="checkbox" value="ok" class="styled role" name="role_edit" {{ old('role_edit') || (isset($role->permissions) && array_key_exists('role.edit', $role->permissions)) ? 'checked' : ''}}>
            <label></label>
        </div>
    </td>
    <td class="text-center">
        <div class="checkbox checkbox-success">
            <input type="checkbox" value="ok" class="styled role" name="role_show" {{ old('role_show') || (isset($role->permissions) && array_key_exists('role.show', $role->permissions))  ? 'checked' : ''}}>
            <label></label>
        </div>
    </td>
    <td class="text-center">
        <div class="checkbox checkbox-success">
            <input type="checkbox" value="ok" class="styled role" name="role_destroy" {{ old('role_destroy') || (isset($role->permissions) && array_key_exists('role.destroy', $role->permissions))  ? 'checked' : ''}}>
            <label></label>
        </div>
    </td>
    <td>
        <div class="checkbox checkbox-success">
            <input type="checkbox" value="ok" id="role_status" class="styled role" name="role_status" {{ old('role_status') || (isset($role->permissions) && array_key_exists('role.status', $role->permissions))  ? 'checked' : ''}}>
            <label for="role_status"> @lang('auth.index_status_th')</label>
        </div>
    </td>
</tr>

<script>

    $('#role_all').on('click', function () {
        var role = $('#role_all');
        if (role.is(":checked")) {
            $('.role').prop('checked', true);
        } else {
            $('.role').prop('checked', false);
        }
    });
</script>