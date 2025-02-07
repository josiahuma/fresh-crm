<?php
namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\SmsTemplate;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $member = Member::create($request->all());
        return redirect()->route('members.index');
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);
        $member->update($request->all());
        return redirect()->route('members.index');
    }

    public function sendSms(Request $request)
    {
        \Log::info('sendSms method called');
        \Log::info('Member IDs: ' . implode(', ', $request->member_ids));

        $members = Member::whereIn('id', $request->member_ids)->get();
        $template = SmsTemplate::findOrFail($request->template_id);
        $messageTemplate = $template->message;

        foreach ($members as $member) {
            \Log::info('Sending SMS to: ' . $member->mobile_number);
            $message = str_replace('{first_name}', $member->first_name, $messageTemplate);
            $this->sendSmsToMember($member->mobile_number, $message);
        }

        return redirect()->route('members.index')->with('success', 'SMS sent successfully!');
    }

    private function sendSmsToMember($mobileNumber, $message)
    {
        $apiKey = 'N2E1Nzc2Nzk2NjU3NDU0MzQ5NTU2ZDM2NzczNjRlMzE=	';
        $sender = 'F Fountain';
        $data = [
            'apikey' => $apiKey,
            'numbers' => $mobileNumber,
            'message' => $message,
            'sender' => $sender
        ];

        $ch = curl_init('https://api.txtlocal.com/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        \Log::info('SMS API Response: ' . $response);

        return $response;
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('members.index');
    }

    public function upcomingEvents()
    {
        $currentMonth = Carbon::now()->month;
        $birthdays = Member::whereMonth('date_of_birth', $currentMonth)->get();
        $anniversaries = Member::whereMonth('anniversary_date', $currentMonth)->get();

        return view('members.upcoming', compact('birthdays', 'anniversaries'));
    }
}