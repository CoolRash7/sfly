<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //
    public function adminAllPage() {
        $user_id = Auth::user()->id;

        $services = Service::where('user_id', $user_id)->orderByDesc('id')->get();
        return view('admin.all', compact('services'));
    }

    public function adminAddPage() {
        return view('admin.add');
    }

    public function adminAddStore(Request $request) {
        $validated = $request->validate([
            'category' => ['required', 'string'],
            'rubric' => ['required', 'string'],
            'title' => ['required', 'string', 'max:50'],
            'price' => ['nullable', 'integer'],
            'descr' => ['nullable', 'string', 'max:3000'],
            'contact' => ['required', 'integer'],
            'whatsapp' => ['nullable', 'boolean'],
            'photo1' => ['nullable', 'image', 'max:2048'],
            'photo2' => ['nullable', 'image', 'max:2048'],
            'photo3' => ['nullable', 'image', 'max:2048'],
            'photo4' => ['nullable', 'image', 'max:2048'],
            'photo5' => ['nullable', 'image', 'max:2048'],

        ]);
        // dd($validated);

        $photo1_path =  $request->file('photo1') ?
            $request->file('photo1')->store('image/services', 'public') :
            '';

        $photo2_path =  $request->file('photo2') ?
            $request->file('photo2')->store('image/services', 'public') :
            '';

        $photo3_path =  $request->file('photo3') ?
            $request->file('photo3')->store('image/services', 'public') :
            '';

        $photo4_path =  $request->file('photo4') ?
            $request->file('photo4')->store('image/services', 'public') :
            '';

        $photo5_path =  $request->file('photo5') ?
            $request->file('photo5')->store('image/services', 'public') :
            '';

        Service::create([
            'category' => $validated['category'],
            'rubric' => $validated['rubric'],
            'title' => $validated['title'],
            'price' => $validated['price'],
            'descr' => $validated['descr'],
            'contact' => $validated['contact'],
            'whatsapp' => $validated['whatsapp'] ?? 0,
            'photo1' => $photo1_path,
            'photo2' => $photo2_path,
            'photo3' => $photo3_path,
            'photo4' => $photo4_path,
            'photo5' => $photo5_path,
            'user_id' => Auth::id(),

        ]);

        return redirect()->route('admin.all');
    }

    public function adminEditPage(Request $request, int $id) {

        //echo 'calc id: '.$id;

        $temp = Service::find($id);

        if ( Auth::user()->id != $temp->user_id)
            return redirect('profile');

        return view('admin.edit', ['temp' => $temp]);
    }

    public function adminEditStore(Request $request, int $id) {

        //get temp services from ID
        $temp = Service::where('id', $id)->first();
        
        $validated = $request->validate([
            'category' => ['required', 'string'],
            'rubric' => ['required', 'string'],
            'title' => ['required', 'string', 'max:50'],
            'price' => ['nullable', 'integer'],
            'descr' => ['nullable', 'string', 'max:3000'],
            'contact' => ['required', 'integer'],
            'whatsapp' => ['nullable', 'boolean'],
            'photo1' => ['nullable', 'image', 'max:2048'],
            'photo2' => ['nullable', 'image', 'max:2048'],
            'photo3' => ['nullable', 'image', 'max:2048'],
            'photo4' => ['nullable', 'image', 'max:2048'],
            'photo5' => ['nullable', 'image', 'max:2048'],

        ]);

        if ($temp['photo1'] && $request->hasFile('photo1'))
            Storage::disk('public')->delete($temp['photo1']);

        if ($temp['photo2'] && $request->hasFile('photo2'))
            Storage::disk('public')->delete($temp['photo2']);

        if ($temp['photo3'] && $request->hasFile('photo3'))
            Storage::disk('public')->delete($temp['photo3']);

        if ($temp['photo4'] && $request->hasFile('photo4'))
            Storage::disk('public')->delete($temp['photo4']);

        if ($temp['photo5'] && $request->hasFile('photo5'))
            Storage::disk('public')->delete($temp['photo5']);

        $photo1_path = $request->file('photo1') ? 
            $request->file('photo1')->store('image/services', 'public') :
            Service::where('id', $id)->first()->photo1;

        $photo2_path = $request->file('photo2') ? 
            $request->file('photo2')->store('image/services', 'public') :
            Service::where('id', $id)->first()->photo2;

        $photo3_path = $request->file('photo3') ? 
            $request->file('photo3')->store('image/services', 'public') :
            Service::where('id', $id)->first()->photo3;

        $photo4_path = $request->file('photo4') ? 
            $request->file('photo4')->store('image/services', 'public') :
            Service::where('id', $id)->first()->photo4;

        $photo5_path = $request->file('photo5') ? 
            $request->file('photo5')->store('image/services', 'public') :
            Service::where('id', $id)->first()->photo5;


        Service::where('id', $id)->update([
            'category' => $validated['category'],
            'rubric' => $validated['rubric'],
            'title' => $validated['title'],
            'price' => $validated['price'],
            'descr' => $validated['descr'],
            'contact' => $validated['contact'],
            'whatsapp' => $validated['whatsapp'] ?? 0,
            'photo1' => $photo1_path,
            'photo2' => $photo2_path,
            'photo3' => $photo3_path,
            'photo4' => $photo4_path,
            'photo5' => $photo5_path,
        ]);

        return redirect()->route('admin.all');
    }

    public function adminRemove(Request $request) {

        $id = $request->input('id');

        $service = Service::find($id);

        if ($service) {
            $service->delete();

            return redirect()->route('admin.all')->with('status', 'Музыка успешно удалена.');
        }

        return redirect()->route('admin.all')->withErrors(['error' => 'Ошибка при удалении']);
    }
}