<?php
/**
 * Created By DhanPris
 *
 * @Filename     auth.php
 * @LastModified 5/30/18 10:55 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed'                                      => 'These credentials do not match our records.',
    'throttle'                                    => 'Too many login attempts. Please try again in :seconds seconds.',

    // Login
    'login_heading'                               => 'Login',
    'login_subheading'                            => 'Please login with your email/username and password below.',
    'login_identity_label'                        => 'Email:',
    'login_identity_placeholder'                  => 'Enter Email',
    'login_password_label'                        => 'Password:',
    'login_password_placeholder'                  => 'Enter Password',
    'login_remember_label'                        => 'Remember Me',
    'login_yes_label'                             => 'Yes',
    'login_no_label'                              => 'No',
    'login_submit_btn'                            => 'Login',
    'login_forgot_password'                       => 'Forgot your password?',
    'login_sign_in'                               => 'Sign In',

    // Index
    'index_user_list'                             => 'User List',
    'index_users'                                 => 'Users',
    'index_name_th'                               => 'Name',
    'index_fname_th'                              => 'First Name',
    'index_lname_th'                              => 'Last Name',
    'index_email_th'                              => 'Email',
    'index_groups_th'                             => 'Groups',
    'index_status_th'                             => 'Status',
    'index_action_th'                             => 'Action',
    'index_active_link'                           => 'Active',
    'index_inactive_link'                         => 'Inactive',
    'index_create_link'                           => 'Add New',
    'index_roles'                                 => 'Roles',
    'index_role_list'                             => 'Role List',
    'index_acl'                                   => 'Access Control List',
    'index_column'                                => 'Column',
    'index_last_login'                            => 'Last Login',
    'index_created_at'                            => 'Created At',
    'index_updated_at'                            => 'Updated At',
    'index_created_by'                            => 'Created By',
    'index_updated_by'                            => 'Updated By',
    'index_slug_th'                               => 'Slug',

    // Activate User
    'activate_heading'                            => 'Activate User',
    'activate_subheading'                         => 'Are you sure you want to activate the user \':name\'?',
    'activate_this_user'                          => 'Click to activate this user',

    // Deactivate User
    'deactivate_heading'                          => 'Deactivate User',
    'deactivate_subheading'                       => 'Are you sure you want to deactivate the user \':name\'?',
    'deactivate_this_user'                        => 'Click to deactivate this user',

    // Form
    'form_user_heading'                           => 'User',
    'form_user_subheading'                        => 'Please enter the user\'s information below.',
    'form_user_edit_heading'                      => 'Change User',
    'form_user_fname_label'                       => 'First Name',
    'form_user_lname_label'                       => 'Last Name',
    'form_user_company_label'                     => 'Company Name',
    'form_user_identity_label'                    => 'Identity',
    'form_user_email_label'                       => 'Email',
    'form_user_name_label'                        => 'Username',
    'form_user_phone_label'                       => 'Phone',
    'form_user_password_label'                    => 'Password',
    'form_user_password_confirm_label'            => 'Confirm Password',
    'form_user_submit_btn'                        => 'Create Account',
    'form_user_update_btn'                        => 'Update User',
    'form_user_cancel_btn'                        => 'Cancel',
    'form_user_validation_fname_label'            => 'First Name',
    'form_user_validation_lname_label'            => 'Last Name',
    'form_user_validation_identity_label'         => 'Identity',
    'form_user_validation_email_label'            => 'Email Address',
    'form_user_validation_phone_label'            => 'Phone',
    'form_user_validation_company_label'          => 'Company Name',
    'form_user_validation_password_label'         => 'Create a password',
    'form_user_validation_password_confirm_label' => 'Retype your password',
    'form_user_role_label'                        => 'Role',
    'form_user_role_select'                       => 'Select Role',
    'form_user_password_long'                     => 'Password (at least 8 characters long)',
    'form_user_password_type_again'               => 'Type Your Password Again',

    // Form Role
    'form_role_add_title'                         => 'New Role',
    'form_role_heading'                           => 'Please enter the role\'s information below.',
    'form_role_edit_title'                        => 'Update Role',
    'form_role_name_label'                        => 'Role Name',
    'form_role_desc_label'                        => 'Description',
    'form_role_add_submit_btn'                    => 'New Role',
    'form_role_edit_submit_btn'                   => 'Update Role',
    'form_role_module_label'                      => 'Module Name',
    'form_role_create_label'                      => 'Create',
    'form_role_update_label'                      => 'Update',
    'form_role_view_label'                        => 'View',
    'form_role_delete_label'                      => 'Remove',
    'form_role_miscellaneous_label'               => 'Others',
    'form_role_check_all_label'                   => 'Check All',

    // Change Password
    'change_password_heading'                     => 'Change Password',
    'change_password_old_password_label'          => 'Old Password',
    'change_password_new_password_label'          => 'New Password',
    'change_password_new_password_confirm_label'  => 'Confirm New Password',
    'change_password_submit_btn'                  => 'Change Password',

    'change_password_information_1'                        => 'Your password must contain at least 8 characters',
    'change_password_information_2'                        => 'Create strong password that combines letters, numbers, and special characters',
    'change_password_information_3'                        => 'Never share your password with anyone for any reason',
    'change_password_information_4'                        => 'Change your password frequently',

    // Forgot Password
    'forgot_password_heading'                              => 'Forgot Password',
    'forgot_password_subheading'                           => 'Please Enter your <b>Email</b> and instructions will be sent to you!',
    'forgot_password_submit_btn'                           => 'Submit',
    'forgot_password_validation_email_label'               => 'You Email Address',
    'forgot_password_email_identity_label'                 => 'Email',
    'forgot_password_email_not_found'                      => 'No record of that email address.',
    'forgot_password_identity_not_found'                   => 'No record of that username.',

    // Reset Password
    'reset_password_heading'                               => 'Change Password',
    'reset_password_new_password_label'                    => 'New Password (at least %s characters long):',
    'reset_password_new_password_confirm_label'            => 'Confirm New Password:',
    'reset_password_submit_btn'                            => 'Change',
    'reset_password_validation_new_password_label'         => 'New Password',
    'reset_password_validation_new_password_confirm_label' => 'Confirm New Password',
    'reset_password_change_unsuccessful_old'               => 'Old Password does not match',

    // Account Creation
    'account_creation_successful'                          => 'Account Successfully Created',
    'account_creation_unsuccessful'                        => 'Unable to Create Account',
    'account_creation_duplicate_email'                     => 'Email Already Used or Invalid',
    'account_creation_duplicate_identity'                  => 'Identity Already Used or Invalid',
    'account_creation_missing_default_group'               => 'Default group is not set',
    'account_creation_invalid_default_group'               => 'Invalid default group name set',
    'account_creation_register'                            => 'Register',
    'account_creation_information'                         => 'Account Information',
    'account_creation_login_information'                   => 'Login Information',

    // Password
    'password_change_successful'                           => 'Password Successfully Changed',
    'password_change_unsuccessful'                         => 'Unable to Change Password',
    'forgot_password_successful'                           => 'Password Reset Email Sent',
    'forgot_password_unsuccessful'                         => 'Unable to email the Reset Password link',

    // Activation
    'activate_successful'                                  => 'Account Activated',
    'activate_unsuccessful'                                => 'Unable to Activate Account',
    'active_current_user_unsuccessful'                     => 'You cannot Activate your self.',
    'deactivate_successful'                                => 'Account De-Activated',
    'deactivate_unsuccessful'                              => 'Unable to De-Activate Account',
    'activation_email_successful'                          => 'Activation Email Sent. Please check your inbox or spam',
    'activation_email_unsuccessful'                        => 'Unable to Send Activation Email',

    // Login / Logout
    'login_successful'                                     => 'Logged In Successfully',
    'login_unsuccessful'                                   => 'Incorrect Login',
    'login_unsuccessful_not_active'                        => 'Account is inactive',
    'login_timeout'                                        => 'Temporarily Locked Out.  Try again later.',
    'logout_successful'                                    => 'Logged Out Successfully',
    'logout_heading'                                       => 'Logout',

    // Account Changes
    'update_successful'                                    => 'Account Information Successfully Updated',
    'update_unsuccessful'                                  => 'Unable to Update Account Information',
    'delete_successful'                                    => 'User Deleted',
    'delete_unsuccessful'                                  => 'Unable to Delete User',
    'delete_confirmation'                                  => 'Are you sure you want to delete user \':name\'?',

    // Role
    'role_creation_successful'                             => 'Role Successfully Created',
    'role_creation_unsuccessful'                           => 'Role Unsuccessfully Created',
    'role_already_exists'                                  => 'Role name already taken',
    'role_update_successful'                               => 'Role details updated',
    'role_update_unsuccessful'                             => 'Role details Unsuccessfully Updated',
    'role_delete_successful'                               => 'Role deleted',
    'role_delete_unsuccessful'                             => 'Unable to delete role',
    'role_delete_notallowed'                               => 'Can\'t delete the root\' role',
    'role_name_required'                                   => 'Group name is a required field',
    'role_name_admin_not_alter'                            => 'Admin group name can not be changed',

    // Activation Email
    'email_activation_subject'                             => 'Account Activation',
    'email_activate_heading'                               => 'Activate account for %s',
    'email_activate_subheading'                            => 'Please click this link to %s.',
    'email_activate_link'                                  => 'Activate Your Account',

    // Forgot Password Email
    'email_forgotten_password_subject'                     => 'Forgotten Password Verification',
    'email_forgot_password_heading'                        => 'Reset Password for %s',
    'email_forgot_password_subheading'                     => 'Please click this link to %s.',
    'email_forgot_password_link'                           => 'Reset Your Password',
];
