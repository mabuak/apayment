<?php
/**
 * Created By DhanPris
 *
 * @Filename     redirectTo.php
 * @LastModified 8/7/18 10:54 AM.
 *
 * Copyright (c) 2018. All rights reserved.
 */

namespace App\Traits;

trait redirectTo
{

    /**
     * @param $url
     * @param $message
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectSuccessCreate($url, $message)
    {
        session()->flash('success', __('global.creation_successful', ['name' => $message]));
        return redirect($url);
    }

    /**
     * @param $url
     * @param $message
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectSuccessUpdate($url, $message)
    {
        session()->flash('success', __('global.update_successful', ['name' => $message]));
        return redirect($url);
    }

    /**
     * @param $url
     * @param $message
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectSuccessDelete($url, $message)
    {
        session()->flash('success', __('global.delete_successful', ['name' => $message]));
        return redirect($url);
    }

    /**
     * @param $url
     * @param $message
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectSuccessSend($url, $message)
    {
        session()->flash('success', __('global.send_successful', ['name' => $message]));
        return redirect($url);
    }

    /**
     * @param $url
     * @param $message
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectFailed($url, $message)
    {
        session()->flash('failed', $message);
        return redirect($url);
    }

}