<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CMS;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CMSController extends Controller
{
    public function index()
    {
       // Would be used for actual CMS module
    }

    public function indexPartners()
    {
        $partners = CMS::query()
                                ->when(request()->query('search','') != '', function ($query) {
                                    $query->where('name', 'like', '%' . request()->query('search') . '%');
                                    return $query;
                                })
                                ->where('type', CMS::TYPE_PARTNERS)
                                ->latest()
                                ->paginate();

        $cloud = CMS::where("type", CMS::TYPE_PARTNERS_CLOUD)->first();

        return view('admin.partners.index', ['partners' => $partners, 'cloud' => $cloud]);
    }

    public function createPartners()
    {
        return view('admin.partners.create');
    }

    public function editPartners(CMS $cms)
    {
        return view('admin.partners.edit', ['cms' => $cms]);
    }

    public function storePartners(Request $request)
    {
        $request->validate([
            'partner' => ['required','max:21000'],
        ]);
        
        $cms = new CMS;
        $url = $request->file('partner');
        $path = $request->file('partner')->storeAs('public/partners', $url->getClientOriginalName());
        $cms->page = "Home";
        $cms->name = "Partners Logo " . Str::random(5);
        $cms->slug = "partner-" . Str::random(5);
        $cms->value = $path;
        $cms->type = CMS::TYPE_PARTNERS;
        $cms->save();

        return redirect('/admin/cms-data/partners');
        
    }

    public function updatePartners(Request $request, CMS $cms)
    {
        $request->validate([
            'partner' => ['required','max:21000'],
        ]);
     
        $url = $request->file('partner');
        $path = $request->file('partner')->storeAs('public/partners', $url->getClientOriginalName());
        $cms->value = $path;
        $cms->save();

        return redirect('/admin/cms-data/partners')->with('success', 'Updated');
        
    }
   

    public function indexTeams()
    {
        $teams = CMS::query()
                                ->when(request()->query('search','') != '', function ($query) {
                                    $query->where('name', 'like', '%' . request()->query('search') . '%');
                                    return $query;
                                })
                                ->whereIn('type', [CMS::TYPE_TEAM, CMS::TYPE_BOARD])
                                ->latest()
                                ->paginate();


        return view('admin.team.index', ['teams' => $teams]);
    }

    public function createTeams()
    {
        return view('admin.team.create');
    }

    public function editTeams(CMS $cms)
    {
        return view('admin.team.edit', ['cms' => $cms]);
    }

    // name -> name, page -> linkedin Url, slug -> position, value -> json {content, image}

    public function storeTeams(Request $request)
    {
        $request->validate([
            'image' => ['required','max:21000'],
            'name' => ['required'],
            'linkedInUrl' => ['required'],
            'position' => ['nullable'],
            'description' => ['required'],
            'type' => ['required'],
        ]);
        
        $cms = new CMS;
        $url = $request->file('image');
        $path = $request->file('image')->storeAs('public/teams', $url->getClientOriginalName());
        $cms->name = $request->name;
        $cms->page = $request->linkedInUrl;
        $cms->slug = $request->position ?? $request->linkedInUrl;
        $cms->value = json_encode(['content' => $request->description, 'image' => $path]);
        $cms->type = $request->type;
        $cms->save();

        return redirect('/admin/cms-data/teams');
        
    }

    public function updateTeams(Request $request, CMS $cms)
    {
        $request->validate([
            'image' => ['nullable','max:21000'],
            'name' => ['required'],
            'linkedInUrl' => ['required'],
            'position' => ['nullable'],
            'description' => ['required'],
            'type' => ['required'],
        ]);
     
        $currentValue = json_decode($cms->value, true);
        
        if ($request->hasFile('image')) {
            $url = $request->file('image');
            $path = $request->file('image')->storeAs('public/teams', $url->getClientOriginalName());
            $imagePath = $path;
        } else {
            $imagePath = $currentValue['image'];
        }

        $cms->name = $request->name;
        $cms->page = $request->linkedInUrl;
        $cms->slug = $request->position ?? $request->linkedInUrl;
        $cms->value = json_encode([
            'content' => $request->description,
            'image' => $imagePath
        ]);
        $cms->type = $request->type;
        $cms->save();

        return redirect('/admin/cms-data/teams')->with('success', 'Updated');
        
    }

    public function editAi()
    {
        $cms = CMS::where('type', CMS::TYPE_AI)->firstOrCreate(
            ['type' => CMS::TYPE_AI],
            [
                'name' => 'AI DATA',
                'slug' => 'ai-data',
                'page' => 'ai-data',
                'value' => 'Knowledge Base',
                'type' => CMS::TYPE_AI]
        );
        return view('admin.ai.edit', ['cms' => $cms]);
    }

  
    public function updateAi(Request $request, CMS $cms)
    {
        $request->validate([
            'content' => ['required'],
        ]);
     

        $cms->value = $request->content;
        $cms->save();

        return back()->with('success', 'Updated');
        
    }

    public function destroy(CMS $cms)
    {
        if ($cms->type == CMS::TYPE_PARTNERS) {
            Storage::delete($cms->value);
        }
        if ($cms->type == CMS::TYPE_TEAM || $cms->type == CMS::TYPE_BOARD) {
            $value = json_decode($cms->value, true);
            Storage::delete($value['image']);
        }
        $cms->delete();
        return back()->with('success', 'Deleted');
    }
    
}
