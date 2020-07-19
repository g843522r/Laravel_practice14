<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//「PHP/Laravel 14 課題5」よりバリデーションを追記

//「Profile」Modelを使えるようにする記述
use App\Profile;

class ProfileController extends Controller {
    
    //「PHP/Laravel 08 課題5」より以下にactionを作成
    //「PHP/Laravel 14 課題5」よりバリデーションを追記
    public function add() {
        return view('admin.profile.create');
    }
    
    //「PHP/laravel 14 課題5」より追記
    public function create(Request $request) {
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        // フォームから送信されてきた「_token」を削除する記述
        unset($form['_token']);
        
        // データベースに保存する記述
        $profile->fill($form);
        $profile->save();
        
        // admin/profile/createにリダイレクトする
        return redirect('admin/profile/create');
    }
    
    public function edit() {
        
        // admin/profile/editのviewを表示する
        return view('admin.profile.edit');
    }
    
    public function update(Request $request) {
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        // フォームから送信されてきた「_token」を削除する記述
        unset($form['_token']);
        
        // データベースに保存する記述
        $profile->fill($form);
        $profile->save();
        
        // admin/profile/editにリダイレクトする
        return redirect('admin/profile/edit');
    }
    
}
