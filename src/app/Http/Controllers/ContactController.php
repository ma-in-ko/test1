<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    // フォーム表示
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    // 確認画面表示
    public function confirm(ContactRequest $request)
    {
        // フォームリクエストでバリデーション済みデータを取得
       // $validated = $request->validated();

        // 氏名を結合
        $fullname = $request->last_name . ' ' . $request->first_name;

        // 電話番号を結合
        $tel = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3;

        // 確認画面に渡す配列
        $contact = [
            'name'        => $fullname,
            'gender'      => $request->gender,
            'email'       => $request->email,
            'tel'         => $tel,
            'address'     => $request->address,
            'building'    => $request->building,
            'category_id' => $request->category_id,
            'detail'     => $request->detail,
        ];

        return view('confirm', compact('contact'));
    }

    // データ保存
    public function store(ContactRequest $request) {

        $contact = $request->only(['first_name','last_name','gender','email','tel','address','building','category_id','detail']);
        // DBに保存
        Contact::create($contact);

        return view('thanks');
    }
}
