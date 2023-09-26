<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fqa;
use Illuminate\Http\Request;

class AdminFqaController extends Controller
{
    public function index()
    {
        $faqs = Fqa::get();
        return view('admin.faq', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $obj = new Fqa();
        $obj->question = $request->question;
        $obj->answer = $request->answer;
        $obj->save();

        return redirect()->route('admin_fqa')->with('success', 'Data is saved successfully.');

    }

    public function edit($id)
    {
        $faq_single = Fqa::where('id',$id)->first();
        return view('admin.faq_edit',compact('faq_single'));
    }

    public function update(Request $request, $id)
    {
        $obj = Fqa::where('id',$id)->first();

        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $obj->question = $request->question;
        $obj->answer = $request->answer;
        $obj->update();

        return redirect()->route('admin_fqa')->with('success', 'Data is updated successfully.');

    }

    public function delete($id)
    {
        Fqa::where('id',$id)->delete();
        return redirect()->route('admin_fqa')->with('success', 'Data is deleted successfully.');
    }
}
