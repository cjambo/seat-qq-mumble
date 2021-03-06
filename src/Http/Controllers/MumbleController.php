<?php

/*
This file is part of SeAT

Copyright (C) 2015 to 2020  Leon Jacobs

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/

namespace Jambo\Seat\QQ\Http\Controllers;

use Seat\Web\Http\Controllers\Controller;
use Jambo\Seat\QQ\Models\Mumble;

/**
 * Class HomeController.
 *
 * @package Jambo\Seat\YourPackage\Http\Controllers
 */
class MumbleController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function getHome()
    {
        $user = auth()->user();
        $address = '27.50.162.226';
        $port = '64738';
        $username = $user->id+25565;

        // 数据库中有数据则读取
        if (Mumble::where('user_id', $user->id)->exists()) {
            $password = Mumble::where('user_id', $user->id)->first()['pwhash'];
        }
        //没有则创建
        else {
            // 生成随机密码
            $password = bin2hex(random_bytes(8));
            // 保存数据
            $muminfo = new Mumble();
            $muminfo->user_id = $user->id;
            $muminfo->username = $username;
            $muminfo->pwhash = $password;
            $muminfo->hashfn = 'none';
            $muminfo->display_name = $user['name'];
            $muminfo->save();
        }
        return view('yourpackage::mumble', compact('address', 'port', 'username', 'password'));
    }

    public function setpw()
    {

        // 重置密码
        Mumble::where('user_id', auth()->user()->id)->update(['pwhash' => bin2hex(random_bytes(8))]);

        return redirect()->back()->with('success', '重置成功');
    }
}
