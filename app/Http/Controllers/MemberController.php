<?php
namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Leader;
use App\Models\SmsTemplate;
use App\Models\ChurchUnitCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MembersImport;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        $church_unit_categories = ChurchUnitCategory::all();
        return view('members.create', compact('church_unit_categories'));
    }

    public function store(Request $request)
    {
        $member = Member::create($request->all());
         // Increment the members_count for the selected leader
         $leader = Leader::where('first_name', $request->church_leader)->first();
         \Log::info('Leader: ' . $leader);
         if ($leader) {
             $leader->increment('members_count');
             \Log::info('Leader members_count incremented');
         }
        return redirect()->route('members.index');
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    public function profile($id)
    {
        $member = Member::findOrFail($id);
        return view('members.profile', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);
         // Decrement the members_count for the old leader
         $oldLeader = Leader::where('first_name', $member->church_leader)->first();
         if ($oldLeader) {
             $oldLeader->decrement('members_count');
         }

         $member->update($request->all());

          // Increment the members_count for the new leader
        $newLeader = Leader::where('first_name', $request->church_leader)->first();
        if ($newLeader) {
            $newLeader->increment('members_count');
        }

        return redirect()->route('members.index');
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);
    
        Excel::import(new MembersImport, $request->file('csv_file'));
    
        return redirect()->route('members.index')->with('success', 'Members imported successfully!');
    }

    public function sendSms(Request $request)
    {
        \Log::info('sendSms method called');
        \Log::info('Member IDs: ' . implode(', ', $request->member_ids));

        $members = Member::whereIn('id', $request->member_ids)->get();
        $template = SmsTemplate::findOrFail($request->template_id);
        $messageTemplate = $template->message;

        foreach ($members as $member) {
            $message = str_replace('{first_name}', $member->first_name, $messageTemplate);
            \Log::info('Sending '. $message . ' to: ' . $member->mobile_number);
            $this->sendSmsToMember($member->mobile_number, $message);
        }

        //return redirect()->route('members.index')->with('success', 'SMS sent successfully!');
        return back()->with(['message'=>'Updated!']);
    }

    public function sendBulkSms(Request $request)
    {
        \Log::info('sendBulkSms method called');
        \Log::info($request);

        $request->validate([
            'template_id' => 'required',
        ]);

        $members = Member::all();
        $template = SmsTemplate::findOrFail($request->template_id);
        $messageTemplate = $template->message;

        foreach ($members as $member) {
            $message = str_replace('{first_name}', $member->first_name, $messageTemplate);
            \Log::info('Sending '. $message .' to: ' . $member->mobile_number);
            $this->sendSmsToMember($member->mobile_number, $message);
        }

        //return redirect()->route('members.index')->with('success', 'Bulk SMS sent successfully!');
        return back()->with(['message'=>'Updated!']);
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
        // Decrement the members_count for the leader
        $leader = Leader::where('first_name', $member->church_leader)->first();
        if ($leader) {
            $leader->decrement('members_count');
        }
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

    public function createChurchUnitCategory()
    {
        return view('members.add_church_unit_category');
    }

    public function storeChurchUnitCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'alias' => 'required|string|max:255',
        ]);

        ChurchUnitCategory::create([
            'name' => $request->name,
            'alias' => $request->alias,
        ]);

        return redirect()->route('church_unit_categories.create')->with('success', 'Category added successfully!');
    }
}