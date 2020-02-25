<?php

namespace App\Http\Controllers;

use App\Member; // คือการไปดึง Model มาใช้
use Hash; // เพื่อเข้ารหัส password ไว้ใน DB ไม่ให้ใครดู password ใน DB ได้
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function registerProcess(Request $request)
    {
        $member = new Member; // new คือการสร้าง class แล้วไปสร้างข้อมูลใน model ชื่อ member
        $member->username = $request->username;
        $member->password = Hash::make($request->password); //คือการเข้ารหัส Password ก่อนยิงลง DB คล้ายๆ MD5
        $member->save(); //หลังจากกำหนดว่ารับค่าจาก field ไหนมาแล้วต้องบอกให้มัน save ด้วย ไม่งั้นมันจะไม่ save
        return response()->json(['success'], 200);
    }

    public function loginProcess(Request $request)
    {
        if (Member::where('username', $request->username)->count() == 1) { // เรียก model Member where username = $request->username แล้ว count =1 คือ เจอ 1 record
            $member = Member::where('username', $request->username)->first(); // first() คือดึงเงื่อนอันแรกสุดไขที่ตรงออกมา

            // เอาค่าจาก request มาเทียบกับค่าก่อน hash
            if (Hash::check($request->password, $member->password)) {
                // ถ้าเช็ค password ผ่านจะ store session
                session(['username' => $member->username]);
                return redirect('/');
                // return back()->with('message', 'Login Successfully!');
            } else {
                return back()->with('error', 'Wrong Password!!!');
            }

        } else {
            return back()->with('error', 'Wrong Email!!!');
        }

    }

    public function logout(Request $request)
    {
        $request->session()->flush(); // clear session แต่ยังนับ ID ต่อจากเดิม
        $request->session()->regenerate(); // ล้าง Id ออกจาก session ด้วย (เริ่มนับ Id ใหม่)
        return redirect('/');
    }
}
