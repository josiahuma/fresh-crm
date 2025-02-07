<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SmsTemplate;


class SmsTemplateController extends Controller
{
    //
    public function index()
    {
        $templates = SmsTemplate::all();
        return view('sms_templates.index', compact('templates'));
    }

    public function create()
    {
        return view('sms_templates.create');
    }

    public function store(Request $request)
    {
        SmsTemplate::create($request->all());
        return redirect()->route('sms_templates.index');
    }

    public function edit($id)
    {
        $template = SmsTemplate::findOrFail($id);
        return view('sms_templates.edit', compact('template'));
    }

    public function update(Request $request, $id)
    {
        $template = SmsTemplate::findOrFail($id);
        $template->update($request->all());
        return redirect()->route('sms_templates.index');
    }

    public function destroy($id)
    {
        $template = SmsTemplate::findOrFail($id);
        $template->delete();
        return redirect()->route('sms_templates.index');
    }
}
